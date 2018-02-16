	<?php		
		$medico = new UsuarioMedico(null, null, null, null);
		$event = "";
		$mensaje = "";
		if(isset($_SESSION['medicos'], $_GET['ver'])){
			foreach ($_SESSION['medicos'] as $key => $value) {
				if($value->getIdTemp() == $_GET['ver'])
					$medico = $value;
			}
			if(isset($_POST['actualizar'], $_POST['horaInicio'], $_POST['horaFinal'])){
				if(UsuarioDAO::actualizarHorarioMedico(Database::open_conexion(), $medico->getId(), $_POST['horaInicio'], $_POST['horaFinal'])){
					$medico->setHoraEntrada($_POST['horaInicio']);
					$medico->setHoraSalida($_POST['horaFinal']);
					$event = "success";
					$mensaje = "Se realizo la actualizacion";
				}else{
					$event = "danger";
					$mensaje = "No se pudo realizar la actualizacion";
				}
				Database::close_conexion();
			}
		}
	?>

	<body>
		<form action="" method="post">
			<fieldset class="container">
				<legend>Información del Medico</legend>
				<div class="form-group col-xs-12">
					<label for="">Documento de Identidad</label>
					<input type="number" name="documentoIdentidad" placeholder="Numero de Identificación" value="<?php echo $medico->getNumeroDocumento(); ?>" class="form-control" disabled="">
				</div>
				<div class="form-group col-xs-12">
					<label for="">Apellidos</label>
					<div class="input-group">
						<input type="text" name="primerApellido" placeholder="Primer Apellido" value="<?php echo $medico->getApellido1(); ?>" class="form-control" disabled="">
						<span class="input-group-addon">-</span>
						<input type="text" name="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $medico->getApellido2(); ?>" class="form-control" disabled="">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="">Nombres</label>
					<div class="input-group">
						<input type="text" name="primerNombre" placeholder="Primer Nombre" value="<?php echo $medico->getNombre1(); ?>" class="form-control" disabled="">
						<span class="input-group-addon">-</span>
						<input type="text" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $medico->getNombre2(); ?>" class="form-control" disabled="">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<label for="">Tarjeta Profersional</label>
					<input type="number" name="tajetaProfesional" placeholder="Tarjeta Profesional" value="<?php echo $medico->getTp(); ?>" class="form-control" disabled="">
				</div>
				<div class="form-group col-xs-12">
					<label for="">Especialidad</label>
					<select id="especialidad" class="form-control" disabled="">
						<option value="<?php echo $medico->getEspecialidad(); ?>"><?php echo Repositorio::tipoEspecialidad($medico->getEspecialidad()) ?></option>
					</select>
				</div>
				<div class="form-group col-xs-12">
					<label for="">E-mail</label>
					<input type="email" id="email" placeholder="Correo Electronico" value="<?php echo $medico->getEmail(); ?>" class="form-control" disabled="">
				</div>
				<div class="form-group col-xs-12">
					<label for="">Hora de Inicio y Finalización de labores</label>
					<div class="input-group">
						<span class="input-group-addon">Inicio:</span>
						<input type="time" name="horaInicio" placeholder="Hora de Inicio" value="<?php echo $medico->getHoraEntrada(); ?>" min="00:00:00" max="23:59:59" step="1" class="form-control">
						<span class="input-group-addon">Final:</span>
						<input type="time" name="horaFinal" placeholder="Hora Final" value="<?php echo $medico->getHoraSalida(); ?>" min="00:00:00" max="23:59:59" step="1" class="form-control">
					</div>
				</div>
				<div class="form-group col-xs-12">
					<input type="submit" name="actualizar" value="Actualizar" class="btn btn-primary btn-group-justified">
				</div>
			</fieldset>
		</form>
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