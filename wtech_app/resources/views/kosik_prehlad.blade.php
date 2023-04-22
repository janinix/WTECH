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
    $latest_cart_id = DB::table('shopping_cart')
                      ->orderByDesc('id')
                      ->value('id');

    $data = DB::table('shopping_cart')
                ->join('shopping_cart_item', 'shopping_cart.id', '=', 'shopping_cart_item.shopping_cart_id')
                ->join('product', 'product.id', '=', 'shopping_cart_item.product_id')
//                ->where('shopping_cart_id', '=', $latest_cart_id)
                ->select('shopping_cart_item.quantity', 'shopping_cart_item.id', 'product.name', 'product.price', 'product.image1')
                ->get();
@endphp

    <!-- sekcia pre zobrazenie casti kosika v ktorom sa zakarnik nachadza -->
    <section class="container bg-light ">
        <h1 class="text-center mb-5 mt-3">Nakupný košík</h1>
        <section class="row justify-content-around">
            <div class="col-7 col-md-3 col-lg-3 ">
                <div class="container border border-danger text-center text-sm-start align-middle kosik_container actual_part_kosik ">
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
                <div class="container border border-dark text-center  kosik_container">
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

        <!-- zobrazenie produktu v kosiku-->
        <div class="container border border-dark mt-5 kosik_container_product">
            <div class="row ">
                @foreach($data as $item)
                <div class="col-2 d-none d-sm-block mt-4">
                    <img src="{{$item->image1}}" alt="" srcset="" width="50" height="50">
                </div>
                <div class="col-3 mt-sm-3">
                    <h5 class=" fs-5">{{$item->name}}</h5>
                    <h5 class="text-success fs-6">Skladom v predajni</h5>
                </div>

                <div class="col-4 col-md-3 mt-md-3">
                    <form method="POST" action="{{ route('update_quantity', $item->id) }}">
                        @csrf
                        <!--updatuje dobre ale zrejme neposiela do POST novú hodnotu ?-->
                        <input type="hidden" name="quantity" id="quantity_{{$item->id}}" value="{{$item->quantity}}">
                        <div class="row  mt-sm-3 row-cols-1">

                            <div class=" col-sm-3">
                                <button type="submit" class="btn" onclick="increment(event)" data-card="{{$item->id}}">
                                    <i class="fa-sharp fa fa-plus fs-2 "></i>
                                </button>
                            </div>

                            <div class=" col-sm-1">
                                <p class="fs-3" id="itemCount_{{$item->id}}">{{$item->quantity}}</p>
                            </div>
                            <div class=" col-sm-3">
                                <button class="btn" type="submit" onclick="decrement(event)" data-card="{{$item->id}}">
                                    <i class="fa-sharp fa fa-minus fs-2 "></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-2  mt-3 mt-sm-4  ">
                    <h5 class="fs-6 ">Cena {{$item->price}}€ s DPH</h5>

                </div>
                <div class="col-1 col-md-2">
                    <form method="POST" action="{{ route('product_delete', $item->id) }}"> <!-- shopping_cart_item.id -->
                        @csrf
                        <button type="submit" class="btn mt-4 mt-md-3">
                            <img src="../images/delete_item.png" alt="" srcset="">
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        <!-- tlacidla pre dalsie kroky a bonus kod-->
        <div class="container pb-3 mt-3">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control bonus_kod float-start" placeholder="Zadajte kód">
                    <a href="./main_page.html" class="btn btn-primary ">Použiť kód</a>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control bonus_kod float-start invisible" placeholder="Zadajte kód">
                    <a href="kosik_doprava_platba" class="btn btn-primary float-end">Pokračovať</a>
                </div>
            </div>
        </div>

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

    
    <script>
        function increment(event) {
            let card = event.target.closest("button").dataset.card;
            let itemCountElement = document.getElementById(`itemCount_${card}`);
            let count = parseInt(itemCountElement.innerText);
            count += 1;
            itemCountElement.innerText = count;
            document.getElementById(`quantity_${card}`).value = count;
        }

        function decrement(event) {
            let card = event.target.closest("button").dataset.card;
            let itemCountElement = document.getElementById(`itemCount_${card}`);
            let count = parseInt(itemCountElement.innerText);
            if (count > 1) {
                count -= 1;
            }
            itemCountElement.innerText = count;
            document.getElementById(`quantity_${card}`).value = count;
        }
    </script>


</body>

</html>
