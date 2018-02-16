	<body>
		<fieldset class="container">
			<legend>Filtrar</legend>
			<div class="form-group">
				<div class="form-group col-xs-12">
					<div class="input-group">
						<input type="text" id="apellido1" placeholder="Primer Apellido" class="form-control">
						<span class="input-group-addon">-</span>
						<input type="text" id="apellido2" placeholder="Segundo Apellido" class="form-control">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<div class="input-group">
						<input type="text" id="nombre1" placeholder="Primer Nombre" class="form-control">
						<span class="input-group-addon">-</span>
						<input type="text" id="nombre2" placeholder="Segundo Nombre" class="form-control">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<input type="number" id="documento" placeholder="Documento de Identidad" class="form-control">
				</div>
				<div class="form-group">
					<label>Especialidad</label>
					<div class="form-group col-xs-12">
						<select id="especialidad" class="form-control" required="">
							<option value="0">--Elija una opción--</option>
							<option value="1">Medico General</option>
							<option value="2">Medico Internista</option>
							<option value="3">Medico Especialista</option>
						</select>	
					</div>
				</div>
				<input type="button" id="btnFiltrar" value="Filtrar" class="btn btn-primary btn-group-justified">
			</div>
		</fieldset>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Apellidos y Nombres</th>
					<th>TP</th>
					<th>Especialidad</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="resultado"></tbody>
		</table>
		<script type="text/javascript">
			document.getElementById('btnFiltrar').onclick = function(){
				var tbody = document.getElementById('resultado');
				var html = '';
				var nombre1 = document.getElementById('nombre1').value;
				var nombre2 = document.getElementById('nombre2').value;
				var apellido1 = document.getElementById('apellido1').value;
				var apellido2 = document.getElementById('apellido2').value;
				var documento = document.getElementById('documento').value;
				var especialidad = document.getElementById('especialidad').value;
				var data = "buscarMedico=&nombre1="+nombre1+"&nombre2="+nombre2+"&apellido1="+apellido1+"&apellido2="+apellido2+"&documento="+documento+"&especialidad="+especialidad;
				ajax("/../controller/usuario.php",data, 1, function(){
						tbody.innerHTML = '<tr><td colspan="5" align="center">Cargando...</td></tr>';
					}, function(xml){
		            if(xml!=null){
		            	var medico = xml.getElementsByTagName('medico');
		            	if(medico.length>0){
		            		for (var i = 0; i < medico.length; i++) {
			                	id = medico[i].getElementsByTagName('id')[0].innerHTML;
			                	nombre = medico[i].getElementsByTagName('nombre')[0].innerHTML;
			                	html+='<tr><td>'+(i+1)+'</td><td>'+medico[i].getElementsByTagName('apellido')[0].innerHTML+' '+medico[i].getElementsByTagName('nombre')[0].innerHTML+'</td><td>'+medico[i].getElementsByTagName('tp')[0].innerHTML+'</td><td>'+medico[i].getElementsByTagName('especialidad')[0].innerHTML+'</td><td><a href="?consultaMedico&ver='+medico[i].getElementsByTagName('id')[0].innerHTML+'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td></tr>';
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