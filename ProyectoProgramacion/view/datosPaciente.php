<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Garantizaremos que se vea bien en dispositivos moviles-->
		<title>Datos del paciente</title>
		
		<!-- Estilos CSS -->
		<link rel="stylesheet" type="text/css" href="/../css/bootstrap.min.css">

	</head>
	<body>
		<h1 style="text-align: center;">Datos Personales</h1>
		<form action="datosPaciente.php" method="post"> 
			<fieldset>
				<legend>Informacion Personal</legend>
				<label>Fecha de nacimiento</label><br>
				<input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento" required=""><br>
				<label>Primer Apellido</label><br>
				<input type="text" name="primerApellido" placeholder="Primer Apellido" required=""><br>
				<label>Segundo Apellido</label><br>
				<input type="text" name="segundoApellido" placeholder="Segundo Apellido" required=""><br>
				<label>Primer Nombre</label><br>
				<input type="text" name="primerNombre" placeholder="Primer Nombre" required=""><br>
				<label>Segundo Nombre</label><br>
				<input type="text" name="segundoNombre" placeholder="Segundo Nombre" required=""><br>
				<label>Documento de Identificacion</label><br>
				<input type="text" name="cc" placeholder="Identificacion" required=""><br>
				<label>E-mail</label><br>
				<input type="email" name="email" placeholder="Correo Electronico" required=""><br>
				<label>Direccion</label>
				<input type="text" name="direccion" placeholder="Direccion" required="">
				<label>Sexo</label><br>
				<input type="radio" name="sexo" value="Hombre" checked="">Hombre<br> 
				<input type="radio" name="sexo" value="Mujer">Mujer<br><br>
				<label>Estado Civil</label><br>
				<select name="estadoCivil">
					<option selected="" value="0">--Eliga una opcion--</option>
					<option value="1">Soltero/a</option>
					<option value="2">Casado/a</option>
					<option value="3">Viudo/a</option>
					<option value="4">Divorsiado/a</option>
				</select>
			</fieldset>
			<label>Telefonos</label>
			<input type="text" name="telefono1" placeholder="Telefono 1" required="">
			<fieldset>
				
			</fieldset>
		</form>

	<script src="js/jquery.js"></script>
	<script src="/../js/bootstrap.min.js"></script>
	</body>
</html>