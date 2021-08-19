<!doctype html>
<html lang="tr">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Valvera Design Admin Panel">
		<meta name="author" content="Gündoğdu Yakıcı">
		<link rel="shortcut icon" href="{{ asset('assets/admin/img/fav.png') }}" />

		<!-- Title -->
		<title>Gündoğdu Yakıcı Admin Panel | Login</title>

		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
		
		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

	</head>
	<body class="authentication">

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>
		<!-- Loading wrapper end -->

		<!-- *************
			************ Login container start *************
		************* -->
		<div class="login-container">

			<div class="container-fluid h-100">

			<!-- Row start -->
			<div class="row g-0 h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>MINI</span>
							<span>E-COMMERCE</span>
							<span>ADMIN PANEL</span>
						</div>
						<div class="about-desc">
							Admin panel specially prepared for e-commerce system.
						</div>						
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form method="POST" action="{{ route('login') }}">
							@csrf
							<div class="login-screen">
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="{{ asset('assets/admin/img/logo.svg') }}" alt="logo">
									</a>
									<h6>Welcome,<br>Please login.</h6>

									@if ($errors->has('email'))
										<span style="color: red; display: block; margin-bottom: 15px;">
											<strong style="font-weight: 600;">{{ $errors->first('email') }}</strong>
										</span>
									@endif
									<div class="field-wrapper">
										<input type="email" name="email" required autofocus>
										<div class="field-placeholder">E-Mail</div>
									</div>

									@if ($errors->has('password'))
										<span style="color: red; display: block; margin-bottom: 15px;">
											<strong style="font-weight: 600;">{{ $errors->first('password') }}</strong>
										</span>
									@endif
									<div class="field-wrapper mb-3">
										<input type="password" name="password" required>
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">										
										<button type="submit" class="btn btn-primary">Sign In</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->
		
			</div>
		</div>
		<!-- *************
			************ Login container end *************
		************* -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/modernizr.js') }}"></script>
		<script src="{{ asset('assets/admin/js/moment.js') }}"></script>
		
		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
		<script src="{{ asset('assets/admin/js/main.js') }}"></script>

	</body>

</html>