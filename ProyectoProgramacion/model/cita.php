<?php
	class Cita{
		private $idTemp;
		private $id;
		private $idPaciente;
		private $idMedico;
		private $fecha;
		private $hora;
		private $tipoCita;

		public function getIdTemp(){
			return $this->idTemp;
		}

		public function getId(){
			return $this->id;
		}

		public function getIdPaciente(){
			return $this->idPaciente;
		}

		public function getIdMedico(){
			return $this->idMedico;
		}

		public function getFecha(){
			return $this->fecha;
		}

		public function getHora(){
			return $this->hora;
		}

		public function getTipoCita(){
			return $this->tipoCita;
		}

		public function setIdTemp($idTemp){
			$this->idTemp = $idTemp;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setIdPaciente($idPaciente){
			$this->idPaciente = $idPaciente;
		}

		public function setIdMedico($idMedico){
			$this->idMedico = $idMedico;
		}

		public function setFecha($fecha){
			$this->fecha = $fecha;
		}

		public function setHora($hora){
			$this->hora = $hora;
		}

		public function setTipoCita($tipoCita){
			$this->tipoCita = $tipoCita;
		}
	}
?>