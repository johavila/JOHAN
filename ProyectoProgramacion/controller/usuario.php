<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/login.php';
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuario.php';
	date_default_timezone_set('America/Bogota');
	if(session_id() == ''){
        session_start();
    }
    
	if(isset($_SESSION['login']) && $_SESSION["login"]->getType() == 3){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
		

		if(isset($_POST['nuevoUsuarioCliente'], $_POST['tipoDocumento'], $_POST['numeroDocumento'], $_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'], $_POST['apellido2'], $_POST['genero'], $_POST['direccion'], $_POST['telefono'], $_POST['celular'], $_POST['email'], $_POST['fechaNacimiento'], $_POST['lugarNacimientoDepar'], $_POST['lugarNacimientoCiudad'], $_POST['estrato'], $_POST['estadoCivil'])){
			include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuarioCliente.php';
			$usuario = new UsuarioCliente(null, $_POST['numeroDocumento'], null, null);
			$usuario->setTipoDocumento($_POST['tipoDocumento']);
			$usuario->setNombre1($_POST['nombre1']);
			$usuario->setNombre2($_POST['nombre2']);
			$usuario->setApellido1($_POST['apellido1']);
			$usuario->setApellido2($_POST['apellido2']);
			$usuario->setGenero($_POST['genero']);
			$usuario->setDireccion($_POST['direccion']);
			$usuario->setTelefono($_POST['telefono']);
			$usuario->setCelular($_POST['celular']);
			$usuario->setEmail($_POST['email']);
			$usuario->setFechaNacimiento($_POST['fechaNacimiento']);
			$usuario->setLugarNacimientoDepar($_POST['lugarNacimientoDepar']);
			$usuario->setLugarNacimientoCiudad($_POST['lugarNacimientoCiudad']);
			$usuario->setEstrato($_POST['estrato']);
			$usuario->setEstadoCivil($_POST['estadoCivil']);

			if(UsuarioDAO::nuevo_usuario_cliente(Database::open_conexion(), $usuario)){
				echo 1;
			}else{
				echo 0;
			}
			Database::close_conexion();
		}

		if(isset($_POST['nuevoUsuarioMedico'], $_POST['numeroDocumento'], $_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'], $_POST['apellido2'], $_POST['tp'], $_POST['especialidad'], $_POST['email'])){
			include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuarioMedico.php';
			$usuario = new UsuarioMedico(null, $_POST['numeroDocumento'], null, null);
			$usuario->setNombre1($_POST['nombre1']);
			$usuario->setNombre2($_POST['nombre2']);
			$usuario->setApellido1($_POST['apellido1']);
			$usuario->setApellido2($_POST['apellido2']);
			$usuario->setTp($_POST['tp']);
			$usuario->setEspecialidad($_POST['especialidad']);
			$usuario->setEmail($_POST['email']);

			if(UsuarioDAO::nuevo_usuario_medico(Database::open_conexion(), $usuario)){
				echo 1;
			}else{
				echo 0;
			}
			Database::close_conexion();
		}

		if(isset($_POST['buscarMedico'], $_POST['nombre1'], $_POST['nombre2'], $_POST['apellido1'], $_POST['apellido2'], $_POST['documento'], $_POST['especialidad'])){
			include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
			$especialidad = $_POST['especialidad'];
			if($_POST['especialidad'] == 0){
				$especialidad = "";
			}
			$values = [
				'nombre1' => $_POST['nombre1'],
				'nombre2' => $_POST['nombre2'],
				'apellido1' => $_POST['apellido1'],
				'apellido2' => $_POST['apellido2'],
				'documento' => $_POST['documento'],
				'especialidad' => $especialidad
			];
			$medicos = UsuarioDAO::filtrarUsuarioMedico(Database::open_conexion(), $values);
			Database::close_conexion();

			$_SESSION['medicos'] = $medicos;
			$xml="<?xml version=\"1.0\"?>\n";
			$xml.="<consulta>\n";
			foreach ($medicos as $key => $value) {
				$xml.="<medico>\n";
				$xml.="<id>".$value->getIdTemp()."</id>\n";
				$xml.="<nombre>".$value->getNombre1()." ".$value->getNombre2()."</nombre>\n";
				$xml.="<apellido>".$value->getApellido1()." ".$value->getApellido2()."</apellido>\n";
				$xml.="<tp>".$value->getTp()."</tp>\n";
				$xml.="<especialidad>".Repositorio::tipoEspecialidad($value->getEspecialidad())."</especialidad>\n";
				$xml.="</medico>\n";
			}
			$xml.="</consulta>\n";
			header('Content-Type: text/xml');
			echo $xml;
		}
	}

	if(isset($_SESSION['login']) && $_SESSION["login"]->getType() == 2){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
		
		if(isset($_POST['buscarPaciente'], $_POST['documento'])){
			include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
			$values = [
				'numero_documento' => $_POST['documento']
			];
			$paciente = UsuarioDAO::filtrarUsuarioPaciente(Database::open_conexion(), $values);
			Database::close_conexion();

			$_SESSION['paciente'] = $paciente;
			$xml="<?xml version=\"1.0\"?>\n";
			$xml.="<consulta>\n";
			foreach ($paciente as $key => $value) {
				$xml.="<paciente>\n";
				$xml.="<id>".$value->getIdTemp()."</id>\n";
				$xml.="<nombre1>".$value->getNombre1()."</nombre1>\n";
				$xml.="<nombre2>".$value->getNombre2()."</nombre2>\n";
				$xml.="<apellido1>".$value->getApellido1()."</apellido1>\n";
				$xml.="<apellido2>".$value->getApellido2()."</apellido2>\n";
				$xml.="<tipoDocumento>".Repositorio::tipoDocumentoSimple($value->getTipoDocumento())."</tipoDocumento>\n";
				$xml.="<numeroDocumento>".$value->getNumeroDocumento()."</numeroDocumento>\n";
				$xml.="</paciente>\n";
			}
			$xml.="</consulta>\n";
			header('Content-Type: text/xml');
			echo $xml;
		}
	}

	if(isset($_SESSION['login']) && $_SESSION["login"]->getType() == 1){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';

		if(isset($_POST['cambiarContrasena'], $_POST['password'], $_POST['Rpassword'])){
			if($_POST['password'] == $_POST['Rpassword']){
				if(UsuarioDAO::cambiar_password_usuario(Database::open_conexion(), $_SESSION["login"]->getId(), $_POST['password'])){
					echo 1;
				}else{
					echo 0;				
				}
			}else{
				echo 0;
			}
		}
	}


	
?>