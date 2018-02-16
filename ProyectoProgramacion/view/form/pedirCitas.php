<body>
	<div class="container">
		<form  method="post" onsubmit="return horarioDisponible()"> 
			<fieldset class="container">
				<legend>Pedir cita</legend>
				<div class="form-group">
					<label></label>
					<div class="form-group">
						<div class="form-group col-xs-12">
							<select  id="tipoCita" class="form-control">
								<option value="0">--Elija una opcion--</option>
								<option value="1">Consulta</option>
				 	 			<option value="2">Cita de control</option>
							</select>	
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Fecha de la cita</label>
					<div class="form-group col-xs-12">
						<?php
							date_default_timezone_set('America/Bogota');
							$hoy = getdate();
							$anno = $hoy['year'];
							$mes =($hoy['mon']>9) ? $hoy['mon']:"0".$hoy['mon'];
							$dia =$hoy['mday'];
						?>
						<input type="date" min="<?php echo $anno.'-'.$mes.'-'.$dia ?>" id="fechaCita" placeholder="Fecha de nacimiento" class="form-control" required="">	
					</div>
				</div>
			
				<div class="form-group col-xs-12">
					<input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-group-justified">
				</div>	
			  	<table class="table">
			    	<thead>
			    		<tr>
			        		<th>#</th>
			        		<th>Fecha</th>
			        		<th>Hora</th>
			        		<th></th>
			      		</tr>
			    	</thead>
			    	<tbody  id="resultado"></tbody>
			  	</table>
			</fieldset>
		</form>
	</div>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
	                <h3>Elegir Medico</h3>
				</div>
	            <form  method="post" style="width: inherit;"> 
	                <fieldset >
	                    <table class="table">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Medico</th>
	                                <th>Especialidad</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tbody id="medicos">
	                            <tr>
	                                <td>1</td>
	                                <td>GIRALDO MERCADO JUAN DAVID</td>
	                                <td>GENERAL</td>
	                                <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
	                            </tr>
	                            <tr>
	                                <td>1</td>
	                                <td>GIRALDO MERCADO JUAN DAVID</td>
	                                <td>GENERAL</td>
	                                <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </fieldset>
	            </form>
	        </div>
		</div>
	</div>

	<script type="text/javascript">
		function horarioDisponible(){
			var fecha = document.getElementById('fechaCita').value;
			var tbody = document.getElementById('resultado');
			var html = "";
			var data = "horarioCitaDisponible&fecha="+fecha+"&tipoConsulta=1";
			ajax("/../controller/cita.php",data, 1, function(){
						tbody.innerHTML = '<tr><td colspan="5" align="center">Cargando...</td></tr>';
				}, function(xml){
	            if(xml!=null){
	            	var horario = xml.getElementsByTagName('horario');
	            	if(horario.length>0){
	            		for (var i = 0; i < horario.length; i++) {
	            			id = horario[i].getElementsByTagName('id')[0].innerHTML;
		                	hora = horario[i].getElementsByTagName('hora')[0].innerHTML;
		                	fecha = horario[i].getElementsByTagName('fecha')[0].innerHTML;
		                	html+='<tr><td>'+(i+1)+'</td><td>'+fecha+'</td><td>'+hora+'</td><td><a id="'+id+'" onclick="mostrarMedicos(this.id)" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td></tr>';
		                }
	            	}else{
	            		html = '<tr><td colspan="5" align="center">No hay resultados</td></tr>';
	            	}
	            }else{
            		html = '<tr><td colspan="5" align="center">No hay resultados</td></tr>';
	            }
	            tbody.innerHTML = html;
	        });
			return false;
		}

		function mostrarMedicos(id){
			var tbody = document.getElementById('medicos');
			var html = "";
			var data = "medicoDisponibles&id="+id;
			ajax("/../controller/cita.php",data, 1, function(){
						tbody.innerHTML = '<tr><td colspan="5" align="center">Cargando...</td></tr>';
				}, function(xml){
	            if(xml!=null){
	            	var medico = xml.getElementsByTagName('medico');
	            	if(medico.length>0){
	            		for (var i = 0; i < medico.length; i++) {
	            			id = medico[i].getElementsByTagName('id')[0].innerHTML;
		                	especialidad = medico[i].getElementsByTagName('especialidad')[0].innerHTML;
		                	nombre = medico[i].getElementsByTagName('nombre')[0].innerHTML;
		                	html+='<tr><td>'+(i+1)+'</td><td>'+nombre+'</td><td>'+especialidad+'</td><td><a id="'+id+'" onclick="guardarCita(this.id)" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></td></tr>';
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

		function guardarCita(id){
			var data = "agregarCita&id="+id;
			ajax("/../controller/cita.php",data, 2, null, function(n){
				if(n == 1){
					bootstrap_alert.success('Se agrego la cita');
					
				}else if(n==0){
					bootstrap_alert.danger('No se pudo agregar la cita');
				}else{
					bootstrap_alert.danger('No se pudo agregar la cita: '+n);
				}     
	        });
		}
	</script>