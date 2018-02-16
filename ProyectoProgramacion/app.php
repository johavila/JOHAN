<?php
include_once 'model/login.php';
include_once 'model/usuario.php';
include_once 'model/usuarioMedico.php';
include_once 'model/mail.php';
include_once 'model/repositorio_informacion.php';
include_once 'model/db.php';
include_once 'model/DAO/usuarioDAO.php';
include_once 'model/usuarioCliente.php';
if(session_id() == ''){
    session_start();
}

if(isset($_GET['LogOut'])){
	Login::log_out();
}

if(!Login::isLogin()){
	header("Location: login.php");
	exit();
}
$usuario = $_SESSION["login"];

include_once 'view/header/header1.html';

if($usuario->getType()==1){
	$menu = [
		'apartarCita' => 'Apartar Cita',
		//'resultados' => 'Resultados',
		'verCita' => 'Ver citas',
		'cambiarContrasena' => 'Cambiar Contraseña'
		
	];

	$form = [
		'apartarCita' => 'view/form/pedirCitas.php',
		'cambiarContrasena' => 'view/form/cambioContrasena.html',
		'verCita' => 'view/form/verCitas.html'
	];
	include_once 'view/form/home.php';
}

if($usuario->getType()==2){

	$menu = [
		'citas' => 'Citas Programadas',
		'consulta' => 'Consulta',
	];

	$form = [
		'consulta' => 'view/form/consultaPaciente.php',
		'consulta,ver' => 'view/form/consulta.php',
		'citas' => 'view/form/citasProgramadas.html'
	];
	include_once 'view/form/home.php';
}

if($usuario->getType()==3){
	$menu = [
		'registrarUsuario' => 'Registrar Usuario',
		'consultaMedico' => 'Consultar Medico',
		'agregarMedico' => 'Agregar Medico',
	];

	$form = [
		'registrarUsuario' => 'view/form/datosPaciente.html',
		'consultaMedico,ver' => 'view/form/verMedico.php',
		'consultaMedico' => 'view/form/consultaMedico.php',
		'agregarMedico' => 'view/form/agregarMedico.html'
	];
	include_once 'view/form/home.php';
}
include_once 'view/footer/footer1.html';
?>
		
	