<?php
include_once "dataSource.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/model/cita.php";
class CitaDAO{
	public static function contarCitaHoraFecha($conexion, $hora, $fecha){
		$dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from cita WHERE hora = :hora AND fecha = FROM_UNIXTIME(:fecha)";
                $data_table = $dataSource->select($conexion, $sql, ['fecha'=>strtotime($fecha), 'hora' => $hora]);
                return count($data_table);
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return -1;
	}

	public static function buscarCitasHoraFecha($conexion, $hora, $fecha){
		$dataSource = new DataSource();
        if(isset($conexion)){
            try{
            	$citas = array();
                $sql = "SELECT *from cita WHERE hora = :hora AND fecha = FROM_UNIXTIME(:fecha)";
                $data_table = $dataSource->select($conexion, $sql, ['fecha'=>strtotime($fecha), 'hora' => $hora]);
                foreach ($data_table as $key => $value) {
                    $cita = new Cita();
                    $cita->setId($data_table[$key]['id']);
                    $cita->setIdMedico($data_table[$key]['id_medico']);
                    $cita->setFecha($data_table[$key]['fecha']);
                    $cita->setHora($data_table[$key]['hora']);
                    $cita->setTipoCita($data_table[$key]['tipo_cita']);
                    $citas[] = $cita;
                }
                return $citas;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
	}

	public static function buscarCitasIdUsuario($conexion, $id){
		$dataSource = new DataSource();
        if(isset($conexion)){
            try{
            	$citas = array();
                $sql = "SELECT *from cita WHERE id_paciente = :id ORDER BY fecha, hora ASC";
                $data_table = $dataSource->select($conexion, $sql, ['id' => $id]);
                foreach ($data_table as $key => $value) {
                    $cita = new Cita();
                    $cita->setId($data_table[$key]['id']);
                    $cita->setIdPaciente($data_table[$key]['id_paciente']);
                    $cita->setIdMedico($data_table[$key]['id_medico']);
                    $cita->setFecha($data_table[$key]['fecha']);
                    $cita->setHora($data_table[$key]['hora']);
                    $cita->setTipoCita($data_table[$key]['tipo_cita']);
                    $citas[] = $cita;
                }
                return $citas;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
	}

	public static function buscarCitasIdMedicoFecha($conexion, $idMedico, $fecha){
		$dataSource = new DataSource();
        if(isset($conexion)){
            try{
            	$citas = array();
                $sql = "SELECT *from cita WHERE id_medico = :idMedico && fecha = FROM_UNIXTIME(:fecha) ORDER BY fecha, hora ASC";
                $data_table = $dataSource->select($conexion, $sql, ['idMedico' => $idMedico, 'fecha' => strtotime($fecha)]);
                foreach ($data_table as $key => $value) {
                    $cita = new Cita();
                    $cita->setId($data_table[$key]['id']);
                    $cita->setIdPaciente($data_table[$key]['id_paciente']);
                    $cita->setIdMedico($data_table[$key]['id_medico']);
                    $cita->setFecha($data_table[$key]['fecha']);
                    $cita->setHora($data_table[$key]['hora']);
                    $cita->setTipoCita($data_table[$key]['tipo_cita']);
                    $citas[] = $cita;
                }
                return $citas;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
	}

	public static function eliminarCita($conexion, $id){
		if(isset($conexion)){
            $dataSource = new DataSource();
            try{
                $sql = "DELETE FROM cita WHERE id = :id";
                $resultado = $dataSource->update($conexion, $sql, ['id'=>$id]);
                if($resultado>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
	}

	public static function agregarCita($conexion, $cita){
		if(isset($conexion)){
            $dataSource = new DataSource();
            try{
                $sql = "INSERT INTO cita (id_paciente, id_medico, fecha, hora, tipo_cita) VALUES(:id, :idMedico, FROM_UNIXTIME(:fecha), :hora, :tipoCita)";
                $resultado = $dataSource->update($conexion, $sql, ['id'=>$cita->getId(), 'idMedico'=>$cita->getIdMedico(), 'fecha' => strtotime($cita->getFecha()), 'hora'=>$cita->getHora(), 'tipoCita'=>$cita->getTipoCita()]);
                if($resultado>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
	}
}
?>