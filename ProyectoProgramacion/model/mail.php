<?php
	include_once 'usuario.php';
	class EnviarMail{
		public static function creacionUsuario($usuario, $url){
			$titulo = 'Cambio de contraseña';
			$mensaje = '<html>'.
				'<head><title>Usuario creado</title></head>'.
				'<body><h1>Usuario creado</h1>'.
				'Ingrese al siguiente link para ingresar una contraseña'.
				'<hr>'.
				'<a href="'.$_SERVER['HTTP_HOST']."/cambiarcontrasena.php?url=".$url.'" >Cambiar Contraseña</a>'.
				'</body>'.
				'</html>';
			$cabeceras = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$cabeceras .= 'From: IPass<yodas@ipdss.com>';
			$enviado = mail($usuario->getEmail(), $titulo, $mensaje, $cabeceras);
			return $enviado;
		}

		public static function cambioContrasena($mail, $usuario){

		}
	}
?>