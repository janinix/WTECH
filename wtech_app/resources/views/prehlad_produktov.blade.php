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
	<link rel="stylesheet" href="css/pagination.css">
</head>

<body class="container">
	@php
		$value_filter = Session::get('vyziva')
	@endphp
	@if($message = Session::get('vyziva'))
        @php
			$products = DB::table('product')->select('id', 'name','price','image1')->where('category1','vyziva')->paginate(6);
		@endphp
	@elseif($message = Session::get('oblecenie'))
		@php
			$products = DB::table('product')->select('id', 'name','price','image1')->where('category1','oblecenie')->paginate(6);
		@endphp
	@elseif($message = Session::get('prislusenstvo'))
		@php
			$products = DB::table('product')->select('id', 'name','price','image1')->where('category1','prislusenstvo')->paginate(6);
		@endphp
	@elseif($message = Session::get('potraviny'))
		@php
			$products = DB::table('product')->select('id', 'name','price','image1')->where('category1','potraviny')->paginate(6);
		@endphp
	@else
		@php
			$products = DB::table('product')->select('id', 'name','price','image1')->paginate(6);
		@endphp
	@endif
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

	<!-- section pre selectovanie typov... -->
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
						<option value="w2">Beef</option>
						<option value="we3">Vegan</option>
					</select>
				</div>
			</div>
			<div class="row justify-content-center mt-3 gy-2">
				<div class="col-auto justify-content-center mt-3 gy-2 d-flex flex-column">
					<label for="size" class="mb-2"><strong>Značka</strong></label>
					<div class="btn-group" role="group" aria-label="Váha">
						<input class="btn-check" type="radio" name="size" id="size-s" value="s" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-s">Gymbeam</label>

						<input class="btn-check" type="radio" name="size" id="size-m" value="m" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-m">Biotech</label>

						<input class="btn-check" type="radio" name="size" id="size-l" value="l" autocomplete="off">
						<label class="btn btn-outline-secondary" for="size-l">GN</label>
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
				@foreach($products as $product )
					<div class="offset-1 col-10 offset-md-0 col-md-6 col-lg-4  mb-4">
						<div class="card">
							<form method='POST' action="{{ route('product_detail', $product->id) }}">
								@csrf
								<button type="submit">
									<img class="card-img-top" src= {{ $product->image1}} height="380px" alt="Product Image">
								</button>
							</form>

							<div class="card-body d-flex justify-content-between align-items-center">
								<div>
									<h5 class="card-title">{{$product->name}}</h5>
									<h6 class="card-subtitle mb-2 text-muted">{{$product->price}}€</h6>
								</div>
								<button type="button" class="btn btn-danger">do košíka</button>
							</div>
						</div>
					</div>
				@endforeach
				{{ $products->links() }}
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
