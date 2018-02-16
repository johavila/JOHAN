<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuario.php';
class UsuarioCliente extends usuario{
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $direccion;
    private $telefono;
    private $celular;
    private $email;
    private $fechaNacimiento;
    private $lugarNacimientoDepar;
    private $lugarNacimientoCiudad;
    private $estadoCivil;
    private $estrato;
    private $ipsAfiliado;

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

    public function getDireccion(){
    	return $this->direccion;
    }

    public function getTelefono(){
    	return $this->telefono;
    }

    public function getCelular(){
    	return $this->celular;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function getFechaNacimiento(){
    	return $this->fechaNacimiento;
    }

    public function getLugarNacimientoDepar(){
    	return $this->lugarNacimientoDepar;
    }

    public function getLugarNacimientoCiudad(){
    	return $this->lugarNacimientoCiudad;
    }

    public function getEstadoCivil(){
    	return $this->estadoCivil;
    }

    public function getEstrato(){
        return $this->estrato;
    }

    public function getIpsAfiliado(){
    	return $this->ipsAfiliado;
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

    public function setDireccion($direccion){
    	$this->direccion = $direccion;
    }

    public function setTelefono($telefono){
    	$this->telefono = $telefono;
    }

    public function setCelular($celular){
    	$this->celular = $celular;
    }

    public function setEmail($email){
    	$this->email = $email;
    }

    public function setFechaNacimiento($fechaNacimiento){
    	$this->fechaNacimiento = $fechaNacimiento;
    }

    public function setLugarNacimientoDepar($lugarNacimientoDepar){
    	$this->lugarNacimientoDepar = $lugarNacimientoDepar;
    }

    public function setLugarNacimientoCiudad($lugarNacimientoCiudad){
    	$this->lugarNacimientoCiudad = $lugarNacimientoCiudad;
    }

    public function setEstadoCivil($estadoCivil){
    	$this->estadoCivil = $estadoCivil;
    }

    public function setEstrato($estrato){
        $this->estrato = $estrato;
    }

    public function setIpsAfiliado($ipsAfiliado){
    	$this->ipsAfiliado = $ipsAfiliado;
    }
}
?>