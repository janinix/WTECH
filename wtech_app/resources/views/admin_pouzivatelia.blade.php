

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
	<link rel="stylesheet" href="css/pagination.css">
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
                        <a href="admin_produkty" class="nav-link fs-2">Produkty</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout" class="nav-link fs-2">Odhlásenie</a>
                    </li>
				</ul>
			</div>
		</div>
	</nav>

	@if($message = Session::get('successDelUser'))
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
							<th scope="col">ID</th>
							<th scope="col">Meno</th>
							<th scope="col">Používatelské meno</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					
					@php
					$users = DB::table('users')->select('id', 'name', 'username', 'email')->paginate(1);
					@endphp
					
					@foreach ($users as $user)
						@if ($user->name != 'admin')
							<tr>
								<th scope='row'>{{ $user->id }}</th>
								<td>{{ $user->name }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<form method='POST' action="{{ route('delete_user', $user->id) }}">
										@csrf
										@method('DELETE')
										<input type='hidden' name='user' value='{{ json_encode($user) }}'>
										<button type='submit' class='btn btn-danger btn-sm'>Delete</button>
									</form>
								</td>
							</tr>
						@endif
					@endforeach
				</table>
				{{ $users->links() }}
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