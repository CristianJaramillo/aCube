{{-- UI configuration (nav, ribbon, etc.) --}}

{{-- include header --}}
@include('inc.header')

{{-- include nav --}}
@include('inc.nav')

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	{{-- include ribbon --}}
	@include('inc.ribbon')

	<!-- MAIN CONTENT -->
	<div id="content">
		
	</div>
	<!-- END MAIN CONTENT -->
		
</div>
<!-- END MAIN PANEL -->

<!-- FOOTER -->
{{-- include footer --}}
@include('inc.footer')
<!-- END FOOTER -->

{{-- include scripts --}}
@include('inc.scripts')

{{-- include google-analytics --}}
@include('inc.google-analytics')