<?php
class Database {
    private static $conexion = null;
      
    public static function open_conexion() {
        if (self::$conexion == null) {
            try{
                include_once 'config.php';
                self::$conexion = new PDO("mysql:host=".SERVER_NAME."; dbname=".DB_NAME, USER_NAME, PASSWORD);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
            } catch(PDOException $ex){
                print "ERROR: ".$ex->getMessage();
                die();
            }
        }
        return self::$conexion;
    }
    
    public static function close_conexion(){
        if(isset(self::$conexion)){
            self::$conexion = null;
        }
    }
          
}
?>