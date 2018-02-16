<?php
class Login{
    
    public static function log_in($usuario){
        if(session_id() == ''){
            session_start();
        }
        $_SESSION['login'] = $usuario;
        
    }
    
    public static function log_out(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        
        session_destroy();
    }
    
    public static function isLogin(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['login'])){
            return true;
        }
        return false;
    }
}
?>