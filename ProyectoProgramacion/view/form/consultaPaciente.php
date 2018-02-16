	<body>
		<fieldset class="container">
			<legend>Filtrar</legend>
			<div class="form-group">
				<div class="form-group">
					<input type="number" id="documento" placeholder="Documento de Identificacion" class="form-control">
				</div>
				<input type="button" id="btnFiltrar" value="Filtrar" class="btn btn-primary btn-block">
			</div>
		</fieldset>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Apellidos y Nombres</th>
					<th>Identificacion</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="resultado"></tbody>
		</table>
		<script type="text/javascript">
			document.getElementById('btnFiltrar').onclick = function(){
				var tbody = document.getElementById('resultado');
				var html = '';
				var documento = document.getElementById('documento').value;
				var data = "buscarPaciente&documento="+documento;
				ajax("/../controller/usuario.php",data, 1, function(){
						tbody.innerHTML = '<tr><td colspan="5" align="center">Cargando...</td></tr>';
					}, function(xml){
		            if(xml!=null){
		            	var paciente = xml.getElementsByTagName('paciente');
		            	if(paciente.length>0){
		            		for (var i = 0; i < paciente.length; i++) {
			                	
			                	html+='<tr><td>'+(i+1)+'</td><td>'+paciente[i].getElementsByTagName('apellido1')[0].innerHTML+' '+paciente[i].getElementsByTagName('apellido2')[0].innerHTML+' '+paciente[i].getElementsByTagName('nombre1')[0].innerHTML+' '+paciente[i].getElementsByTagName('nombre2')[0].innerHTML+'</td><td>'+paciente[i].getElementsByTagName('tipoDocumento')[0].innerHTML+' '+paciente[i].getElementsByTagName('numeroDocumento')[0].innerHTML+'</td><td><a href="?consulta&ver='+paciente[i].getElementsByTagName('id')[0].innerHTML+'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td></tr>';
			                }
		            	}else{
		            		html = '<tr><td colspan="5" align="center">No hay resultados</td></tr>';
		            	}
		            }else{
	            		html = '<tr><td colspan="5" align="center">No hay resultados</td></tr>';
		            }
		            tbody.innerHTML = html;
		        });
			}			
		</script>