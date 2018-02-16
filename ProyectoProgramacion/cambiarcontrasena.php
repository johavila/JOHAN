<body>
	<div class="container">
		<div id="alert"></div>
<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
	include_once 'view/header/header1.html';
	$event = "";
	$mensaje = "";
	if(isset($_GET['url']) && UsuarioDAO::existe_peticion_cambio_pwd_url(Database::open_conexion(), $_GET['url'])){
		if(isset($_POST['password'], $_POST['Rpassword'])){
			$password = $_POST['password'];
			$Rpassword = $_POST['Rpassword'];
			$url = $_GET['url'];
			if($password === $Rpassword){
				$id = UsuarioDAO::id_peticion_cambio_pwd_url(Database::open_conexion(), $url);
				if(UsuarioDAO::cambiar_password_usuario(Database::open_conexion(), $id, $password)){
					UsuarioDAO::eliminar_peticion_cambio_pwd(Database::open_conexion(), $url);
					$event = "success";
					$mensaje = "Se cambio la contraseña";
				}
			}else{
				$mensaje = "Las contraseñas deben ser Iguales";
			}
		}
?>
			<center><h2>Cambio de contraseña</h2></center>
			<form method="post" onsubmit="return cambiarContrasena();">
			  <div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="password" placeholder="Ingrese nueva contraseña" autofocus required>
			  </div>
			  <div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="Rpassword" placeholder="Repita nueva contraseña" required>
			  </div>
			  <div>
			  	<input type="submit" id="confirmar" class="btn btn-lg btn-primary btn-group-justified" value="Confirmar"> 
			  </div>
			</form>
		</div>
		
<?php
	}else{
		$mensaje = "La URL no existe";
	}
	Database::close_conexion();
	include_once 'view/footer/footer1.html';
?>
<script type="text/javascript">
<?php
			if($event == "success"){
				echo "bootstrap_alert.success('".$mensaje."');";
			}else{
				echo "bootstrap_alert.danger('".$mensaje."');";
			}
?>
		</script>