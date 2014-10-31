@section('app')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">SmartAdmin</h1>
			<div class="hero">

				<div class="pull-left login-desc-box-l">
					<h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
					<div class="login-app-icons">
						<a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
						<a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
					</div>
				</div>
							
				<img src="img/demo/iphoneview.png" alt="" class="pull-right display-image" style="width:210px">
							
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h5 class="about-heading">About SmartAdmin - Are you up to date?</h5>
					<p>
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h5 class="about-heading">Not just your average template!</h5>
					<p>
						Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
					</p>
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<div class="well no-padding">
				{{ Form::open(['class' => 'smart-form client-form', 'id' => 'smart-form-register', 'method' => 'POST', 'route' => 'register']) }}
					<header>
						Registration is FREE*
					</header>

					<fieldset>
						{{-- FULL NAME --}}
						{{ Field::text('full_name', NULL, ['id' => 'name', 'required']) }}
						{{-- USERNAME --}}
						{{ Field::text('username', NULL, ['id' => 'username', 'required']) }}
						{{-- PASSWORD --}}
						{{ Field::password('password', ['id' => 'password', 'required']) }}
						{{-- CONFIRM PASSWORD --}}
						{{ Field::password('password_confirmation', ['id' => 'password', 'required']) }}
						{{-- EMAIL --}}
						{{ Field::email('email', ['id' => 'email', 'required'], NULL) }}
						{{-- CONFIRM EMAIL --}}
						{{ Field::email('email_confirmation', ['id' => 'email_confirmation', 'required'], NULL) }}
						{{-- REMEMBER --}}
						{{ Field::checkbox('authorized', NULL, ['id' => 'authorized'], NULL, 'checkbox') }}
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Register
						</button>
					</footer>

					<div class="message">
						<i class="fa fa-check"></i>
						<p>
							Thank you for your registration!
						</p>
					</div>
				{{ Form::close() }}

			</div>
			<p class="note text-center">*FREE Registration ends on October 2015.</p>
			<h5 class="text-center">- Or sign in using -</h5>
			<ul class="list-inline text-center">
				<li>
					<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
				</li>
			</ul>
		</div>
	</div>
	
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
					<div id="left">

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
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@endsection

@section('script')
	@parent

		<script type="text/javascript">
			runAllForms();
			
			// Model i agree button
			$("#i-agree").click(function(){
				$this=$("#terms");
				if($this.checked) {
					$('#myModal').modal('toggle');
				} else {
					$this.prop('checked', true);
					$('#myModal').modal('toggle');
				}
			});
			
			// Validation
			$(function() {
				// Validation
				$("#smart-form-register").validate({

					// Rules for form validation
					rules : {
						username : {
							required : true
						},
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						},
						passwordConfirm : {
							required : true,
							minlength : 3,
							maxlength : 20,
							equalTo : '#password'
						},
						firstname : {
							required : true
						},
						lastname : {
							required : true
						},
						gender : {
							required : true
						},
						terms : {
							required : true
						}
					},

					// Messages for form validation
					messages : {
						login : {
							required : 'Please enter your login'
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						},
						passwordConfirm : {
							required : 'Please enter your password one more time',
							equalTo : 'Please enter the same password as above'
						},
						firstname : {
							required : 'Please select your first name'
						},
						lastname : {
							required : 'Please select your last name'
						},
						gender : {
							required : 'Please select your gender'
						},
						terms : {
							required : 'You must agree with Terms and Conditions'
						}
					},

					// Ajax form submition
					submitHandler : function(form) {
						$(form).ajaxSubmit({
							success : function() {
								$("#smart-form-register").addClass('submited');
							}
						});
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});

			});
		</script>
@endsection