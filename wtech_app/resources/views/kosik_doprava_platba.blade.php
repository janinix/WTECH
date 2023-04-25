<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/kosik.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
<!-- navigacia -->
<nav class="navbar navbar-light fw-bold navbar-expand-md">
    <div class="container">
        <a href="/" class="navbar-brand"><img src="images/logo_black.png" alt="" width="130" height=""></a>
        <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav"
                aria-label="Expand navigation">
            <span class="navbar-toggler-icon "><i class="fa fa-bars fs-1"></i></span>
        </button>
        <div class="collapse navbar-collapse text-center " id="nav">
            <ul class="navbar-nav ms-auto links-font ">
                @guest
                    <li class="nav-item">
                        <a href="register" class="nav-link fs-2">Registrácia</a>
                    </li>
                    <li class="nav-item">
                        <a href="login" class="nav-link fs-2">Prihlásenie</a>
                    </li>
                    <li class="nav-item">
                        <a href="kosik_prehlad" class="nav-link">
                            <i class="fa fa-shopping-cart fs-1" aria-hidden="true"></i>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#" class="nav-link fs-2">
                            {{ Auth::user()->username }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout " class="nav-link fs-2">
                            Odhlásenie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="kosik_prehlad" class="nav-link">
                            <i class="fa fa-shopping-cart fs-1" aria-hidden="true"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@php
    if (Auth::check()){
    $user= Auth::id();

    $options = DB::table('shopping_history')
                ->join('users', 'users.id', '=', 'shopping_history.user_id')
                ->join('shopping_cart', 'shopping_cart.id', '=', 'shopping_history.shopping_cart_id')
                ->join('order_infos', 'order_infos.shopping_card_id', '=', 'shopping_cart.id')
                ->where('shopping_history.user_id', '=', $user)
                ->select('order_infos.delivery', 'order_infos.payment', 'order_infos.card_number')
                ->get();
    }

@endphp


@if($message = Session::get('successLog'))
    <div class="alert alert-success alert-dismissible" role="alert" id="myAlert">
        {{ $message }}
        <button type="button" class="close float-end close_button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- sekcia pre zobrazenie casti kosika v ktorom sa zakarnik nachadza -->
<section class="container bg-light ">
    <h1 class="text-center mb-5 mt-3">Nakupný košík</h1>
    <section class="row justify-content-around">
        <div class="col-7 col-md-3 col-lg-3 ">
            <div class="container border border-dark text-center text-sm-start align-middle kosik_container  ">
                <div class="d-flex flex-wrap gap-2 mt-5 mt-sm-4 mt-xl-5">
                    <i class="fa fa-shopping-cart "></i>
                    <h3 class="fs-5 ">VAŠA OBJEDNÁVKA</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-1 text-center">
            <i class="fa fa-long-arrow-right d-none d-md-block fs-1 mt-5"></i>
            <i class="fa fa-long-arrow-down d-block d-md-none fs-1 my-2"></i>
        </div>
        <div class="col-7 col-md-3 col-lg-3">
            <div class="container border border-danger text-center  kosik_container actual_part_kosik">
                <div class="d-flex flex-wrap gap-2 mt-4 mt-sm-2 mt-xl-3">
                    <i class="fa fa-shopping-cart "></i>
                    <h3 class="fs-5">DOPRAVA <br> A <br> SPOSOB PLATBY</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-1 text-center">
            <i class="fa fa-long-arrow-right d-none d-md-block fs-1 mt-5"></i>
            <i class="fa fa-long-arrow-down d-block d-md-none fs-1 my-2"></i>
        </div>
        <div class="col-7 col-md-3 col-lg-3">
            <div class="container border border-dark text-center kosik_container">
                <div class="d-flex flex-wrap gap-2 mt-4 mt-xl-4 mt-xxl-5">
                    <i class="fa fa-shopping-cart "></i>
                    <h3 class="fs-5">ZHRNUTIE OBJEDNÁVKY</h3>
                </div>

            </div>
        </div>
    </section>

    <form action="{{ route('options') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger" role="alert" id="myAlert">
                Vyberte spôsob doručenia a platby!
            </div>
        @endif

        <!-- casť pre vyber sposobu platby a dorucenia -->
    <h3 class="mt-4">Doručenie tovaru</h3>
{{--        @if(Auth::check() && $options)--}}
{{--            <div class="container border border-dark my-2">--}}
{{--                @foreach($options as $option)--}}
{{--                <div class="my-2">--}}
{{--                    <input type="radio" id="{{$option->delivery}}" name="interest" value="{{$option->delivery}}"/>--}}
{{--                    <label for="{{$option->delivery}}">{{$option->delivery}}</label>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @else--}}
    <div class="container border border-dark my-2">
        <div class="my-2">
            <input type="radio" id="kurier" name="interest" value="kurier"/>
            <label for="kurier">Doručenie kurierom</label>
        </div>
        <div class="my-2">
            <input type="radio" id="osobny_odber" name="interest" value="osobny_odber" />
            <label for="osobny_odber">Osobný odber na adrese Staré Grunty 7</label>
        </div>
    </div>
{{--        @endif--}}

        <h3 class="mt-4">Spôsob platby</h3>
{{--        @if(Auth::check() && $options)--}}
{{--            <div class="container border border-dark my-2">--}}
{{--                @foreach($options as $option)--}}
{{--                @if($option->payment === 'bank_ucet')--}}
{{--                    <div class="my-2">--}}
{{--                    <input type="radio" id="{{$option->payment}}" name="payment" value="{{$option->payment}}" data-bs-toggle="collapse" href="#collapse1"/>--}}
{{--                    <label for="back_ucet">{{$option->payment}}</label>--}}
{{--                    <div class="collapse" id="collapse1">--}}
{{--                        <input type="text" name="card_number"  class="form-control" placeholder="Číslo karty" value="{{$option->card_number}}">--}}
{{--                    </div>--}}
{{--                 @else--}}
{{--                </div>--}}
{{--                    <div class="my-2">--}}
{{--                        <input type="radio" id="{{$option->payment}}" name="payment" value="{{$option->payment}}"/>--}}
{{--                        <label for="{{$option->payment}}">{{$option->payment}}</label>--}}
{{--                    </div>--}}
{{--                 @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @else--}}
    <div class="container border border-dark my-2">
        <div class="my-2">
            <input type="radio" id="bank_ucet" name="payment" value="bank_ucet" data-bs-toggle="collapse" href="#collapse1"/>
            <label for="back_ucet">Prevodom na účet</label>
            <div class="collapse" id="collapse1">
                <input type="text" name="card_number"  class="form-control" placeholder="Číslo karty">
            </div>
        </div>
        <div class="my-2">
            <input type="radio" id="dobierka" name="payment" value="dobierka"/>
            <label for="dobierka">Dobierka</label>
        </div>
        <div class="my-2">
            <input type="radio" id="hotovost" name="payment" value="hotovost"/>
            <label for="hotovost">V hotovosti pri osobnom odbere</label>
        </div>
    </div>
{{--        @endif--}}

    <!-- tlacidla pre dalsie kroky-->
    <div class="container pb-3 mt-3">
        <div class="row">
            <div class="col-6">
                <a href="kosik_prehlad" class="btn btn-primary float-sm-start">Späť</a>
            </div>
            <div class="col-6">
                <button  class="btn btn-primary float-end" type="submit">Pokračovať</button>
            </div>
        </div>
    </div>
    </form>

</section>
<!-- päta stranky-->
<footer id="footer" class="mt-5  text-center ">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6">
            <div class="col text-center mb-2 mb-lg-0">
                <a class="footer_link" href="#"><i class="fa fa-facebook fa-lg "></i> FITShop</a>
            </div>
            <div class="col text-center mb-2 mb-lg-0">
                <a class="footer_link" href="#"><i class="fa fa-instagram fa-lg "></i> FITShop</a>
            </div>
            <div class="col text-center mb-2 mb-lg-0">
                <i class="fa fa-phone fa-lg " aria-hidden="true"></i> 0954235214
            </div>
            <div class="col text-center mb-2 mb-lg-0">
                <i class="fa fa-envelope fa-lg "></i>fitshop@gmail.com
            </div>
            <div class="col text-center mb-2 mb-lg-0">
                <i class="fa fa-snapchat fa-lg "></i>Fitshopp
            </div>
            <div class="col text-center">
                <address>Adresa: Staré Grunty C7</address>
            </div>
        </div>
    </div>
    <div class="text-center">
        <small class="text-dark">&copy; Copyright 2023, FITShop</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
