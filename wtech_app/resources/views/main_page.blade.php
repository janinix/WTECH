<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main_style.css">
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
    <!-- kategórie-->

    @if($message = Session::get('successLog'))
        <div class="alert alert-success alert-dismissible" role="alert" id="myAlert">
            {{ $message }}
            <button type="button" class="close float-end close_button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="container categories justify-content-around">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
            <div class="col-3 text-center mb-2 mb-lg-8">
                <form action="{{ route('product_vyziva') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link nav-links text-uppercase">športová výživa</button>
                </form>
            </div>
            <div class="col-3 text-center mb-2 mb-lg-8">
                <form action="{{ route('product_oblecenie') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link nav-links text-uppercase">športová oblečenie</button>
                </form>
            </div>
            <div class="col-3 text-center mb-2 mb-lg-8">
                <form action="{{ route('product_prislusenstvo') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link nav-links text-uppercase">prislušenstvo</button>
                </form>
            </div>
            <div class="col-3 text-center mb-2 mb-lg-8">
                <form action="{{ route('product_potraviny') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link nav-links text-uppercase">potraviny</button>
                </form>
            </div>
            
        </div>
    </section>

    <!--  carousel - banner s výhodami pre nakupujúcich-->
    <section class="justify-content-center text-center">
        <div id="myCarousel" class="carousel slide col-12 " data-bs-ride="carousel">
            <div class=" carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h2 class="display-4">Darček pri nákupe nad 70€</h2>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Použi kód: MYSTERYBOXSK</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <h2 class="display-5">Zľava až do 40% na naše proteíny</h2>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Využite jedinečnú akciu</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                    data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"><i
                                class="bi bi-chevron-left text-black"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                    data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"><i
                                class="bi bi-chevron-right text-black"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <form action="{{ route('product_vyhladavanie') }}" method="POST">
            @csrf
            <div class="row justify-content-center mt-4 mb-3 gy-2">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Hľadať...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- prehlad bestsellerov - 4 produkty-->
        <div class="row bestsellers">
            <h2><strong>BESTSELLERY</strong></h2>
            <section class="products_list container-fluid">
                <div class="row bestsellers">
                    @php
                        $product_ids = [2, 14, 11, 5];
                        $best_products = DB::table('product')
                            ->select('id', 'name', 'price', 'image1')
                            ->whereIn('id', $product_ids)
                            ->get();
                    @endphp
                    @foreach($best_products as $best_product )
                        <div class="col">
                            <div class="card">
                                <form method='POST' action="{{ route('product_detail', $best_product->id) }}">
                                    @csrf
                                    <button type="submit">
                                        <img class="card-img-top" src= {{ $best_product->image1}}  alt="Product Image">
                                    </button>		
                                </form>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{$best_product->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$best_product->price}}€</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
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
    <script>
        document.querySelector('.alert .close').addEventListener('click', function() {
            document.querySelector('.alert').style.display = 'none';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
