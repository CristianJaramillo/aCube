<!DOCTYPE html>
<html lang="@yield('lang')" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> @yield('title')</title>
		<meta name="description" content="@yield('description')">
		<meta name="author" content="@yield('author')">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}">

		<!-- SmartAdmin RTL Support is under construction
			 This RTL CSS will be released in version 1.5
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/demo.min.css') }}">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="{{ asset('img/splash/sptouch-icon-iphone.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/splash/touch-icon-ipad.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/splash/touch-icon-iphone-retina.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/splash/touch-icon-ipad-retina.png') }}">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="i{{ asset('mg/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">

	</head>
	
	<body class="animated fadeInDown">
		
		@section('header')
		<header id="header">

			<div id="logo-group">
				<span id="logo"> <img src="{{ asset('img/logo.png') }}" alt="SmartAdmin"> </span>
			</div>

			<span id="extr-page-header-space">
				<a href="{{ route('login') }}" class="btn btn-primary">Login</a>
				<a href="{{ route('sign-up') }}" class="btn btn-danger">Create account</a>
			</span>

		</header>
		@show

		<!-- MAIN PANEL -->
		<div id="main" role="main">
			@if(Auth::check())
				@yield('shortcuts')
				@yield('left-panel')
				@yield('ribbon')
				<!-- APP -->
				@yield('app')
				<!-- END APP -->
			@else
				<!-- MAIN CONTENT -->
				<div id="content" class="container">
					<!-- APP -->
					@yield('app')
					<!-- END APP -->
				</div>
			@endif
			</div>
		<!-- END MAIN PANEL -->

		@section('footer')
			<!-- FOOTER PANEL -->
			<!-- END FOOTER PANEL -->
		@show

		<!--================================================== -->	

		@section('script')
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="{{ asset('js/plugin/pace/pace.min.js') }}"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="{{ asset('js/libs/jquery-2.0.2.min.js') }}"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="{{ asset('js/libs/jquery-ui-1.10.3.min.js') }}"><\/script>');} </script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="{{ asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>
		
		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ asset('js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ asset('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ asset('js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ asset('js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ asset('js/plugin/fastclick/fastclick.min.js') }}"></script>

		<!-- SlimScroll: For fixed navigation scrolling -->
		<script src="{{ asset('js/plugin/slimscroll/jquery.slimscroll.min.js') }}"></script>

		<!--[if IE 8]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="{{ asset('js/demo.min.js') }}"></script>

		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('js/app.min.js') }}"></script>

		<script type="text/javascript">
			
			/* DO NOT REMOVE : GLOBAL FUNCTIONS!
			 *
			 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
			 *
			 * // activate tooltips
			 * $("[rel=tooltip]").tooltip();
			 *
			 * // activate popovers
			 * $("[rel=popover]").popover();
			 *
			 * // activate popovers with hover states
			 * $("[rel=popover-hover]").popover({ trigger: "hover" });
			 *
			 * // activate inline charts
			 * runAllCharts();
			 *
			 * // setup widgets
			 * setup_widgets_desktop();
			 *
			 * // run form elements
			 * runAllForms();
			 *
			 ********************************
			 *
			 * pageSetUp() is needed whenever you load a page.
			 * It initializes and checks for all basic elements of the page
			 * and makes rendering easier.
			 *
			 */

			pageSetUp();
			
			/*
			 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
			 * eg alert("my home function");
			 * 
			 * var pagefunction = function() {
			 *   ...
			 * }
			 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
			 * 
			 * TO LOAD A SCRIPT:
			 * var pagefunction = function (){ 
			 *  loadScript(".../plugin.js", run_after_loaded);	
			 * }
			 * 
			 * OR you can load chain scripts by doing
			 * 
			 * loadScript(".../plugin.js", function(){
			 * 	 loadScript("../plugin.js", function(){
			 * 	   ...
			 *   })
			 * });
			 */
			
			// pagefunction
			
			var pagefunction = function() {
				// clears the variable if left blank
			};
			
			// end pagefunction
			
			// run pagefunction
			pagefunction();
			
		</script>

		@show

	</body>
</html>