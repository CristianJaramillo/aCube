<div class="custom-scroll table-responsive" style="height:290px; overflow-y: scroll;">
	<table class="table table-striped table-hover table-condensed" id="table-network-linfo">
		<tr>
			<th>{{ Lang::get('linfo.device_name') }}</th>
			<th>{{ Lang::get('linfo.type') }}</th>
			<th>{{ Lang::get('linfo.sent') }}</th>
			<th>{{ Lang::get('linfo.received') }}</th>
			<th>{{ Lang::get('linfo.state') }}</th>
		</tr>
		<tbody></tbody>
	</table>
</div>
<script type="text/javascript">

	var network = {{ json_encode($network) }};

	(function($){
			
		var defaults = {
			"data": undefined
		};

		$.fn.tableNetwork = function(options)
		{
			if (this.length==0) {alert("Error in Table Core!");return this;};

			// Referencia al objeto contenedor.
			var el = this;

			// Canfiguraciones del usuario.
			var settings = undefined;

			/**
			 * Añade 1 o mas filas a la tabla.
			 */
			var addRow = function(key, value){
				
				var tr = '<td>' + key + '</td>';
				var type = 'unknown';
				var sent = recieved = 0;
				var state = 'default';
				if (value.type!=undefined) {type=value.type;}
				tr += '<td>' + type + '</td>';
				if (value.sent.bytes!=undefined) {sent=value.sent.bytes+' Bytes';}
				tr += '<td>' + sent + '</td>';
				if (value.recieved.bytes!=undefined) {recieved=value.recieved.bytes+' Bytes';}
				tr += '<td>' + recieved + '</td>';
				if (value.state!=undefined)
				{
					switch(value.state)
					{
						case 'up': state = 'success'; break;
						case 'Media disconnected': state = 'warning'; value.state = 'disconnected'; break;
						case 'down': state = 'danger'; break;
					}
				};
				tr += '<td class="text-center"><span class="label label-'+state+'">'+value.state+'</span></td>';

				el.tbody.append('<tr>'+tr+'</tr>');
			};

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
			};

			/**
			 * Carga la estructura de la tabla
			 */
			var loadStruct = function(data){
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

	$('#table-network-linfo').tableNetwork({'data':network});

</script>