	<!-- row -->
	<div class="row">

		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-home"></i> 
					Dashboard 
				<span>>  
					{{ $title }}
				</span>
			</h1>
		</div>
		<!-- end col -->
		
		<!-- right side of the page with the sparkline graphs -->
		<!-- col -->
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			<!-- sparks -->
			<ul id="sparks">
				<li class="sparks-info">
					<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
					<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
						1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
					<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
				<li class="sparks-info">
					<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
					<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
						110,150,300,130,400,240,220,310,220,300, 270, 210
					</div>
				</li>
			</ul>
			<!-- end sparks -->
		</div>
		<!-- end col -->
		
	</div>
	<!-- end row -->

	<!--
		The ID "widget-grid" will start to initialize all widgets below 
		You do not need to use widgets if you dont want to. Simply remove 
		the <section></section> and you can use wells or panels instead 
		-->

	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">
			
			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<!-- Widget ID (each widget will need unique ID)-->
				
				<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" role="widget">
					<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
						
						data-widget-colorbutton="false"	
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true" 
						data-widget-sortable="false"
							
					-->
					<header role="heading">
							
						<div class="jarviswidget-ctrls" role="menu">
							<a href="#" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse">
								<i class="fa fa-minus "></i>
							</a>
							<a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen">
								<i class="fa fa-expand "></i>
							</a>
							<a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete">
								<i class="fa fa-times"></i>
							</a>
						</div>
							
						<h2>
							<strong>Fixed</strong>
							<i>Height</i>
						</h2>				
							
						<span class="jarviswidget-loader">
							<i class="fa fa-refresh fa-spin"></i>
						</span>
					</header>

					<!-- widget div-->
					<div role="content">
							
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<input class="form-control" type="text">
								<span class="note">
									<i class="fa fa-check text-success"></i>
									Change title to update and save instantly!
								</span>
						</div>
						<!-- end widget edit box -->
							
						<!-- widget content -->
						<div class="widget-body no-padding">
								
							<div class="widget-body-toolbar">
								<div class="row">
									<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
										
									</div>
									<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
										<button class="btn btn-danger" id="addExt">
											<i class="fa fa-plus"></i> <span class="hidden-mobile">Add New Extension</span>
										</button>
									</div>
								</div>
							</div>
							
							<table id="jqgrid"></table>
							<div id="pjqgrid"></div>

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

	</section>
	<!-- end widget grid -->

	<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
					</div>
					<div class="modal-body custom-scroll terms-body">
						
						<!-- widget content -->
						<div class="widget-body fuelux">

						<div class="wizard">
							<ul class="steps">
								<li data-target="#step1" class="active">
									<span class="badge badge-info">1</span>Step 1<span class="chevron"></span>
								</li>
								<li data-target="#step2">
									<span class="badge">2</span>Step 2<span class="chevron"></span>
								</li>
								<li data-target="#step3">
									<span class="badge">3</span>Step 3<span class="chevron"></span>
								</li>
								<li data-target="#step4">
									<span class="badge">4</span>Step 4<span class="chevron"></span>
								</li>
								<li data-target="#step5">
									<span class="badge">5</span>Step 5<span class="chevron"></span>
								</li>
							</ul>
							<div class="actions">
								<button type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Prev
								</button>
								<button type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Next<i class="fa fa-arrow-right"></i>
								</button>
							</div>
						</div>
						<div class="step-content">
							<form class="form-horizontal" id="fuelux-wizard" method="post">

								<div class="step-pane active" id="step1">
									<h3><strong>Step 1 </strong> - Validation states</h3>

									<!-- wizard form starts here -->
									<fieldset>

										<div class="form-group has-warning">
											<label class="col-md-2 control-label">Input warning</label>
											<div class="col-md-10">
												<div class="input-group">
													<input class="form-control" type="text">
													<span class="input-group-addon"><i class="fa fa-warning"></i></span>
												</div>
												<span class="help-block">Something may have gone wrong</span>
											</div>

										</div>

										<div class="form-group has-error">
											<label class="col-md-2 control-label">Input error</label>
											<div class="col-md-10">
												<div class="input-group">
													<input class="form-control" type="text">
													<span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
												</div>
												<span class="help-block"><i class="fa fa-warning"></i> Please correct the error</span>
											</div>
										</div>

										<div class="form-group has-success">
											<label class="col-md-2 control-label">Input success</label>
											<div class="col-md-10">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
													<input class="form-control" type="text">
													<span class="input-group-addon"><i class="fa fa-check"></i></span>
												</div>
												<span class="help-block">Something may have gone wrong</span>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2">Input icon success</label>
											<div class="col-md-10">
												<div class="row">
													<div class="col-sm-12">

														<div class="input-icon-left">
															<i class="fa txt-color-green fa-check"></i>
															<input class="form-control" placeholder="Left Icon" type="text">
														</div>

													</div>
												</div>
											</div>
										</div>

									</fieldset>

								</div>

								<div class="step-pane" id="step2">
									<h3><strong>Step 2 </strong> - Alerts</h3>

									<div class="alert alert-warning fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-warning"></i>
										<strong>Warning</strong> Your monthly traffic is reaching limit.
									</div>

									<div class="alert alert-success fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-check"></i>
										<strong>Success</strong> The page has been added.
									</div>

									<div class="alert alert-info fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-info"></i>
										<strong>Info!</strong> You have 198 unread messages.
									</div>

									<div class="alert alert-danger fade in">
										<button class="close" data-dismiss="alert">
											×
										</button>
										<i class="fa-fw fa fa-times"></i>
										<strong>Error!</strong> The daily cronjob has failed.
									</div>

								</div>

								<div class="step-pane" id="step3">
									<h3><strong>Step 3 </strong> - Wizard continued</h3>
									<br>
									<br>
									<h1 class="text-center text-primary"> This will be your Step 3 </h1>
									<br>
									<br>
									<br>
									<br>
								</div>

								<div class="step-pane" id="step4">
									<h3><strong>Step 4 </strong> - Wizard continued...</h3>
									<br>
									<br>
									<h1 class="text-center text-danger"> This will be your Step 4 </h1>
									<br>
									<br>
									<br>
									<br>
								</div>

								<div class="step-pane" id="step5">
									<h3><strong>Step 5 </strong> - Finished!</h3>
									<br>
									<br>
									<h1 class="text-center text-success"><i class="fa fa-check"></i> Congratulations!
									<br>
									<small>Click finish to end wizard</small></h1>
									<br>
									<br>
									<br>
									<br>
								</div>

							</form>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancel
						</button>
						<button type="button" class="btn btn-primary" id="i-agree">
							<i class="fa fa-check"></i> I Agree
						</button>
						
						<button type="button" class="btn btn-danger pull-left" id="print">
							<i class="fa fa-print"></i> Print
						</button>
					</div>

					</div>
					<!-- end widget content -->
				
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

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
		 */

		var pagefunction = function() {
			loadScript("js/plugin/jqgrid/jquery.jqGrid.min.js", run_jqgrid_function);

			function run_jqgrid_function() {

				var jqgrid_data = [{
					id : "1",
					extension : "209",
					full_name : "Cristian Jaramillo",
					email : "cristian@intruder.mx"
				}];

				jQuery("#jqgrid").jqGrid({
					url: '{{ route('extensions') }}',
					datatype: "json",
					height : 'auto',
					mtype: "POST",
					colNames : [
						'Actions', 
						'id', 
						'{{  Lang::get('validation.attributes.extension') }}',
						'{{  Lang::get('validation.attributes.full_name') }}',
						'{{  Lang::get('validation.attributes.email') }}'
					],
					colModel : [{
						name : 'act',
						index : 'act',
						sortable : false
					}, {
						name : 'id',
						index : 'id',
						sortable : true
					}, {
						name : 'extension',
						index : 'extension',
						editable : true,
						sortable : true
					}, {
						name : 'full_name',
						index : 'full_name',
						editable : true,
						sortable : true
					}, {
						name : 'email',
						index : 'email',
						editable : true,
						sortable : true
					}],
					rowNum : 10,
					rowList : [10, 20, 30],
					pager : '#pjqgrid',
					sortname : 'id',
					toolbarfilter : true,
					viewrecords : true,
					sortorder : "asc",
					gridComplete : function() {
						var ids = jQuery("#jqgrid").jqGrid('getDataIDs');
						for (var i = 0; i < ids.length; i++) {
							var cl = ids[i];
							be = "<button class='btn btn-xs btn-default' data-original-title='Edit Row' onclick=\"jQuery('#jqgrid').editRow('" + cl + "');\"><i class='fa fa-pencil'></i></button>";
							se = "<button class='btn btn-xs btn-default' data-original-title='Save Row' onclick=\"jQuery('#jqgrid').saveRow('" + cl + "');\"><i class='fa fa-save'></i></button>";
							ca = "<button class='btn btn-xs btn-default' data-original-title='Cancel' onclick=\"jQuery('#jqgrid').restoreRow('" + cl + "');\"><i class='fa fa-times'></i></button>";
							//ce = "<button class='btn btn-xs btn-default' onclick=\"jQuery('#jqgrid').restoreRow('"+cl+"');\"><i class='fa fa-times'></i></button>";
							//jQuery("#jqgrid").jqGrid('setRowData',ids[i],{act:be+se+ce});
							jQuery("#jqgrid").jqGrid('setRowData', ids[i], {
								act : be + se + ca
							});
						}
					},
					editurl : "{{ asset('edit') }}",
					multiselect : true,
					autowidth : true,

				});

				// Model i agree button
				$("#addExt").click(function(){
					$this=$("#terms");
					if($this.checked) {
						$('#myModal').modal('toggle');
					} else {
						$this.prop('checked', true);
						$('#myModal').modal('toggle');
					}
				});

				jQuery("#jqgrid").jqGrid('navGrid', "#pjqgrid", {
					edit : false,
					add : false,
					del : true
				});
				jQuery("#jqgrid").jqGrid('inlineNav', "#pjqgrid");
				/* Add tooltips */
				$('.navtable .ui-pg-button').tooltip({
					container : 'body'
				});

				// remove classes
				$(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
				$(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
				$(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
				$(".ui-jqgrid-pager").removeClass("ui-state-default");
				$(".ui-jqgrid").removeClass("ui-widget-content");

				// add classes
				$(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
				$(".ui-jqgrid-btable").addClass("table table-bordered table-striped");

				$(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
				$(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
				$(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
				$(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
				$(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
				$(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
				$(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
				$(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");

				$(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
				$(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

				$(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
				$(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");

				$(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
				$(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

				$(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
				$(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");

				// update buttons
				
				$(window).on('resize.jqGrid', function() {
					$("#jqgrid").jqGrid('setGridWidth', $("#content").width());
				});

			}// end function

			// load fuelux wizard
		
			loadScript("js/plugin/fuelux/wizard/wizard.min.js", fueluxWizard);
			
			function fueluxWizard() {

				var wizard = $('.wizard').wizard();

				wizard.on('finished', function(e, data) {
					//$("#fuelux-wizard").submit();
					//console.log("submitted!");
					$.smallBox({
						title : "Congratulations! Your form was submitted",
						content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
						color : "#5F895F",
						iconSmall : "fa fa-check bounce animated",
						timeout : 4000
					});

				});

			};

		}
		loadScript("js/plugin/jqgrid/grid.locale-en.min.js", pagefunction);

	</script>