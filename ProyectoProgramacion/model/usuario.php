<?php
class Usuario{
    private $id;
    private $idTemp;
    private $password;
    private $tipoDocumento;
    private $numeroDocumento;
    private $genero;
    private $type;

    public function __construct($id, $numeroDocumento, $password, $type){
    	$this->id = $id;
        $this->numeroDocumento = $numeroDocumento;
        $this->password = $password;
        $this->type = $type;
    }

    public function getId(){
        return $this->id;
    }

    public function getIdTemp(){
        return $this->idTemp;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }

    public function getGenero(){
        return $this->genero;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function setIdTemp($idTemp){
        $this->idTemp = $idTemp;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }

    public function setTipoDocumento($tipoDocumento){
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento = $numeroDocumento;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }
    
    public function setType($type){
        $this->type = $type;
    }


}
?>