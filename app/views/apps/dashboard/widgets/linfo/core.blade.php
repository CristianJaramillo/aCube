<div class="custom-scroll table-responsive" style="height:290px; overflow-y: scroll;">
	<table class="table table-striped table-hover table-condensed" id="table-core-linfo">
		<tbody></tbody>
	</table>
</div>
<script type="text/javascript">

	var core = {{ json_encode($core) }};

	(function($){
			
		var defaults = {
			"iconType": 'fa fa-',
			"data": undefined
		};

		$.fn.tableCore = function(options)
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
				switch(key)
				{
					case 'cpus':
						var aux = '';
						if (value.Vendor!=undefined){aux+=value.Vendor + '';}
						$.each(value, function(a, b){
							if(aux!=''){aux+='<br/>';}
							aux += b.Vendor + '-' + b.Model + ' (' + b.MHz + ')';
						}); 
						value = aux; 
					break;
					case 'load':
						var tr = '<td colspan="2"><div class="bar-holder"><span class="text"><strong>'+key+'</strong></span><div class="progress"><div class="progress-bar bg-color-blue"aria-valuetransitiongoal="'+value+'"aria-valuenow="'+value+'" style="width:'+value+'%;">'+value+'%</div></div></div></td>';
					break;
					case 'os':
						value = '<i class="' + icon + '"/> ' + value;
					break;
					case 'process_stats':
						var tr = '';
						if(value.exists!=undefined){delete value.exists;}
						$.each(value, function(a, b){
							if(tr!=''){tr+='<tr/><tr>';}
							tr+='<th>'+a+'</th><td>'+b+'</td>';
						});
						tr = '<tr>'+tr+'</tr>';
					break;
					case 'upTime':
						var aux = '';
						if (value.years!=undefined){aux+=value.years + ' years, ';}
						if (value.days!=undefined){aux+=value.days + ' days, ';}
						if (value.hours!=undefined){aux+=value.hours + ' hours, ';}
						if (value.minutes!=undefined){aux+=value.minutes + ' minutes, ';}
						if (value.seconds!=undefined){aux+=value.seconds + ' seconds';}
						if (value.booted!=undefined){aux+='; booted ' + value.booted;}
						value = aux; 
					break;
				}

				if (tr==undefined){tr='<th>'+key+'</th><td>'+value+'</td>';};
						
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

	$('#table-core-linfo').tableCore({'data':core});

</script>