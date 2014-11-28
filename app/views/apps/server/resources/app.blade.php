<!-- widget grid -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">		

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-core"
				data-widget-load="{{ route('linfo-widget', 'core') }}"
				data-widget-deletebutton="false"
				data-widget-editbutton="false" 
				data-widget-fullscreenbutton="false">

				<header role="heading">
					<span class="widget-icon">
						<i class="fa fa-cube"></i>
					</span>
					<h2>{{ Lang::get('linfo.header') }}</h2>
				</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget content -->
					<div class="widget-body no-padding"/>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-network" 
				data-widget-load="{{ route('linfo-widget', 'network') }}"
				data-widget-deletebutton="false"
				data-widget-editbutton="false" 
				data-widget-fullscreenbutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-signal"></i> </span>
					<h2>{{ Lang::get('linfo.network_devices') }}</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget content -->
					<div class="widget-body no-padding"/>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-device"
				data-widget-load="{{ route('linfo-widget', 'device') }}"
				data-widget-deletebutton="false"
				data-widget-editbutton="false" 
				data-widget-fullscreenbutton="false">

				<header role="heading">
					<span class="widget-icon">
						<i class="fa fa-desktop"></i>
					</span>
					<h2>{{ Lang::get('linfo.hardware') }}</h2>
				</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget content -->
					<div class="widget-body no-padding"/>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-memory" 
				data-widget-load="{{ route('linfo-widget', 'memory') }}"
				data-widget-editbutton="false" 
				data-widget-deletebutton="false" 
				data-widget-fullscreenbutton="false"> 

				<header role="heading">
					<span class="widget-icon">
						<i class="fa fa-dashboard"></i>
					</span>
					<h2>{{ Lang::get('linfo.memory') }}</h2>		
							
					<div class="widget-toolbar" id="switch-1">
						<span class="onoffswitch-title">
							<i class="glyphicon glyphicon-time"/>
							{{ Lang::get('linfo.real_time') }}
						</span>
						<span class="onoffswitch">
							<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="memoryonoffswitch"/>
							<label class="onoffswitch-label" for="memoryonoffswitch"> 
								<span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"/> 
								<span class="onoffswitch-switch"/>
							</label> 
						</span>
					</div>
				</header>

				<!-- widget div-->
				<div role="content">
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox"/>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding"/>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->

	<!-- row -->
	<div class="row">		
		<!-- NEW WIDGET START -->
		<article class="col-xs-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-mount"
				data-widget-load="{{ route('linfo-widget', 'mount') }}"
				data-widget-deletebutton="false"
				data-widget-editbutton="false" 
				data-widget-fullscreenbutton="false">

				<header role="heading">
					<span class="widget-icon">
						<i class="fa fa-hdd-o"></i>
					</span>
					<h2>{{ Lang::get('linfo.filesystem_mounts') }}</h2>
				</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget content -->
					<div class="widget-body no-padding"/>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- END WIDGET START -->
	</div>
	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">	

	pageSetUp();
	
	var pagefunction = function() {
		// clears the variable if left blank
	};
	
	pagefunction();
	
</script>