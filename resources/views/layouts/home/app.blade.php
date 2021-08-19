<!DOCTYPE html>
<html lang="tr">

<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Valvera Design | @yield('title')</title>
	<link rel="icon" type="image/png" href="{{ asset('assets/home/images/favicon.png') }}"/>
	<!-- include the site stylesheet -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/home/css/animate.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/home/css/icon-fonts.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/home/css/main.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/home/css/responsive.css') }}">
	@stack('css')
</head>
<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- Page Loader -->
		<div id="pre-loader" class="loader-container">
			<div class="loader">
				<img src="{{ asset('assets/home/images/loading.gif') }}" alt="loader">
			</div>
		</div>
		<!-- W1 start here -->
		<div class="w1">
			<!-- mt header style4 start here -->
			<header id="mt-header" class="style4">
				<!-- mt bottom bar start here -->
				<div class="mt-bottom-bar">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<!-- mt logo start here -->
								<div class="mt-logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/home/images/mt-logo.png') }}" alt="schon"></a></div>
								<!-- mt icon list start here -->
								<ul class="mt-icon-list">
									<li class="hidden-lg hidden-md">
										<a href="#" class="bar-opener mobile-toggle">
											<span class="bar"></span>
											<span class="bar small"></span>
											<span class="bar"></span>
										</a>
									</li>
								</ul><!-- mt icon list end here -->
								<!-- navigation start here -->
								<nav id="nav">
									<ul>
										<li>
											<a href="{{ route('home') }}">HOME </a>											
										</li>										
										<li>
											<a class="drop-link" href="javascript:;">PRODUCTS <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
											@if(count($data['categories_menu']))
												<div class="s-drop">
													<ul>
														@foreach ($data['categories_menu'] as $category)
															<li><a href="{{ url('category/'.$category->slug.'/'.$category->id) }}">{{ $category->name }}</a></li>
														@endforeach													
													</ul>
												</div>
											@endif											
										</li>
                                        <li>
											<a href="{{ url('/about-us') }}">ABOUT US</a>											
										</li>
										<li><a href="{{ url('/contact') }}">CONTACT</a></li>
									</ul>
								</nav>
								<!-- mt icon list end here -->
							</div>
						</div>
					</div>
				</div>
				<!-- mt bottom bar end here -->
				<span class="mt-side-over"></span>
			</header><!-- mt header style4 end here -->

            @yield('content')

            <!-- footer of the Page -->
			<footer id="mt-footer" class="style1 wow fadeInUp" data-wow-delay="0.4s">
				<!-- Footer Holder of the Page -->
				<div class="footer-holder dark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4 mt-paddingbottomsm">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<div class="logo">
										<a href="#"><img src="{{ asset('assets/home/images/logo.png') }}" alt="Valvera Logo"></a>
									</div>
									<!--<p>Exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>-->
									<!-- Social Network of the Page -->
									<ul class="list-unstyled social-network">
										<li><a target="_blank" href="https://instagram.com/valveradesign"><i class="fa fa-instagram"></i> <span style="font-size: 22px;">Instagram</span></a></li><br>
										<li><a target="_blank" href="https://web.whatsapp.com/send?l=tr&phone=905382474307&text=Merhaba"><i class="fa fa-whatsapp"></i> <span style="font-size: 22px;">WhatsApp</span></a></li>
									</ul>
									<!-- Social Network of the Page end -->
								</div>
								<!-- F Widget About of the Page end -->
							</div>							
							<div class="col-xs-12 col-sm-6 col-md-4 mt-paddingbottomxs">
								<!-- Footer Tabs of the Page -->
								<div class="f-widget-tabs">
									<h3 class="f-widget-heading">Product Categories</h3>
									@if(count($data['categories_menu']))
										<ul class="list-unstyled tabs">
											@foreach ($data['categories_menu'] as $category)
												<li><a href="{{ url('category/'.$category->slug.'/'.$category->id) }}">{{ $category->name }}</a></li>
											@endforeach
										</ul>
									@endif									
								</div>
								<!-- Footer Tabs of the Page -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 text-right">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<h3 class="f-widget-heading">Contact Information</h3>
									<ul class="list-unstyled address-list align-right">
										<!--<li><i class="fa fa-map-marker"></i><address>Connaugt Road Central Suite 18B, 148 <br>New Yankee</address></li>-->
										<li><i class="fa fa-phone"></i><a href="tel:+905382474307">0 (555) 444 33 22</a></li>
										<li><i class="fa fa-envelope-o"></i><a href="mailto:info@valveradesign.com">info@siteinfo.com</a></li>
									</ul>
								</div>
								<!-- F Widget About of the Page end -->
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Holder of the Page end -->
				<!-- Footer Area of the Page -->
				<div class="footer-area">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<p>© 2021 <a href="#">Gündoğdu Yakıcı.</a> - Tüm Hakları Saklıdır.</p>
							</div>
							<div class="col-xs-12 col-sm-6 text-right">
								<div class="bank-card">
									<img src="{{ asset('assets/home/images/bank-card.png') }}" alt="bank-card">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Area of the Page end -->
			</footer><!-- footer of the Page end -->
		</div><!-- W1 end here -->
		<span id="back-top" class="fa fa-arrow-up"></span>
	</div>	

	<!-- include jQuery -->
	<script src="{{ asset('assets/home/js/jquery.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ asset('assets/home/js/plugins.js') }}"></script>
	<!-- include jQuery -->
	<script src="{{ asset('assets/home/js/jquery.main.js') }}"></script>

	@stack('js')
</body>

</html>