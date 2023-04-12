<!DOCTYPE html>
<html lang="en">



<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fiit-Shop</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/produkty.css">
	<link rel="stylesheet" href="css/footer.css">
</head>

<body class="container">

	<!-- základná navigácia -->
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

	<!-- header pre selectovanie typov... -->
	<header>
		<div class="container justify-content-around">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-lg-4">
				<div class="col text-center mb-2 mb-lg-8">
					<a class="nav-link nav-links" href="prehlad_produktov">športová výživa</a>
				</div>
				<div class="col text-center mb-2 mb-lg-8">
					<a class="nav-link nav-links" href="prehlad_produktov">športové oblečenie</a>
				</div>
				<div class="col text-center mb-2 mb-lg-8">
					<a class="nav-link nav-links" href="prehlad_produktov">príslušenstvo</a>
				</div>
				<div class="col text-center mb-2 mb-lg-8">
					<a class="nav-link nav-links" href="prehlad_produktov">zdravé potraviny</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Táto sekcia je hlavná sekcia, obsahuje filtre a carty s produktami -->
	<section class="filters bg-light container-fluid mt-3">
		<!-- Filtre -->
		<div class="mb-5">
			<div class="row justify-content-center mt-3 gy-2">
				<div class="col-auto">
					<label for="cost" class="mb-2"><strong>Cena</strong></label>
					<input type="range" class="form-range" id="cost" name="cost" min="0" max="1000" step="10">
				</div>
			</div>
			<div class="row justify-content-center mt-3 gy-2">
				<div class="col-auto">
					<label for="brand" class="mb-2"><strong>Kategória</strong></label>
					<select class="form-select" id="brand" name="znacka">
						<option value="w1">Whey</option>
						<option value="w2">Whey2</option>
						<option value="we3">Whey3</option>
					</select>
				</div>
			</div>
			<div class="row justify-content-center mt-3 gy-2">
				<div class="col-auto justify-content-center mt-3 gy-2 d-flex flex-column">
					<label for="size" class="mb-2"><strong>Značka</strong></label>
					<div class="btn-group" role="group" aria-label="Váha">
						<input class="btn-check" type="radio" name="size" id="size-s" value="s" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-s">Whey</label>

						<input class="btn-check" type="radio" name="size" id="size-m" value="m" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-m">EX4</label>

						<input class="btn-check" type="radio" name="size" id="size-l" value="l" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-l">EY5</label>
					</div>
				</div>
			</div>
			<div class="row justify-content-center mt-4 mb-3 gy-2">
				<div class="col-auto">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Hľadať...">
						<div class="input-group-append">
							<button type="submit" class="btn btn-outline-secondary">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-light products_list container-fluid">
			<!-- List produktov -->
			<div class="row">
				<div class="col-lg-4 mb-4">
					<div class="card">
						<a href="product_detail">
							<img class="card-img-top" src="../images/img1.png" alt="Product Image"></a>
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<h5 class="card-title">Product 1</h5>
								<h6 class="card-subtitle mb-2 text-muted">$10.00</h6>
							</div>
							<button type="button" class="btn btn-danger">do košíka</button>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card">
						<a href="product_detail">
							<img class="card-img-top" src="../images/img1.png" alt="Product Image"></a>
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<h5 class="card-title">Product 2</h5>
								<h6 class="card-subtitle mb-2 text-muted">$11.00</h6>
							</div>
							<button type="button" class="btn btn-danger">do košíka</button>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card">
						<a href="product_detail">
							<img class="card-img-top" src="../images/img1.png" alt="Product Image"></a>
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<h5 class="card-title">Product 3</h5>
								<h6 class="card-subtitle mb-2 text-muted">$20.00</h6>
							</div>
							<button type="button" class="btn btn-danger">do košíka</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 mb-4">
						<div class="card">
							<a href="product_detail">
								<img class="card-img-top" src="../images/img1.png" alt="Product Image"></a>
							<div class="card-body d-flex justify-content-between align-items-center">
								<div>
									<h5 class="card-title">Product 4</h5>
									<h6 class="card-subtitle mb-2 text-muted">$13.00</h6>
								</div>
								<button type="button" class="btn btn-danger">do košíka</button>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-4">
						<div class="card">
							<a href="product_detail">
								<img class="card-img-top" src="../images/img1.png" alt="Product Image"></a>
							<div class="card-body d-flex justify-content-between align-items-center">
								<div>
									<h5 class="card-title">Long product</h5>
									<h6 class="card-subtitle mb-2 text-muted">$10444.00</h6>
								</div>
								<button type="button" class="btn btn-danger">do košíka</button>
							</div>
						</div>
					</div>

					<!-- Stránkovanie  << >>  -->
					<div class="row justify-content-center mb-4 paging_lr container-fluid">
						<div class="col-auto">
							<a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a>
						</div>
						<div class="col-auto">
							<a class="page-link" href="#">&raquo;</a>
						</div>
					</div>

				</div>
	</section>

	<!-- Základná footer -->
	<footer id="footer" class="mt-5 text-center ">
		<div class="container footer_pm">
			<div class="row row-cols-1 row-cols-md-3 row-cols-lg-6">
				<div class="col text-center mb-2 mb-lg-0">
					<a class="footer_link" href="/"><i class="fa fa-facebook fa-lg "></i> FITShop</a>
				</div>
				<div class="col text-center mb-2 mb-lg-0">
					<a class="footer_link" href="/"><i class="fa fa-instagram fa-lg "></i> FITShop</a>
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
