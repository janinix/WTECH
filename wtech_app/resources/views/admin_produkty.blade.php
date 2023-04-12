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
            <a href="/" class="navbar-brand"><img src="../images/logo_black.png" alt=""
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
    @if($message = Session::get('successDelProd'))
        <div class="alert alert-success alert-dismissible" role="alert" id="myAlert">
            {{ $message }}
            <button type="button" class="close float-end">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section>
        <div class="container-fluid mt-5 bg-light sectionpm">
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
                <form method="POST" action="{{ route('create_item') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" name="rating" id="rating" class="form-control" placeholder="Max 5" required>
                    </div>

                    <div class="form-group">
                        <label for="category1">Category 1</label>
                        <input type="text" name="category1" id="category1" class="form-control" placeholder="Typ na e-shope" required>
                    </div>

                    <div class="form-group">
                        <label for="category2">Category 2</label>
                        <input type="text" name="category2" id="category2" class="form-control" placeholder="Značka">
                    </div>
                    
                    <div class="form-group">
                        <label for="category3">Category 3</label>
                        <input type="text" name="category3" id="category3" class="form-control" placeholder="Typ">
                    </div>
                    
                    <div class="form-group">
                        <label for="category3">Category 4</label>
                        <input type="text" name="category4" id="category4" class="form-control" placeholder="Ľubovolné">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"  required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image1">Image1</label>
                        <input type="text" name="image1" id="image1" class="form-control" placeholder="../images/nazov_foto.png" required>
                    </div>
                    <div class="form-group">
                        <label for="image2">Image2</label>
                        <input type="text" name="image2" id="image" class="form-control" placeholder="../images/nazov_foto.png" required>
                    </div>
                    <div class="form-group">
                        <label for="image3">Image3</label>
                        <input type="text" name="image3" id="image3" class="form-control" placeholder="../images/nazov_foto.png" >
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="image1">Image 1</label>
                        <input type="file" name="image1" id="image1" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="image2">Image 2</label>
                        <input type="file" name="image2" id="image2" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="image3">Image 3</label>
                        <input type="file" name="image3" id="image3" class="form-control-file">
                    </div>
                    -->

                    <button type="submit" class="btn btn-primary">Submit</button>
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


    <script>
        document.querySelector('.alert .close').addEventListener('click', function() {
            document.querySelector('.alert').style.display = 'none';
        });
    </script>
</body>

</html>