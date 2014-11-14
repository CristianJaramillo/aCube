<div class="custom-scroll table-responsive" style="height:290px; overflow-y: scroll;">
	<table class="table table-bordered" id="table-core-linfo">
		<tbody>
			@foreach($core as $name => $value)
				<tr>
					<th>{{ Lang::get('linfo.' . $name) }}</th>
					@if (is_array($value))
						<td></td>
					@elseif($name == 'load')
						<td>
							<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
								<span class="text"> 
									{{ Lang::get('linfo.' . $name) }}
									<span class="pull-right">{{ $value }}%</span>
								</span>
								<div class="progress">
									<div class="progress-bar bg-color-blue" style="width:{{ $value }}%;"></div>
								</div>
							</div>
						</td>
					@else
						<td>{{ $value }}</td>
					@endif
				</tr>
			@endforeach					
		</tbody>
	</table>
</div>