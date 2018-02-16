<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuario.php';
class UsuarioMedico extends usuario{
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $tp;
    private $especialidad;
    private $email;
    private $horaEntrada;
    private $horaSalida;

    public function getNombre1(){
    	return $this->nombre1;
    }

    public function getNombre2(){
        return $this->nombre2;
    }

    public function getApellido1(){
    	return $this->apellido1;
    }

    public function getApellido2(){
        return $this->apellido2;
    }

    public function getTp(){
    	return $this->tp;
    }

    public function getEspecialidad(){
    	return $this->especialidad;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getHoraEntrada(){
    	return $this->horaEntrada;
    }

    public function getHoraSalida(){
    	return $this->horaSalida;
    }

    public function setNombre1($nombre1){
    	$this->nombre1 = $nombre1;
    }

    public function setNombre2($nombre2){
        $this->nombre2 = $nombre2;
    }

    public function setApellido1($apellido1){
    	$this->apellido1 = $apellido1;
    }

    public function setApellido2($apellido2){
        $this->apellido2 = $apellido2;
    }

    public function setTp($tp){
    	$this->tp = $tp;
    }

    public function setEspecialidad($especialidad){
    	$this->especialidad = $especialidad;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setHoraEntrada($horaEntrada){
    	$this->horaEntrada = $horaEntrada;
    }

    public function setHoraSalida($horaSalida){
    	$this->horaSalida = $horaSalida;
    }
}
?>