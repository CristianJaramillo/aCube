<!-- widget grid -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">		
		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-core" data-widget-editbutton="false" data-widget-fullscreenbutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>{{ Lang::get('utils.linfo.core') }}</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="table-responsive">
								
							<table class="table table-hover">
								<tbody>
									@foreach ($core as $row)
										<tr>
											<td>{{ Lang::get('utils.linfo.' . $row[0]) }}</td>
											<td>{{ $row[1] }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-memory" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>{{ Lang::get('utils.linfo.memory') }}</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="table-responsive">
								
							<table class="table table-hover">
								<thead>
									<tr>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.type') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.free') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.used') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.size') }}
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($memory as $row)
										<tr>
											@foreach ($row as $value)
												<td>{{ $value }}</td>
											@endforeach
										</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-network_devices" data-widget-editbutton="false" data-widget-fullscreenbutton="false">

				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>{{ Lang::get('utils.linfo.network_devices') }}</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="table-responsive">
								
							<table class="table table-hover">
								<thead>
									<tr>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.device_name') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.type') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.amount_sent') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.amount_received') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.state') }}
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($network as $row)
										<tr>
											@foreach ($row as $value)
												<td>{{ $value }}</td>
											@endforeach
										</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>
					</div>
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
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-hardware" data-widget-editbutton="false" data-widget-fullscreenbutton="false">

				<header>
					<span class="widget-icon">
						<i class="fa fa-table"></i>
					</span>
					<h2>{{ Lang::get('utils.linfo.hardware') }}</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
												
						<div class="table-responsive">
							
							<table class="table">
								<thead>
									<tr>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.type') }}
										</th>
										<th> 
											<i class=""></i>
											{{ Lang::get('utils.linfo.vendor') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.device') }}
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($device as $row)
										<tr>
											@foreach ($row as $value)
												<td>{{ $value }}</td>
											@endforeach
										</tr>
									@endforeach	
								</tbody>
							</table>
							
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-drivers" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				
				<header>
					<span class="widget-icon">
						<i class="fa fa-table"></i>
					</span>
					<h2>{{ Lang::get('utils.linfo.drives') }}</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
												
						<div class="table-responsive">
							
							<table class="table">
								<thead>
									<tr>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.path') }}
										</th>
										<th> 
											<i class=""></i>
											{{ Lang::get('utils.linfo.vendor') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.name') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.size') }}
										</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
							
						</div>
					</div>
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
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-drivers" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				
				<header>
					<span class="widget-icon">
						<i class="fa fa-table"></i>
					</span>
					<h2>{{ Lang::get('utils.linfo.filesystem_mounts') }}</h2>
				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
												
						<div class="table-responsive">
							
							<table class="table">
								<thead>
									<tr>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.type') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.mount_point') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.filesystem') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.size') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.used') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.free') }}
										</th>
										<th>
											<i class=""></i>
											{{ Lang::get('utils.linfo.percent_used') }}
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($memorySystem as $row)
										<tr>
											@foreach ($row as $value)
												<td>{{ $value }}</td>
											@endforeach
										</tr>
									@endforeach	
								</tbody>
							</table>
							
						</div>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->
		</article>
		<!-- END NEW WIDGET START -->
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->

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