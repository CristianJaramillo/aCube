<div class="custom-scroll table-responsive">
	<table class="table table-striped table-hover table-condensed" id="table-mount-linfo">
		<thead>
			<tr>
				<th>{{ Lang::get('linfo.type') }}</th>
				<th>{{ Lang::get('linfo.unity') }}</th>
				<th>{{ Lang::get('linfo.info') }}</th>
				<th>{{ Lang::get('linfo.filesystem') }}</th>
				<th>{{ Lang::get('linfo.size') }}</th>
				<th>{{ Lang::get('linfo.free') }}</th>
				<th>{{ Lang::get('linfo.used') }}</th>
				<th style="width:200px;">{{ Lang::get('linfo.percent_used') }}</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>
<script type="text/javascript">

	(function($){
			
		var defaults = {
			"iconType": 'fa fa-',
			"data": undefined
		};

		$.fn.tableMount = function(options)
		{
			if (this.length==0) {alert("Error in Table Core!");return this;};

			// Referencia al objeto contenedor.
			var el = this;

			// Canfiguraciones del usuario.
			var settings = undefined;

			// Icono
			var icon = undefined;

			/**
			 * Añade 1 o mas filas a la tabla.
			 */
			var addRow = function(key, value){

				var tr = "";

				tr += "<td>" + value.devtype + "</td>";

				tr += "<td>" + value.mount + "</td>";
				
				tr += "<td>" + (value.label==null ? '' : value.label) + "</td>";
				
				tr += "<td>" + (value.type==null ? '' : value.type) + "</td>";
				
				tr += "<td>" + (value.size==null ? bytesToSize(0) : bytesToSize(parseInt(value.size))) + "</td>";
				
				tr += "<td>" + (value.used==null ? bytesToSize(0) : bytesToSize(parseInt(value.used))) + "</td>";
				
				tr += "<td>" + (value.free==null ? bytesToSize(0) : bytesToSize(parseInt(value.free))) + "</td>";

				tr += '<td colspan="2"><div class="bar-holder"><div class="progress"><div class="progress-bar bg-color-red"aria-valuetransitiongoal="'+value.used_percent+'"aria-valuenow="'+value.used_percent+'" style="width:'+value.used_percent+'%;">'+value.used_percent+'%</div></div></div></td>';

				el.tbody.append('<tr>'+tr+'</tr>');
			};

			/**
			 *
			 */
			var bytesToSize = function(pBytes, pUnits) {
			    // Handle some special cases
			    if(pBytes == 0) return '0 Bytes';
			    if(pBytes == 1) return '1 Byte';
			    if(pBytes == -1) return '-1 Byte';

			    var bytes = Math.abs(pBytes)
			    if(pUnits && pUnits.toLowerCase() && pUnits.toLowerCase() == 'si') {
			        // SI units use the Metric representation based on 10^3 as a order of magnitude
			        var orderOfMagnitude = Math.pow(10, 3);
			        var abbreviations = ['Bytes', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
			    } else {
			        // IEC units use 2^10 as an order of magnitude
			        var orderOfMagnitude = Math.pow(2, 10);
			        var abbreviations = ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
			    }
			    var i = Math.floor(Math.log(bytes) / Math.log(orderOfMagnitude));
			    var result = (bytes / Math.pow(orderOfMagnitude, i));

			    // This will get the sign right
			    if(pBytes < 0) {
			        result *= -1;
			    }

			    // This bit here is purely for show. it drops the percision on numbers greater than 100 before the units.
			    // it also always shows the full number of bytes if bytes is the unit.
			    if(result >= 99.995 || i==0) {
			        return result.toFixed(0) + ' ' + abbreviations[i];
			    } else {
			        return result.toFixed(2) + ' ' + abbreviations[i];
			    }
			}

			/**
				* Inicia el plugin.
				*/
			var init = function(){
				// Obtine las configuraciones basicas del usuario.
				settings = $.extend({}, defaults, options);
				// Creamos una estructura de nodos para facil acceso.
				nodeStruct();
				// Cargamos la estructura
				loadStruct(settings.data);
				// Notificamos al usuario.
				$.smallBox({
					title : "Widget mount list!",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});
			};

			/**
				* Carga la estructura de la tabla
				*/
			var loadStruct = function(data){
					
				if(settings.iconType!=undefined){
					icon = settings.iconType;
				}

				if (data.icon!=undefined) {
					icon = (icon!=undefined?icon:'') + data.icon;
					delete data.icon;
				}

				$.each(data, addRow);

			};

			/**
				* Estructura de nodos.
				*/
			var nodeStruct = function(){
				if(el.find('tbody').length == 0){el.append("<tbody/>");}
				el.tbody = el.find('tbody');
			};

			init();
		};

	})(jQuery);

	$('#table-mount-linfo').tableMount({'data': {{ json_encode($mount) }}});

</script>