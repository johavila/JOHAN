<?php
include_once "dataSource.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuario.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/model/mail.php";

class UsuarioDAO{
	
    public static function buscar_por_usuario($conexion, $nombreUsuario){
    	$dataSource = new DataSource();
        $usuario = null;
        if(isset($conexion)){
            try{
                $sql = "SELECT *from account WHERE username = :username";
                $data_table = $dataSource->select($conexion, $sql, ['username'=>$nombreUsuario]);
                foreach ($data_table as $key => $value) {
                	$usuario = new Usuario($data_table[$key]['id'], $data_table[$key]['username'], $data_table[$key]['password'], $data_table[$key]['type']);
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return $usuario;
    }

    public static function existe_usuario($conexion, $username){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from account WHERE username = :username";
                $data_table = $dataSource->select($conexion, $sql, ['username'=>$username]);
                if(count($data_table)>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function nuevo_usuario_cliente($conexion, $usuario){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                if(!self::existe_usuario($conexion, $usuario->getNumeroDocumento())){
                    $sql1 = "INSERT INTO account (username, type) VALUES(:username, :type)";
                    $resultado = $dataSource->update($conexion, $sql1, ['username'=>$usuario->getNumeroDocumento(), 'type'=>1]);
                    if($resultado>0){
                        $account = self::buscar_por_usuario($conexion, $usuario->getNumeroDocumento());
                        if($account!=null){
                            $sql2 = "INSERT INTO cliente (id, tipo_identificacion, numero_documento, nombre1, nombre2, apellido1, apellido2, direccion, telefono, celular, fecha_nacimiento, lugar_nacimiento_depar, lugar_nacimiento_ciudad, estado_civil, estrato, genero, email) VALUES(:id, :tipo_identificacion, :numero_documento, :nombre1, :nombre2, :apellido1, :apellido2, :direccion, :telefono, :celular, FROM_UNIXTIME(:fecha_nacimiento), :lugar_nacimiento_depar, :lugar_nacimiento_ciudad, :estado_civil, :estrato, :genero, :email)";
                            $resultado2 = $dataSource->update($conexion, $sql2, ['id'=>$account->getId(), 'tipo_identificacion'=>$usuario->getTipoDocumento(), 'numero_documento'=>$usuario->getNumeroDocumento(), 'nombre1'=>$usuario->getNombre1(), 'nombre2'=>$usuario->getNombre2(), 'apellido1'=>$usuario->getApellido1(), 'apellido2'=>$usuario->getApellido2(), 'direccion'=>$usuario->getDireccion(), 'telefono'=>$usuario->getTelefono(), 'celular'=>$usuario->getCelular(), 'fecha_nacimiento'=>strtotime($usuario->getFechaNacimiento()), 'lugar_nacimiento_depar'=>$usuario->getLugarNacimientoDepar(), 'lugar_nacimiento_ciudad'=>$usuario->getLugarNacimientoCiudad(), 'estado_civil'=>$usuario->getEstadoCivil(), 'estrato'=>$usuario->getEstrato(), 'genero'=>$usuario->getGenero(), 'email'=>$usuario->getEmail()]);
                                $usuario->setId($account->getId());
                                $url = self::cambiarContrasena($conexion, $usuario);
                                EnviarMail::creacionUsuario($usuario, $url);
                            if($resultado2>0){
                                return true;
                            }
                        }
                    }
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    

    public static function nuevo_usuario_medico($conexion, $usuario){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                if(!self::existe_usuario($conexion, $usuario->getNumeroDocumento())){
                    $sql1 = "INSERT INTO account (username, type) VALUES(:username, :type)";
                    $resultado = $dataSource->update($conexion, $sql1, ['username'=>$usuario->getNumeroDocumento(), 'type'=>2]);
                    if($resultado>0){
                        $account = self::buscar_por_usuario($conexion, $usuario->getNumeroDocumento());
                        if($account!=null){
                            $sql2 = "INSERT INTO medico (id, documento, nombre1, nombre2, apellido1, apellido2, tp, especialidad, email) VALUES(:id, :documento, :nombre1, :nombre2, :apellido1, :apellido2, :tp, :especialidad, :email)";
                            $resultado2 = $dataSource->update($conexion, $sql2, ['id'=>$account->getId(), 'documento'=>$usuario->getNumeroDocumento(), 'nombre1'=>$usuario->getNombre1(), 'nombre2'=>$usuario->getNombre2(), 'apellido1'=>$usuario->getApellido1(), 'apellido2'=>$usuario->getApellido2(), 'tp'=>$usuario->getTp(), 'especialidad'=>$usuario->getEspecialidad(), 'email'=>$usuario->getEmail()]);
                                $usuario->setId($account->getId());
                                $url = self::cambiarContrasena($conexion, $usuario);
                                EnviarMail::creacionUsuario($usuario, $url);
                            if($resultado2>0){
                                return true;
                            }
                        }
                    }
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function filtrarUsuarioMedico($conexion, $values = array()){
        if(isset($conexion) && count($values)>0){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioMedico.php";
            $dataSource = new DataSource();
            try{
                $usuarios = array();
                $sql = "SELECT *FROM medico ";
                $data = array();
                $i = 0;
                foreach ($values as $key => $value) {
                    if(strlen($value) != 0){
                        if($i==0){
                            $sql.="WHERE ".$key." = :".$key." ";
                            $data[$key] = $value;
                        }
                        else{
                            $sql.="AND ".$key." = :".$key." ";
                            $data[$key] = $value;
                        }
                        $i++;
                    }
                }
                $data_table = $dataSource->select($conexion, $sql, $data);
                $j = 1;
                foreach ($data_table as $key => $value) {
                    $usuario = new usuarioMedico($data_table[$key]['id'], $data_table[$key]['documento'], null, null);
                    $usuario->setIdTemp($j);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTp($data_table[$key]['tp']);
                    $usuario->setEspecialidad($data_table[$key]['especialidad']);
                    $usuario->setEmail($data_table[$key]['email']);
                    $usuario->setHoraEntrada($data_table[$key]['hora_entrada']);
                    $usuario->setHoraSalida($data_table[$key]['hora_salida']);
                    $usuarios[] = $usuario;
                    $j++;
                }
                return $usuarios;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function listarUsuariosMedicos($conexion){
        if(isset($conexion)){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioMedico.php";
            $dataSource = new DataSource();
            try{
                $usuarios = array();
                $sql = "SELECT *FROM medico";
                $data_table = $dataSource->select($conexion, $sql, []);
                $j = 1;
                foreach ($data_table as $key => $value) {
                    $usuario = new usuarioMedico($data_table[$key]['id'], $data_table[$key]['documento'], null, null);
                    $usuario->setIdTemp($j);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTp($data_table[$key]['tp']);
                    $usuario->setEspecialidad($data_table[$key]['especialidad']);
                    $usuario->setEmail($data_table[$key]['email']);
                    $usuario->setHoraEntrada($data_table[$key]['hora_entrada']);
                    $usuario->setHoraSalida($data_table[$key]['hora_salida']);
                    $usuarios[] = $usuario;
                    $j++;
                }
                return $usuarios;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function actualizarHorarioMedico($conexion, $idMedico, $horaInicio, $horaFinal){
        if(isset($conexion)){
            $dataSource = new DataSource();
            try{
                $sql = "UPDATE medico SET hora_entrada = :horaEntrada, hora_salida = :horaSalida WHERE id = :id";
                $resultado = $dataSource->update($conexion, $sql, ['horaEntrada'=>$horaInicio, 'horaSalida'=>$horaFinal, 'id'=>$idMedico]);
                if($resultado>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function usuarioMedicoMenorHorario($conexion){
        if(isset($conexion)){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioMedico.php";
            $dataSource = new DataSource();
            try{
                $sql = "SELECT *FROM medico ORDER BY hora_entrada ASC";
                $data_table = $dataSource->select($conexion, $sql, []);
                $usuario = null;
                foreach ($data_table as $key => $value) {
                    $usuario = new usuarioMedico($data_table[$key]['id'], $data_table[$key]['documento'], null, null);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTp($data_table[$key]['tp']);
                    $usuario->setEspecialidad($data_table[$key]['especialidad']);
                    $usuario->setEmail($data_table[$key]['email']);
                    $usuario->setHoraEntrada($data_table[$key]['hora_entrada']);
                    $usuario->setHoraSalida($data_table[$key]['hora_salida']);
                }
                return $usuario;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function usuarioMedicoMayorHorario($conexion){
        if(isset($conexion)){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioMedico.php";
            $dataSource = new DataSource();
            try{
                $sql = "SELECT *FROM medico ORDER BY hora_salida DESC";
                $data_table = $dataSource->select($conexion, $sql, []);
                $usuario = null;
                foreach ($data_table as $key => $value) {
                    $usuario = new usuarioMedico($data_table[$key]['id'], $data_table[$key]['documento'], null, null);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTp($data_table[$key]['tp']);
                    $usuario->setEspecialidad($data_table[$key]['especialidad']);
                    $usuario->setEmail($data_table[$key]['email']);
                    $usuario->setHoraEntrada($data_table[$key]['hora_entrada']);
                    $usuario->setHoraSalida($data_table[$key]['hora_salida']);
                }
                return $usuario;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function contarMedicos($conexion){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from medico";
                $data_table = $dataSource->select($conexion, $sql, []);

                return count($data_table);
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return -1;
    }

    public static function buscarUsuarioMedicoId($conexion, $id){
        if(isset($conexion)){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioMedico.php";
            $dataSource = new DataSource();
            try{
                $sql = "SELECT *FROM medico WHERE id = :id";
                $data_table = $dataSource->select($conexion, $sql, ['id' => $id]);
                $usuario = null;
                foreach ($data_table as $key => $value) {
                    $usuario = new usuarioMedico($data_table[$key]['id'], $data_table[$key]['documento'], null, null);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTp($data_table[$key]['tp']);
                    $usuario->setEspecialidad($data_table[$key]['especialidad']);
                    $usuario->setEmail($data_table[$key]['email']);
                    $usuario->setHoraEntrada($data_table[$key]['hora_entrada']);
                    $usuario->setHoraSalida($data_table[$key]['hora_salida']);
                }
                return $usuario;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function filtrarUsuarioPaciente($conexion, $values = array()){
        if(isset($conexion) && count($values)>0){
            include_once $_SERVER["DOCUMENT_ROOT"]."/model/usuarioCliente.php";
            $dataSource = new DataSource();
            try{
                $usuarios = array();
                $sql = "SELECT *FROM cliente ";
                $data = array();
                $i = 0;
                foreach ($values as $key => $value) {
                    if(strlen($value) != 0){
                        if($i==0){
                            $sql.="WHERE ".$key." = :".$key." ";
                            $data[$key] = $value;
                        }
                        else{
                            $sql.="AND ".$key." = :".$key." ";
                            $data[$key] = $value;
                        }
                        $i++;
                    }
                }
                $data_table = $dataSource->select($conexion, $sql, $data);
                $j = 1;
                foreach ($data_table as $key => $value) {
                    $usuario = new UsuarioCliente($data_table[$key]['id'], $data_table[$key]['numero_documento'], null, null);
                    $usuario->setIdTemp($j);
                    $usuario->setNombre1($data_table[$key]['nombre1']);
                    $usuario->setNombre2($data_table[$key]['nombre2']);
                    $usuario->setApellido1($data_table[$key]['apellido1']);
                    $usuario->setApellido2($data_table[$key]['apellido2']);
                    $usuario->setTipoDocumento($data_table[$key]['tipo_identificacion']);
                    $usuario->setDireccion($data_table[$key]['direccion']);
                    $usuario->setLugarNacimientoDepar($data_table[$key]['lugar_nacimiento_depar']);
                    $usuario->setLugarNacimientoCiudad($data_table[$key]['lugar_nacimiento_ciudad']);
                    $usuario->setEstadoCivil($data_table[$key]['estado_civil']);
                    $usuarios[] = $usuario;
                    $j++;
                }
                return $usuarios;
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function cambiar_password_usuario($conexion, $id, $nuevaContrasena){
        if(isset($conexion)){
            $dataSource = new DataSource();
            try{
                $sql1 = "UPDATE account SET password = :password WHERE id = :id";
                $resultado = $dataSource->update($conexion, $sql1, ['password'=>$nuevaContrasena, 'id'=>$id]);
                if($resultado>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function cambiarContrasena($conexion, $usuario){
        if(isset($conexion)){
            if(!self::existe_peticion_cambio_pwd($conexion, $usuario)){
                $dataSource = new DataSource();
                try{
                    $url = self::generarUrl($usuario->getNumeroDocumento());
                    $sql1 = "INSERT INTO cambiar_password (id, url) VALUES(:id, :url)";
                    $resultado = $dataSource->update($conexion, $sql1, ['id'=>$usuario->getId(), 'url'=>$url]);
                    if($resultado>0){
                        return $url;
                    }
                }catch(PDOException $ex){
                    print 'ERROR: '.$ex->getMessage();
                }
            }
        }
        return null;
    }

    public static function existe_peticion_cambio_pwd($conexion, $usuario){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from cambiar_password WHERE id = :id";
                $data_table = $dataSource->select($conexion, $sql, ['id'=>$usuario->getId()]);
                if(count($data_table)>0){
                    //si la peticion ya sobrepaso el tiempo se elimina
                    if(false){
                        self::eliminar_peticion_cambio_pwd($usuario);
                        return false;
                    }else{
                        return true;
                    }
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function id_peticion_cambio_pwd_url($conexion, $url){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from cambiar_password WHERE url = :url";
                $data_table = $dataSource->select($conexion, $sql, ['url'=>$url]);
                foreach ($data_table as $key => $value) {
                    return $data_table[$key]['id'];
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return null;
    }

    public static function existe_peticion_cambio_pwd_url($conexion, $url){
        $dataSource = new DataSource();
        if(isset($conexion)){
            try{
                $sql = "SELECT *from cambiar_password WHERE url = :url";
                $data_table = $dataSource->select($conexion, $sql, ['url'=>$url]);
                if(count($data_table)>0){
                    //si la peticion ya sobrepaso el tiempo se elimina
                    if(false){
                        self::eliminar_peticion_cambio_pwd($url);
                        return false;
                    }else{
                        return true;
                    }
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    public static function eliminar_peticion_cambio_pwd($conexion, $url){
        if(isset($conexion)){
            $dataSource = new DataSource();
            try{
                $sql1 = "DELETE FROM cambiar_password WHERE url = :url";
                $resultado = $dataSource->update($conexion, $sql1, ['url'=>$url]);
                if($resultado>0){
                    return true;
                }
            }catch(PDOException $ex){
                print 'ERROR: '.$ex->getMessage();
            }
        }
        return false;
    }

    private static function generarUrl($username){
        $letras = ['a','A', 'b', 'B', 'c', 'C', 'd', 'D', 'e', 'E', 'f', 'F', 'g', 'G', 'h', 'H', 'i', 'I', 'j', 'J', 'k', 'K', 'l', 'L', 'm', 'M', 'n', 'N', 'o', 'O', 'p', 'P', 'q', 'Q', 'r', 'R', 's', 'S', 't', 'T', 'u', 'U', 'v', 'V', 'w', 'W', 'x', 'X', 'y', 'Y', 'z', 'Z'];
        $caracteres = "";
        for($i = 0; $i<30; $i++){
            $caracteres.= $letras[rand(0, count($letras)-1)];
        }
        $caracteres.=$username;
        return hash('sha256', $caracteres);
    }
}
?>