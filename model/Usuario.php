<?php

include_once 'database/DB.php';

class Usuario {
    
    private $idusuario;
    private $login;
    private $senha;
    
    public function __construct() {
       
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function autenticaUsuario($login,$senha) {
        $query = "select * from usuario where login = '$login' "
                . "and senha = PASSWORD('$senha')";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        
        if (count($resultado) === 1) {
            return $resultado;
        }else{
            return 0;
        }
    }
}
?>