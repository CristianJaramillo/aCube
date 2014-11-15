<div class="tree">
	<ul>
		<li>
			<span class="label label-success">
				<i class="fa fa-lg fa-minus-circle"/> Total
			</span>
			<ul>
				<li>
					<span class="label label-info">
						<i class="fa fa-lg fa-hdd-o"/>
					</span>
					&ndash; <a href="javascript:void(0);">Free</a>
				</li>
				<li>
					<span class="label label-danger">
						<i class="fa fa-lg fa-hdd-o"/>
					</span>
					&ndash; <a href="javascript:void(0);">Used</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
<div id="memory-donut-graph" class="chart no-padding"/>

<script type="text/javascript">

	(function($){
			
		var defaults = {
			"data": undefined
		};

		$.fn.donutMemory = function(options)
		{
			if (this.length==0) {alert("Error in donut memory!");return this;};

			// Referencia al objeto contenedor.
			var el = this;

			// Canfiguraciones del usuario.
			var settings = undefined;

			// valores de la grafica
			var data = {};

			// elemento grafica
			var element = undefined;

			/**
			 *
			 */
			var donut = function(){
				Morris.Donut({
				  element: el.attr('id'),
				  data: data,
				  formatter: function (x) { return x + "%"},
				  resize: true
				});
			};

			/**
			 * Inicia el plugin.
			 */
			var init = function(){
				// Obtine las configuraciones basicas del usuario.
				settings = $.extend({}, defaults, options);
				//
				setupData(settings.data);
				//
				donut();
			};

			/**
			 * 
			 */
			var setupData = function(d){
				free = 0;
				if (d.free>0){free=d.free;delete d.free;}
				total = 0;
				if (d.total>0){total=parseFloat(d.total);delete d.total;}
				use = total;
				if (free>0){use-=parseFloat(free);}

				total = total==0?1:total;

				data = [
					{value: Math.round((free * 100)/total), label: 'free'},
					{value: Math.round((use * 100)/total), label: 'use'},
				];
			};

			init();
		};

	})(jQuery);

	var memoryDonut = function(){
		$('#memory-donut-graph').donutMemory({'data':{{ json_encode($memory) }}});
	};
	
	// Load morris dependencies and run memoryfunction
	loadScript("{{ asset('js/plugin/morris/raphael.min.js') }}", function(){
		loadScript("{{ asset('js/plugin/morris/morris.min.js') }}", memoryDonut);
	});

	loadScript("{{ asset('js/plugin/bootstraptree/bootstrap-tree.min.js') }}");

</script>