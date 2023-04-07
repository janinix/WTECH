<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>

    <nav class="navbar header1 navbar-light fw-bold navbar-expand-md nav-gradient justify-content-end">
        <div class="container">
            <a href="./templates/main_page.html" class="navbar-brand"><img src="../images/logo_black.png" alt=""
                    width="250" height=""></a>
            <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav"
                aria-label="Expand navigation">
                <span class="navbar-toggler-icon "><i class="fa fa-bars fs-1"></i></span>
            </button>
            <div class="collapse navbar-collapse text-center " id="nav">
                
                <ul class="navbar-nav ms-auto links-font ">
                    <li class="nav-item">
                        <a href="admin_pouzivatelia" class="nav-link fs-2">Používatelia</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout" class="nav-link fs-2">Odhlásenie</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container mt-5 bg-light sectionpm">
            <h1 class="text-center mb-4">Admin Dashboard</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Názov</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Akcie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Produkt 1</td>
                            <td>$10.00</td>
                            <td>Product 1 opis</td>
                            <td>
                                <button class="btn btn-primary btn-sm">Upraviť</button>
                                <button class="btn btn-danger btn-sm">Vymazať</button>
                            </td>
                        </tr>
                        <!-- More product rows can be added here -->
                    </tbody>
                </table>
            </div>

            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#addProductForm"
                aria-expanded="false" aria-controls="addProductForm">
                Pridaj nový produkt
            </button>

            <div class="collapse mt-4 bg-light" id="addProductForm">
                <form>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Názov</label>
                        <input type="text" class="form-control" id="productName">
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Cena</label>
                        <input type="number" class="form-control" id="productPrice" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Opis</label>
                        <textarea class="form-control" id="productDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Obrázok</label>
                        <input class="form-control" type="file" id="productImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Uložiť</button>
                </form>
            </div>
        </div>

    </section>


    <footer id="footer" data-bs-toggle="animation" data-animation-reset="true" data-animation="fade-in">
        <div class="container footer_pm">
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



</body>

</html>