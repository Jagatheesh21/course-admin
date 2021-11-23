<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{config('app.name')}} | @yield('title')</title>

	<!-- App favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon-32x32.png')}}">


	<!-- Global stylesheets -->
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
		type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<style type="text/css">
		.hiddenRow {
		    padding: 0 !important;
		}
	</style>

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


	<script src="{{ asset('global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/perfect_scrollbar.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
	<script src="{{ asset('assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light navbar-static fixed-top">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="index.html" class="d-inline-block">
					<img   src="{{asset('global_assets/images/logo_icon_dark.png')}}" alt="">

				</a>

			</div>

			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_icon_light.png" alt="">

				</a>

			</div>
		</div>
		<!-- /header with logos -->


		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_dark.png" alt="">
				</a>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>


			</ul>

			<span class="badge bg-pink-400 badge-pill ml-md-3 mr-md-auto">10 courses</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
						English
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item english active"><img src="global_assets/images/lang/gb.png"
								class="img-flag" alt=""> English</a>

					</div>
				</li>



				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
						data-toggle="dropdown">
						<img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle mr-2"
							height="34" alt="">
						<span>{{Auth::user()->name}}
						</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>


						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        	@csrf
                                        </form>

					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->

	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-fixed sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content ps">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}"
									class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">{{Auth::user()->name}}</h6>
							<span class="font-size-sm text-white text-shadow-dark">Super Admin</span>
						</div>

						<div class="sidebar-user-material-footer">
							<a href="#user-nav"
								class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
								data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">


							<li class="nav-item">
								<a href="{{route('logout')}}" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->

				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
								title="Main"></i>
						</li>
						<li class="nav-item">
							<a href="#"
								class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('list-categories')}}"
								class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"><i
									class="icon-book"></i><span>Categories</span></a>
						</li>

						<li class="nav-item nav-item">
							<a href="{{route('view-course')}}" class="nav-link {{ request()->is('courses*') ? 'active' : '' }}"><i
									class="icon-feed"></i> <span>Courses</span></a>

							<!-- <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="{{route('add-course')}}" class="nav-link"><i
											class="icon-file-plus2"></i>Add Courses</a>
								</li>
								<li class="nav-item"><a href="{{route('view-course')}}" class="nav-link"><i
											class="icon-file-text3"></i>View
										Courses</a></li>
										<a href="{{route('view-course')}}"
											class="nav-link {{ request()->is('courses*') ? 'active' : '' }}"><i
												class="icon-book"></i><span>Courses</span></a>
							</ul> -->
						</li>





						<!-- /main -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
