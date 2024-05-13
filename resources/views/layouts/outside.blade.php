<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />	

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>BMW - @yield('title')</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="{{URL::asset('assets/css/main.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="{{URL::asset('plugins/fontawesome/css/font-awesome.css')}}">	
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>	
	
	<style>
        .navbar-brand img {
			max-width: 20% !important;
		}		
		.navbar-brand strong {
			font-size: 13px !important;
		}
	</style>
	
	<!--=== JavaScript ===-->

	<script type="text/javascript" src="{{URL::asset('assets/js/libs/jquery-1.10.2.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>

	<script type="text/javascript" src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/libs/lodash.compat.min.js')}}"></script>

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="{{URL::asset('plugins/touchpunch/jquery.ui.touch-punch.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/event.swipe/jquery.event.move.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/event.swipe/jquery.event.swipe.js')}}"></script>

	<!-- General -->
	<script type="text/javascript" src="{{URL::asset('assets/js/libs/breakpoints.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/respond/respond.min.js')}}"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="{{URL::asset('plugins/cookie/jquery.cookie.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js')}}"></script>

	<script type="text/javascript" src="{{URL::asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
	
	<script type="text/javascript" src="{{URL::asset('plugins/daterangepicker/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>
	
	<script type="text/javascript" src="{{URL::asset('plugins/pickadate/picker.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/pickadate/picker.date.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/pickadate/picker.time.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>

	<!-- Noty -->
	<script type="text/javascript" src="{{URL::asset('plugins/noty/jquery.noty.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/noty/layouts/top.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/noty/layouts/topRight.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/noty/themes/default.js')}}"></script>

	<!-- Forms -->
	<script type="text/javascript" src="{{URL::asset('plugins/uniform/jquery.uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/fileinput/fileinput.js')}}"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="{{URL::asset('plugins/validation/jquery.validate.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/validation/additional-methods.min.js')}}"></script>

	<!-- DataTables -->
	<script type="text/javascript" src="{{URL::asset('plugins/datatables/jquery.dataTables.1.10.min.js')}}"></script>	
	
	<script type="text/javascript" src="{{URL::asset('plugins/datatables/DT_bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('plugins/datatables/responsive/datatables.responsive.js')}}"></script> <!-- optional -->	
	
	<!-- App -->
	<script type="text/javascript" src="{{URL::asset('assets/js/app.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/plugins.form-components.js')}}"></script>

	<!-- Extras -->		
	<script src="{{URL::asset('plugins/highcharts/highcharts.js')}}"></script>
	<script src="{{URL::asset('plugins/highcharts/modules/exporting.js')}}"></script>
	
	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>

	<script type="text/javascript">
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	</script>

	<!-- Demo JS -->
	<script type="text/javascript" src="{{URL::asset('assets/js/custom.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/js/demo/pages_calendar.js')}}"></script>

	<script>
	"use strict";
	jQuery(document).ready(function($){

		$.extend( $.validator.defaults, {
			invalidHandler: function(form, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
					? 'Falta completar 1 dato. Ha sido resaltado.'
					: 'Falta completar ' + errors + ' datos. Han sido resaltados.';
					noty({
						layout: 'topRight',
						text: message,
						type: 'error',
						timeout: 2000
					});
				}
			}
		});

		if($("#main-form")){
			$("#main-form").validate();	
		} 

	});
	</script>
	
	@section('javascript')
            
    @show
	
	@section('css')
	
    @show

</head>
<body>	
	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><<i class="fa fa-bars" aria-hidden="true"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo url('/');?>">
				<img src="{{URL::asset('images/logo.gif')}}" alt="logo" />
				<strong>Antamina Seguridad</strong>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</a>
			<!-- /Sidebar Toggler -->
			
			<!-- /Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- User Login Dropdown -->
				<?php if(Auth::user()) { ?>
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
						<i class="fa fa-male" aria-hidden="true"></i>
						<span class="username">{{Auth::user()->name}}</span>
						<i class="fa fa-caret-down small" aria-hidden="true"></i>
					</a>
					<ul class="dropdown-menu">
						<?php $user_url = action('UserController@edit', ['user' => Auth::user()->id]); ?>
						<li><a href="{{url('/logout')}}"><i class="icon-key"></i> Cerrar Sesión</a></li>
					</ul>
				</li>
				<?php } ?>
				<!-- /user login dropdown -->
			</ul>
		</div>

	</header> <!-- /.header -->

	<div id="container">
		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<!--<li>
							<i class="icon-home"></i>
							<a href="index.html">Dashboard</a>
						</li>
						<li class="current">
							<a href="pages_calendar.html" title="">Calendar</a>
						</li>-->
					</ul>

					<!--<ul class="crumb-buttons">
						<li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
						<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
							<ul class="dropdown-menu pull-right">
							<li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
							<li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
							</ul>
						</li>
						<li class="range"><a href="#">
							<i class="icon-calendar"></i>
							<span></span>
							<i class="icon-angle-down"></i>
						</a></li>
					</ul>-->
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>@yield('title')</h3>
						<span>@yield('subtitle')</span>
					</div>

				</div>
				<!-- /Page Header -->

				@if (session('flash_message'))
				<div class="row">
					<div class="col-md-12">
						<p class="alert alert-{{ session('flash_type') }}">
							{{ session('flash_message') }}
						</p>
					</div>
				</div>
				@endif

				<!--=== Page Content ===-->
				@yield('content')
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>