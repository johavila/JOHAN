<?php		
	$paciente = new UsuarioCliente(null, null, null, null);
	$event = "";
	$mensaje = "";
	if(isset($_SESSION['paciente'], $_GET['ver'])){
		foreach ($_SESSION['paciente'] as $key => $value) {
			if($value->getIdTemp() == $_GET['ver'])
				$paciente = $value;
		}
	}
?>
<body>
	<div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#datosPaciente" role="tab" data-toggle="tab">Datos del paciente</a></li>
		    <li role="presentation"><a href="#historiaMedica" role="tab" data-toggle="tab">Area de historia medica</a></li>
		    <li role="presentation"><a href="#areaRecetas" role="tab" data-toggle="tab">Area de recetas</a></li>
		</ul>

		<div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="datosPaciente">
		    	<section class="head" role="heading">
		        	<fieldset>
		            	<legend style="text-align: center;">Datos del Paciente</legend>
			            <div class="form-group">
			            	<label>Nombres</label>
			            	<input type="text" name="nombres" disabled="true" value="<?php echo $paciente->getNombre1()." ".$paciente->getNombre2(); ?>" class="form-control">
			            </div>
			            <div class="form-group">
			            	<label>Primer Apellido</label>
			            	<input type="text" name="apellido1" disabled="true" value="<?php echo $paciente->getApellido1(); ?>" class="form-control">
			            </div>

			            <div class="form-group">
			            	<label>Segundo Apellido</label>
			            	<input type="text" name="apellido2" disabled="true" value="<?php echo $paciente->getApellido2(); ?>" class="form-control">
			            </div>

		              	<div class="form-group">
			                <label>Dirección</label>
		                	<input type="text" name="direccion" disabled="true" value="<?php echo $paciente->getDireccion(); ?>" class="form-control">
		              	</div>
			            
			            <div class="form-group">
			                <label>Departamento</label>
			                <input type="text" name="dpto" disabled="true" value="<?php echo Repositorio::departamento($paciente->getLugarNacimientoDepar()); ?>" class="form-control">
			            </div>

			            <div class="form-group">
			                <label>Ciudad</label>
			                <input type="text" name="barrio" disabled="true" value="<?php echo Repositorio::municipio($paciente->getLugarNacimientoDepar(),$paciente->getLugarNacimientoCiudad()); ?>" class="form-control">
			            </div>

			            <div class="form-group">
			                <label>Estado Civil</label>
			                <input type="text" name="estcivil" disabled="true" value="<?php echo Repositorio::estadoCivil($paciente->getEstadoCivil()); ?>" class="form-control">   
			            </div>
		          	</fieldset>
		        </section>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="historiaMedica">
		    	<section class="head">
			        <fieldset>
			        	<legend style="text-align: center;">Area de historia medica</legend>
			        	<div class="form-group">
			            	<label id="motivo"> Motivo de la Consulta</label>
			            	<textarea id="area-consul" rows="10" class="form-control"></textarea>
			            </div>
			        </fieldset>
		    	</section>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="areaRecetas">
		    	<section class="head">
			        <fieldset>
			            <legend style="text-align: center;">Area de Receta</legend>
		            	<label>Tipo de Tratamientos</label>
			            <div class="form-group"> 
			                <select required class="form-control">
			                	<option value="0">--Elija una opción--</option>
			                	<option value="1">Respiratorio</option>
			                	<option value="2">Desintoxicación Ionica</option>
			                	<option value="3">Colón Terapia</option>
			                	<option value="4">Celulas Madres</option>
			                	<option value="5">Medicamentos</option>
			                	<option value="6">Otros</option>
			                </select>
			            </div>
			            <label>Numero de Sesiones</label>
			            <div class="form-group">
			                <input type="number"  min="1" class="form-control" required="">
			            </div>
			            <input type="submit" name="btnAgregar" value="Agregar" class="btn btn-primary btn-group-justified" required="">

			              <!--Tabla de medicamientos y tratamientos-->
			            <div class="panel panel-default"> 
			                <div class="panel-heading">Tratamientos</div> 
			                <table class="table"> 
			                	<thead> 
			                    	<tr> 
			                      		<th>#</th> 
			                    		<th>Tratamientos</th> 
			                      		<th>Numero de sesiones</th> 
			                    	</tr> 
			                  	</thead> 
			                  	<tbody>
			                  	</tbody> 
			                </table> 
			            </div>
			        </fieldset>
		      	</section>
		    </div>
		</div>
	</div>
	<script type="text/javascript">
		window.onload = function(){
	<?php
		if($event == "success"){
			echo "bootstrap_alert.success('".$mensaje."');\n";
		}else if($event == "danger"){
			echo "bootstrap_alert.danger('".$mensaje."');\n";
		}
	?>
		}
	</script>