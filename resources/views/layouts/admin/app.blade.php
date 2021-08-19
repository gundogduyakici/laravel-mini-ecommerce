<!doctype html>
<html lang="tr">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{ asset('assets/admin/img/fav.png') }}">

		<!-- Title -->
		<title>Valvera Design - Admin Dashboard</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
		
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/fonts/style.css') }}">

		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">

		@stack('css')

		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Search Filter JS -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/search-filter/search-filter.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/search-filter/custom-search-filter.css') }}">
		
	</head>
	<body>

		<!-- Loading wrapper start -->
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Yükleniyor...
		</div>
		<!-- Loading wrapper end -->

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav class="sidebar-wrapper">

				<!-- Sidebar content start -->
				<div class="sidebar-tabs">

					<!-- Tabs nav start -->
					<div class="nav" role="tablist" aria-orientation="vertical">
						<a href="{{ route('admin.dashboard') }}" class="logo">
							<img src="{{ asset('assets/admin/img/logo.svg') }}" alt="Valvera Admin">
						</a>
						<a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="false">
							<i class="icon-home2"></i>
							<span class="nav-link-text">Dashboards</span>
						</a>
						<a class="nav-link {{ (request()->is('admin/admin_product*')) ? 'active' : '' }}" id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab" aria-controls="tab-product" aria-selected="true">
							<i class="icon-layers2"></i>
							<span class="nav-link-text">Product Management</span>
						</a>
						<a class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}" id="category-tab" data-bs-toggle="tab" href="#tab-category" role="tab" aria-controls="tab-pages" aria-selected="false">
							<i class="icon-edit1"></i>
							<span class="nav-link-text">Category Management</span>
						</a>
						<a class="nav-link {{ (request()->is('admin/pages*')) ? 'active' : '' }}" id="pages-tab" data-bs-toggle="tab" href="#tab-pages" role="tab" aria-controls="tab-forms" aria-selected="false">							
							<i class="icon-book-open"></i>
							<span class="nav-link-text">Page Management</span>
						</a>
						<a class="nav-link {{ (request()->is('admin/inbox*')) ? 'active' : '' }}" id="inbox-tab" href="{{ route('admin.inbox') }}">							
							<i class="icon-mail"></i>
							<span class="nav-link-text">Inbox</span>
						</a>					
					</div>
					<!-- Tabs nav end -->

					<!-- Tabs content start -->
					<div class="tab-content">
								
						<!-- Chat tab -->
						<div class="tab-pane fade {{ (request()->is('admin/dashboard')) ? 'show active' : '' }}" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
							<!-- Tab content header start -->
							<div class="tab-pane-header show active">
								Dashboards
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="{{ route('admin.dashboard') }}" class="{{ (request()->is('admin/dashboard')) ? 'current-page' : '' }}">Statistics</a>
										</li>										
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile red">
									<i class="icon-mail"></i> Inbox ({{ $data['inbox_count']->count() }})
								</div>
							</div>
							<!-- Sidebar actions ends -->
						</div>

						<!-- Pages tab -->
						<div class="tab-pane fade {{ (request()->is('admin/admin_product*')) ? 'show active' : '' }}" id="tab-product" role="tabpanel" aria-labelledby="product-tab">
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Product Management
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>										
										<li>
											<a href="{{ route('admin_product.create') }}" class="{{ (request()->is('admin/admin_product/create')) ? 'current-page' : '' }}">Add New Product</a>
										</li>
										<li>
											<a href="{{ route('admin_product.index') }}" class="{{ (request()->is('admin/admin_product')) ? 'current-page' : '' }}">Product List</a>
										</li>										
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile red">
									<i class="icon-mail"></i> Inbox ({{ $data['inbox_count']->count() }})
								</div>
							</div>
							<!-- Sidebar actions ends -->
						</div>

						<!-- Pages tab -->
						<div class="tab-pane fade {{ (request()->is('admin/category*')) ? 'show active' : '' }}" id="tab-category" role="tabpanel" aria-labelledby="pages-tab">
							
							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Category Management
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="{{ route('category.create') }}" class="{{ (request()->is('admin/category/create')) ? 'current-page' : '' }}">Add New Category</a>
										</li>
										<li>
											<a href="{{ route('category.index') }}" class="{{ (request()->is('admin/category')) ? 'current-page' : '' }}">Category List</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile red">
									<i class="icon-mail"></i> Inbox ({{ $data['inbox_count']->count() }})
								</div>
							</div>
							<!-- Sidebar actions ends -->

						</div>

						<!-- Forms tab -->
						<div class="tab-pane fade {{ (request()->is('admin/pages*')) ? 'show active' : '' }}" id="tab-pages" role="tabpanel" aria-labelledby="forms-tab">

							<!-- Tab content header start -->
							<div class="tab-pane-header">
								Page Management
							</div>
							<!-- Tab content header end -->

							<!-- Sidebar menu starts -->
							<div class="sidebarMenuScroll">
								<div class="sidebar-menu">
									<ul>
										<li>
											<a href="{{ route('admin.about') }}" class="{{ (request()->is('admin/pages/about-us')) ? 'current-page' : '' }}">About Us</a>
										</li>
										<li>
											<a href="{{ route('admin.contact') }}" class="{{ (request()->is('admin/pages/contact-information')) ? 'current-page' : '' }}">Contact Information</a>
										</li>
									</ul>									
								</div>
							</div>
							<!-- Sidebar menu ends -->

							<!-- Sidebar actions starts -->
							<div class="sidebar-actions">
								<div class="support-tile red">
									<i class="icon-mail"></i> Inbox ({{ $data['inbox_count']->count() }})
								</div>
							</div>
							<!-- Sidebar actions ends -->
						</div>					
					</div>
					<!-- Tabs content end -->

				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Page header starts -->
				<div class="page-header">
					
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">
							<div class="search-container">
								<!-- Toggle sidebar start -->
								<div class="toggle-sidebar" id="toggle-sidebar">
									<i class="icon-menu"></i>
								</div>
								<!-- Toggle sidebar end -->
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

							<!-- Header actions start -->
							<ul class="header-actions">
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="avatar">
											<img src="{{ asset('assets/admin/img/user.svg') }}" alt="User Avatar">											
										</span>
									</a>
									<div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i>Logout</a>
										</div>
									</div>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
							<!-- Header actions end -->

						</div>
					</div>
					<!-- Row end -->					

				</div>
				<!-- Page header ends -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						@yield('content')

					</div>
					<!-- Content wrapper end -->

					<!-- App Footer start -->
					<div class="app-footer">© 2021 Gündoğdu Yakıcı</div>
					<!-- App footer end -->

				</div>
				<!-- Content wrapper scroll end -->

			</div>
			<!-- *************
				************ Main container end *************
			************* -->

		</div>
		<!-- Page wrapper end -->

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

		<!-- Slimscroll JS -->
		<script src="{{ asset('assets/admin/vendor/slimscroll/slimscroll.min.js') }}"></script>
		<script src="{{ asset('assets/admin/vendor/slimscroll/custom-scrollbar.js') }}"></script>

		<!-- Search Filter JS -->
		<script src="{{ asset('assets/admin/vendor/search-filter/search-filter.js') }}"></script>
		<script src="{{ asset('assets/admin/vendor/search-filter/custom-search-filter.js') }}"></script>

		@stack('js')

		<!-- Main Js Required -->
		<script src="{{ asset('assets/admin/js/main.js') }}"></script>

	</body>

</html>