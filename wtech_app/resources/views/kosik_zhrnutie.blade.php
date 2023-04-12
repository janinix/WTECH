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
    <!-- sekcia pre zobrazenie casti kosika v ktorom sa zakarnik nachadza -->
    <section class="container bg-light ">
        <h1 class="text-center mb-5 mt-3">Nakupný košík</h1>
        <section class="row justify-content-around">
            <div class="col-7 col-md-3 col-lg-3 ">
                <div
                    class="container border border-dark text-center text-sm-start align-middle kosik_container  ">
                    <div class="d-flex flex-wrap gap-2 mt-5 mt-sm-4 mt-xl-5">
                        <i class="fa fa-shopping-cart "></i>
                        <h3 class="fs-5 ">VAŠA OBJEDNÁVKA</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-1 text-center">
                <i class="fa fa-long-arrow-alt-right d-none d-md-block fs-1 mt-5"></i>
                <i class="fa fa-long-arrow-alt-down d-block d-md-none fs-1 my-2"></i>
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
                <i class="fa fa-long-arrow-alt-right d-none d-md-block fs-1 mt-5"></i>
                <i class="fa fa-long-arrow-alt-down d-block d-md-none fs-1 my-2"></i>
            </div>
            <div class="col-7 col-md-3 col-lg-3">
                <div class="container border border-danger text-center kosik_container actual_part_kosik">
                    <div class="d-flex flex-wrap gap-2 mt-4 mt-xl-4 mt-xxl-5">
                        <i class="fa fa-shopping-cart "></i>
                        <h3 class="fs-5">ZHRNUTIE OBJEDNÁVKY</h3>
                    </div>

                </div>
            </div>
        </section>
        <hr>
        
        <section class="container mt-2">
            <div class="row">
                <!-- sekcia pre vyplnenie udajov pre objednavku-->
                <div class="col-10 col-sm-6">
                    <h5>Osobné údaje</h5>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Meno a Priezvisko</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Email</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Tel. číslo</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    <hr>
                    <h5>Fakturačná adresa</h5>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Ulica</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4 ">
                                <p class="float-start">Číslo domu</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Mesto</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">PSČ</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="div mb-2">
                        <div class="row">
                            <div class="col-4">
                                <p class="float-start">Štát</p>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control float-end" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pddelovacia ciara-->
                <div class="col-1 hr_vertical d-none d-sm-block"></div>
                <!-- sekcia pre zhrnutie nakupu -->
                <div class="col-10 col-sm-5">
                    <h5 class="text-center">Zhrnutie objednávky</h5>
                    <div class="container ">
                        <div class="row mt-3">
                            <div class="col-5 offset-1">
                                <h6>100% Whey Protein</h6>
                            </div>
                            <div class="col-3"><h6>1ks</h6></div>
                            <div class="col-3"> <h6>30€</h6></div>
                        </div>
                    </div>
                    <hr>
                    <div class="container ">
                        <div class="row mt-3">
                            <div class="col-5 offset-1">
                                <h6>Creatin Tablety 100ks</h6>
                            </div>
                            <div class="col-3">
                                <h6>1ks</h6>
                            </div>
                            <div class="col-3">
                                <h6>15€</h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container ">
                        <div class="row mt-3">
                            <div class="col-5 offset-1">
                                <h6>Fit Tyčinka Kokos</h6>
                            </div>
                            <div class="col-3">
                                <h6>15ks</h6>
                            </div>
                            <div class="col-3">
                                <h6>1,50€</h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h5 class="float-start">Celkom k úhrade</h5>
                        <h5 class="float-end">67,50€</h5>
                    </div>
                    
                    <!-- tlacidla pre dalsie kroky-->
                    <div class="col-12 text-center">
                        <button class="btn-dark rounded-3 mt-5" type="submit">
                            <a class="btn text-light " href="/templates/main_page.html">Odoslať objednávku s povinnosťou platby</a>
                        </button>
                    </div>
                    <div class="col-1 offset-11 mt-5">
                        <a href="kosik_doprava_platba" class="btn btn-primary float-sm-start">Späť</a>
                    </div>
                    
                </div>
                    
            </div>
        </section>

        
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