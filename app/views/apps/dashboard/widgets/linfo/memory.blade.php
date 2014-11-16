<!-- row -->
<!--div class="bg-color-red row"-->
	<div class="col-xs-12 col-sm-4 col-md-5">
		<div class="tree">
			<ul>
				<li>
					<span class="label label-success"><i class="fa fa-lg fa-plus-circle"></i> Total</span> &ndash; <a href="javascript:void(0);" id="memory-total">0 G</a>
					<ul>
						<li>
							<span class="label label-info"> <i class="fa fa-lg fa-hdd-o"></i> Free</span> &ndash; <a href="javascript:void(0);" id="memory-free">0 G</a>
						</li>
						<li>
							<span class="label label-danger"><i class="fa fa-lg fa-hdd-o"/> Used</span> &ndash; <a href="javascript:void(0);" id="memory-used">0 G</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-8 col-md-7">
		<div id="memory-donut-graph" class="chart no-padding"/>
	</div>
<!--/div-->

<script src="{{ asset('js/plugin/bootstraptree/bootstrap-tree.min.js') }}"></script>

<script type="text/javascript">

	(function($){

		var defaults = {
			"contentType": 'application/x-www-form-urlencoded;charset=UTF-8',
			"data": undefined,
			"method": "GET",
			"updateInterval": 10000,
			"url": undefined
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
			var on = false;

			// updateIntervale
			var updateInterval = 0;

			/**
			 *
			 */
			var beforeData = function()
			{
				data = {}; // Limpiamos el contenido
			};

			/**
			 *
			 */
			var donut = function(){
				Morris.Donut({
					colors:["#57889c","#a90329"],
				  	element: el.attr('id'),
				  	data: data,
				  	formatter: function (x) { return x + "%"},
				  	resize: true
				});
			};

			/**
			 *
			 */
			var errorData = function()
			{
				console.log('No se ha podido cargar el cotenido');
			}

			/**
			 *
			 */
			var bytesToSize = function(bytes) {
			   if(bytes == 0) return '0 Byte';
			   var k = 1000;
			   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
			   var i = Math.floor(Math.log(bytes) / Math.log(k));
			   return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
			}

			/**
			 * Inicia el plugin.
			 */
			var init = function(){
				// Obtine las configuraciones basicas del usuario.
				settings = $.extend({}, defaults, options);
				// Procesamos y preparamos los datos obtenidos
				setupData(settings.data);
				// Mostramos la grafica
				donut();
				// Control real time
				if($('input[type="checkbox"]#memoryonoffswitch').length){
					$('input[type="checkbox"]#memoryonoffswitch').click(realTime);
				}
				// Notificamos al usuario.
				$.smallBox({
					title : "Widget memory list!",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});
			};

			/**
			 * Obtenemos los resultados de una consulta en formato JSON
			 */
			var loadData = function(beforef, errorf, successf){
				$.ajax({
					async: true,
					beforeSend: beforef,
					contentType: settings.contentType,
					dataType: "json",
					error: errorf,
					success: successf,
					timeout: settings.updateInterval,	
					type: settings.method,
					url: settings.url
				});
			};

			/**
			 *
			 */
			var realTime = function(){
				if ($(this).prop('checked')) {
			        on = true;
			        updateInterval = settings.updateInterval;
			        update();
			    } else {
			        clearInterval(updateInterval);
			        on = false;
			    }
			};

			/**
			 * 
			 */
			var setupData = function(d){
				free = 0;
				if (d.free>0){free=d.free;delete d.free;}
				if($('#memory-free').length) $('#memory-free').text(bytesToSize(free));  
				total = 0;
				if (d.total>0){total=parseFloat(d.total);delete d.total;}
				if($('#memory-total').length) $('#memory-total').text(bytesToSize(total));
				use = total;
				if (free>0){use-=parseFloat(free);}
				if($('#memory-used').length) $('#memory-used').text(bytesToSize(use));

				total = total==0?1:total;

				data = [
					{value: Math.round((free * 100)/total), label: 'free'},
					{value: Math.round((use * 100)/total), label: 'use'},
				];
			};

			var successData = function(json){
				// Procesamos y preparamos los datos obtenidos
				setupData(json);
				// Actualizamos la grafica
				donut();
			};

			var update = function (){
				try {
			        if (on == true) {
			        	// Obtenemos la data
			        	loadData(beforeData, errorData, successData);
			        	setTimeout(update, updateInterval);
			        } else {
			            clearInterval(updateInterval)
			        }
				}
				catch(err) {
				    clearInterval(updateInterval);
				}
			};

			init();
		};

	})(jQuery);

	var memoryDonut = function(){
		$("#memory-donut-graph").donutMemory({"data":{{ json_encode($memory) }}, "url": "{{ asset('json/memory') }}" });
	};
	
	// Load morris dependencies and run memoryfunction
	loadScript("{{ asset('js/plugin/morris/raphael.min.js') }}", function(){
		loadScript("{{ asset('js/plugin/morris/morris.min.js') }}", memoryDonut);
	});

</script>