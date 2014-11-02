@section('app')
	<!--[if IE 9]>
		<style>
			.error-text {
				color: #333 !important;
			}
		</style>
	<![endif]-->

	<!-- row -->
	<div class="row">
	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center error-box">
						<h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> Error 500</h1>
						<h2 class="font-xl"><strong>¡Uuuups, algo salió mal!</strong></h2>
						<br />
						<p class="lead semi-bold">
							<strong>
								Usted ha sufrido un error técnico. Pedimos disculpas.
							</strong>
							<br>
							<br>
							<small>
								Estamos trabajando duro para corregir este problema. Por favor, espere unos minutos e intente la búsqueda de nuevo.Mientras tanto, <br/> echa un vistazo a cuál es nuevo en SmartAdmin:
								We are working hard to correct this issue. Please wait a few moments and try your search again. <br> In the meantime, check out whats new on SmartAdmin:
							</small>
						</p>
						<ul class="error-search text-left font-md">
				            <li><a href="javascript:void(0);"><small>Go to My Dashboard <i class="fa fa-arrow-right"></i></small></a></li>
				            <li><a href="javascript:void(0);"><small>Contact SmartAdmin IT Staff <i class="fa fa-mail-forward"></i></small></a></li>
				            <li><a href="javascript:void(0);"><small>Report error!</small></a></li>
				            <li><a href="javascript:void(0);"><small>Go back</small></a></li>
				        </ul>
					</div>
	
				</div>
	
			</div>
	
		</div>
		
	</div>
	<!-- end row -->
@endsection

@section('script')

@endsection