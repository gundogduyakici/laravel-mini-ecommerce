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
		<title>Valvera Design Admin Panel | Üye Ol</title>

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
			Yükleniyor...
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
							<span>Valvera</span>
							<span>Desıgn</span>
							<span>HOME | WALL | WOOD | TOOLS</span>
						</div>
						<div class="about-desc">
							Valvera Design e-ticaret sistemi için özel olarak hazırlanmış admin paneli.
						</div>						
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form method="POST" action="{{ route('register') }}">
                            @csrf
							<div class="login-screen">
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="{{ asset('assets/admin/img/logo.svg') }}" alt="logo">
									</a>
									<h6>Hoşgeldiniz,<br>Üyelik Oluşturun.</h6>
                                    @if ($errors->has('name'))
                                        <span style="color: red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <div class="field-wrapper">
										<input type="text" name="name" autofocus>
										<div class="field-placeholder">Ad Soyad</div>
									</div>

                                    @if ($errors->has('email'))
                                        <span style="color: red;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
									<div class="field-wrapper">
										<input type="email" name="email" autofocus>
										<div class="field-placeholder">E-Posta</div>
									</div>

                                    @if ($errors->has('password'))
                                        <span style="color: red;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
									<div class="field-wrapper mb-3">
										<input type="password" name="password">
										<div class="field-placeholder">Şifre</div>
									</div>

                                    @if ($errors->has('password_confirmation'))
                                        <span style="color: red;">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
									<div class="field-wrapper mb-3">
										<input type="password" name="password_confirmation">
										<div class="field-placeholder">Şifre Tekrar</div>
									</div>
									<div class="actions">										
										<button type="submit" class="btn btn-primary">Üye Ol</button>
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