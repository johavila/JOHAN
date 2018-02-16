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
		<h1>Datos Personales</h1>
		<div>
			<form action="datosPaciente.php" method="post"> 
				<label>Fecha de nacimiento</label><br>
				<input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento" required=""><br><br>
				<label>Primer Apellido</label><br>
				<input type="text" name="primerApellido" placeholder="Primer Apellido" required=""><br><br>
				<label>Segundo Apellido</label><br>
				<input type="text" name="segundoApellido" placeholder="Segundo Apellido" required=""><br><br>
				<label>Primer Nombre</label><br>
				<input type="text" name="primerNombre" placeholder="Primer Nombre" required=""><br><br>
				<label>Segundo Nombre</label><br>
				<input type="text" name="segundoNombre" placeholder="Segundo Nombre" required=""><br><br>
				<label>E-mail</label><br>
				<input type="email" name="email" placeholder="Correo Electronico" required=""><br><br>
				<label>Sexo</label><br>
				<input type="radio" name="sexo" value="Hombre" checked="">Hombre<br> 
				<input type="radio" name="sexo" value="Mujer">Mujer<br>
			</form>
		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>