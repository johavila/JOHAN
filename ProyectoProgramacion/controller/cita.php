<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuario.php';
	include_once $_SERVER["DOCUMENT_ROOT"].'/model/cita.php';
	date_default_timezone_set('America/Bogota');
	$duracionCita = 15;
	if(session_id() == ''){
        session_start();
    }

    if(isset($_SESSION['login']) && $_SESSION["login"]->getType() == 1){
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuarioMedico.php';
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/citaDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
		
		if(isset($_POST['medicoDisponibles'], $_POST['id'])){
			if(isset($_SESSION['horarioCitas'])){
				include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
				foreach ($_SESSION['horarioCitas'] as $key => $value){
					if($value->getIdTemp() == $_POST['id']){
						$fecha = $value->getFecha();
						$hora = $value->getHora();
						$citas = CitaDAO::buscarCitasHoraFecha(Database::open_conexion(), $hora, $fecha);
						$medicos = UsuarioDAO::listarUsuariosMedicos(Database::open_conexion());
						$xml="<?xml version=\"1.0\"?>\n";
						$xml.="<consulta>\n";
						$_SESSION['medicosDisponibles'] = array();
						foreach ($medicos as $key => $medico) {
							$mostrar = true;
							foreach ($citas as $key => $cita) {
								if($cita->getIdMedico() == $medico->getId()){
									$mostrar = false;
									break;
								}
							}
							if($mostrar){
								$xml.="<medico>\n";
								$xml.="<id>".$medico->getIdTemp()."</id>\n";
								$xml.="<nombre>".$medico->getApellido1()." ".$medico->getApellido2()." ".$medico->getNombre1()." ".$medico->getNombre2()."</nombre>\n";
								$xml.="<especialidad>".Repositorio::tipoEspecialidad($medico->getEspecialidad())."</especialidad>\n";
								$xml.="</medico>\n";
								$_SESSION['medicosDisponibles'][$medico->getIdTemp()] = ['idCita'=>$value->getIdTemp(), 'idMedico'=>$medico->getId()];
							}
						}
						$xml.="</consulta>\n";
						header('Content-Type: text/xml');
						echo $xml;
						Database::close_conexion();
						break;
					}
				}
			}
		}

		if(isset($_POST['horarioCitaDisponible'], $_POST['fecha'], $_POST['tipoConsulta'])){
			$cantidadMedicos = UsuarioDAO::contarMedicos(Database::open_conexion());
			$horarioMenor = explode(':', UsuarioDAO::usuarioMedicoMenorHorario(Database::open_conexion())->getHoraEntrada());
			$horarioMayor = explode(':', UsuarioDAO::usuarioMedicoMayorHorario(Database::open_conexion())->getHoraSalida());
			$Hinicio = $horarioMenor[0];
			$Minicio = $horarioMenor[1];
			$Hfinal = $horarioMayor[0];
			$Mfinal = $horarioMayor[1];
			$Hactual = $Hinicio;
			$Mactual = $Minicio;
			
			$hoy = getdate();
			$anno = $hoy['year'];
			$mes =($hoy['mon']>9) ? $hoy['mon']:"0".$hoy['mon'];
			$dia =$hoy['mday'];
			$fechaActual = $anno."-".$mes."-".$dia;
			$_SESSION['horarioCitas'] = array();
			$idTemp = 1;
			$xml="<?xml version=\"1.0\"?>\n";
			$xml.="<consulta>\n";
			while($Hactual < $Hfinal || $Mactual < $Mfinal){
				$hora = (strlen($Hactual)==1)?"0".$Hactual:$Hactual;
				$min = (strlen($Mactual)==1)?"0".$Mactual:$Mactual;
				$bool = true;
				if($_POST['fecha'] == $fechaActual && $Hactual <= $hoy['hours']){
					$bool = false;
				}else{
					if(CitaDAO::contarCitaHoraFecha(Database::open_conexion(), $hora.":".$min.":00", $_POST['fecha'])==$cantidadMedicos){
						$bool = false;
					}
				}
				if($bool){
					$xml.="<horario>\n";
					$xml.="<id>".$idTemp."</id>\n";
					$xml.="<hora>".$hora.":".$min.":00</hora>\n";
					$xml.="<fecha>".$_POST['fecha']."</fecha>\n";
					$xml.="</horario>\n";
					$cita = new Cita();
					$cita->setIdTemp($idTemp);
					$cita->setFecha($_POST['fecha']);
					$cita->setHora($hora.":".$min.":00");
					$_SESSION['horarioCitas'][] = $cita;
					$idTemp++;
				}
				$Mactual = $Mactual+$duracionCita;
				if($Mactual>59){
					$Mactual = $Mactual-60;
					$Hactual = $Hactual+1;
				}
			}
			$xml.="</consulta>\n";
			header('Content-Type: text/xml');
			Database::close_conexion();
			echo $xml;
		}

		if(isset($_POST['agregarCita'], $_POST['id'])){
			if(isset($_SESSION['medicosDisponibles'], $_SESSION['horarioCitas'], $_SESSION['medicosDisponibles'][$_POST['id']])){
				$datos = $_SESSION['medicosDisponibles'][$_POST['id']];
				$idMedico = $datos['idMedico'];
				foreach ($_SESSION['horarioCitas'] as $key => $value){
					if($value->getIdTemp() == $datos['idCita']){
						$cita = new Cita();
						$cita->setId($_SESSION["login"]->getId());
						$cita->setIdMedico($idMedico);
						$cita->setFecha($value->getFecha());
						$cita->setHora($value->getHora());
						$cita->setTipoCita(1);
						if(CitaDAO::agregarCita(Database::open_conexion() ,$cita)){
							$_SESSION['medicosDisponibles'] = null;
							$_SESSION['horarioCitas'] = null;
							echo 1;
						}else{
							echo 0;
						}
						Database::close_conexion();
						break;
					}
				}
			}
		}

		if (isset($_POST['verCitas'])) {
			$citas = CitaDAO::buscarCitasIdUsuario(Database::open_conexion(), $_SESSION["login"]->getId());
			$_SESSION['citas'] = array();
			$i = 1;
			$xml="<?xml version=\"1.0\"?>\n";
			$xml.="<consulta>\n";
			foreach ($citas as $key => $value) {
				$medico = UsuarioDAO::buscarUsuarioMedicoId(Database::open_conexion(), $value->getIdMedico());
				Database::close_conexion();
				$xml.="<cita>\n";
				$xml.="<id>".$i."</id>\n";
				$xml.="<medico>".$medico->getApellido1()." ".$medico->getApellido2()." ".$medico->getNombre1()." ".$medico->getNombre2()."</medico>\n";
				$xml.="<fecha>".$value->getFecha()."</fecha>\n";
				$xml.="<hora>".$value->getHora()."</hora>\n";
				$xml.="</cita>\n";
				$_SESSION['citas'][$i] = $value;
				$i++;
			}
			$xml.="</consulta>\n";
			header('Content-Type: text/xml');
			Database::close_conexion();
			echo $xml;
		}

		if(isset($_POST['eliminarCita'], $_POST['id'])){
			if(isset($_SESSION['citas'], $_SESSION['citas'][$_POST['id']])){
				$cita = $_SESSION['citas'][$_POST['id']];
				if(CitaDAO::eliminarCita(Database::open_conexion(), $cita->getId())){
					echo 1;
				}else{
					echo 0;
				}
				Database::close_conexion();
			}else{
				echo 0;
			}
		}
    }

    if(isset($_SESSION['login']) && $_SESSION["login"]->getType() == 2){
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/usuarioDAO.php';
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/usuarioMedico.php';
    	include_once $_SERVER["DOCUMENT_ROOT"].'/model/DAO/citaDAO.php';
		include_once $_SERVER["DOCUMENT_ROOT"].'/model/db.php';
    	if(isset($_POST['citasProgramadas'])){
    		include_once $_SERVER["DOCUMENT_ROOT"].'/model/repositorio_informacion.php';
    		$hoy = getdate();
			$anno = $hoy['year'];
			$hActual = $hoy['hours'];
			$minActual = $hoy['minutes'];
			$mes =($hoy['mon']>9) ? $hoy['mon']:"0".$hoy['mon'];
			$dia =$hoy['mday'];
			$fechaActual = $anno."-".$mes."-".$dia;
    		$citas = CitaDAO::buscarCitasIdMedicoFecha(Database::open_conexion(), $_SESSION["login"]->getId(), $fechaActual);
    		$xml="<?xml version=\"1.0\"?>\n";
			$xml.="<consulta>\n";
			foreach ($citas as $key => $value) {
				$idPaciente = $value->getIdPaciente();
				$pacientes = UsuarioDAO::filtrarUsuarioPaciente(Database::open_conexion(), ['id' => $idPaciente]);
				
				
				foreach ($pacientes as $key2 => $paciente) {
					$actual = 0;
					$hora = explode(":", $value->getHora());
					if(($hora[0]==$hActual)&&($minActual>=$hora[1] && $minActual<($hora[1]+$duracionCita))){
						$actual = 1;
					}
					$xml.="<cita>\n";
					$xml.="<paciente>".$paciente->getApellido1()." ".$paciente->getApellido2()." ".$paciente->getNombre1()." ".$paciente->getNombre2()."</paciente>\n";
					$xml.="<documento>".Repositorio::tipoDocumentoSimple($paciente->getTipoDocumento())." ".$paciente->getNumeroDocumento()."</documento>\n";
					$xml.="<hora>".$value->getHora()."</hora>\n";
					$xml.="<fecha>".$value->getFecha()."</fecha>\n";
					$xml.="<actual>".$actual."</actual>\n";
					$xml.="</cita>\n";
				}
			}
    		$xml.="</consulta>\n";
			header('Content-Type: text/xml');
    		Database::close_conexion();
    		echo $xml;
    	}
    }
?>