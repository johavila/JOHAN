<?php
	if(session_id() == ''){
        session_start();
    }
    if(isset($_POST['login'], $_POST['user'], $_POST['password'])){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/login.php';
		$user = UsuarioDAO::buscar_por_usuario(Database::open_conexion(), $_POST['user']);
		Database::close_conexion();
		if($user != null && $user->getPassword() == $_POST['password']){
			Login::log_in($user);
			echo 1;
		}else{
			echo 0;
		}
	}

	if(isset($_POST['isLogin'])){
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/login.php';
		if(Login::isLogin()){
			echo 1;
		}else{
			echo 0;
		}
	}
?>