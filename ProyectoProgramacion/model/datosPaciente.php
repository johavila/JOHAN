<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Garantizaremos que se vea bien en dispositivos moviles-->
		<title>Datos del paciente</title>
		
		<!-- Estilos CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	</head>
	<body>
		<h1 style="text-align: center;">Datos Personales</h1>
		<form action="datosPaciente.php" method="post"> 
			<fieldset class="container">
				<legend>Informacion Personal</legend>
				<div class="form-group">
					<label>Fecha de nacimiento (*)</label>
					<input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Primer Apellido (*)</label>
					<input type="text" name="primerApellido" placeholder="Primer Apellido" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Segundo Apellido (*)</label>
					<input type="text" name="segundoApellido" placeholder="Segundo Apellido" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Primer Nombre (*)</label>
					<input type="text" name="primerNombre" placeholder="Primer Nombre" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Segundo Nombre (*)</label>
					<input type="text" name="segundoNombre" placeholder="Segundo Nombre" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Documento de Identificacion (*)</label>
					<input type="text" name="cc" placeholder="Identificacion" class="form-control" required="form-control">
				</div>
				<div class="form-group">
					<label>E-mail (*)</label>
					<input type="email" name="email" placeholder="Correo Electronico" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Direccion (*)</label>
					<input type="text" name="direccion" placeholder="Direccion" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Sexo (*)</label><br>
					<input type="radio" name="sexo" value="Hombre" checked="">Hombre
					<input type="radio" name="sexo" value="Mujer">Mujer
				</div>
				<div class="form-group">
					<label>Estado Civil (*)</label>
					<select name="estadoCivil" class="form-control">
						<option selected="" value="0">--Eliga una opcion--</option>
						<option value="1">Soltero/a</option>
						<option value="2">Casado/a</option>
						<option value="3">Viudo/a</option>
						<option value="4">Divorsiado/a</option>
					</select>
				</div>
				<div class="form-group">
					<label>Telefonos</label><br>
					Fijo: <input type="text" name="telefonoFijo" placeholder="Telefono Fijo">
					Celular (*): <input type="text" name="telefonoCel" placeholder="Telefono Celular" required="">
					Otro: <input type="text" name="otroTelefono" placeholder="Otro telefono">
				</div>			
				<input type="submit" name="btnEnviar" value="Enviar" class="btn btn-primary">
			</fieldset>
		</form>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>