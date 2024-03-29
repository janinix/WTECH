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
    <link rel="stylesheet" href="css/reg_log_style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <!-- Začiatok navigácie na zaciatku stranky -->
    <nav class="navbar navbar-light fw-bold navbar-expand-md">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="images/logo_black.png" alt="" width="130" height=""></a>
            <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav"
                    aria-label="Expand navigation">
                <span class="navbar-toggler-icon "><i class="fa fa-bars fs-1"></i></span>
            </button>
            <div class="collapse navbar-collapse text-center " id="nav">
                <ul class="navbar-nav ms-auto links-font ">
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- hlavný kontent stranky -->
    <div class="container-fluid main_content">
        <div class="row">
            <!-- Lava cast stranky kde je carousel v ktotom sa premietaju vyhody clenstva -->
            <section class="col-md-6 col-sm-12 register_left  text-center ">
                <div class="row">
                    <div id="myCarousel" class="carousel slide col-12 " data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                                aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h2>30% zľava pre členov</h2>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Vytvor účet pre výhody</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h2>Pravidelné bonusy</h2>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Vytvor účet pre výhody</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <h2>Skvelá komunita</h2>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Vytvor účet pre výhody</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="bi bi-chevron-left text-black"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i
                                    class="bi bi-chevron-right text-black"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                
            </section>
            <!-- sekcia kde je formular pre registraciu  -->
            <section class="col-md-5 col-11  register_right text-center">
                <h2>Registrácia tu</h2>
                <div class="row">
                    <form class="col-10 offset-1 register_form d-inline-block" action="{{ route('validate_registration') }}" method="POST">
                        @csrf
                        <div class="form-group mt-3">
                            <input type="text" name="name" class="form-control" placeholder="Meno a priezvisko">
                            @if($errors->has('name'))
							    <span class="text-danger">{{ $errors->first('name') }}</span>
						    @endif
                        </div>
                        
                        <div class="form-group mt-3">
                            <input type="text" name="username" class="form-control" placeholder="Používatelské meno">
                            @if($errors->has('username'))
							    <span class="text-danger">{{ $errors->first('username') }}</span>
						    @endif
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="email" class="form-control" placeholder="E-mail">
                            @if($errors->has('email'))
							    <span class="text-danger">{{ $errors->first('email') }}</span>
						    @endif
                        </div>
                        <div class="form-group mt-3 ">
                            <input type="password" name="password" class="form-control " placeholder="Heslo">
                            @if($errors->has('password'))
							    <span class="text-danger">{{ $errors->first('password') }}</span>
						    @endif
                        </div>
                        <div class="row buttons mb-4">
                            <div class="col-6 btn_sign_in float-start">
                                <p class="have_account mt-2 text-light">Už máte profil?</p>
                                <a href="login" class="btn btn-primary">Prihlásenie</a>
                            </div>
                            <div class="col-6 btn_register float-end">
                                <p class="have_account invisible mt-2">Registrácia</p>
                                <button  class="btn btn-primary" type="submit">Registrácia</button>
                            </div>
                    
                        </div>
                    
                    </form>
                </div>
                
            </section>
        </div>
    </div>
    <!-- Päta stránky -->
    <footer id="footer" class=" text-center ">
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