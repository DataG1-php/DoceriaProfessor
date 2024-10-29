<?php

include_once 'Usuario.php';

abstract class Login {
    
    public static function criaSessao($idusuario){
        session_start();//inicia a sessao
        $_SESSION['status'] = 'logado';
        $_SESSION['idusuario'] = $idusuario;
        header('location: ../view/principal.php');
    }
    
    public static function verificaLogin($login,$senha){
        $user = new Usuario();
        $resultado = $user->autenticaUsuario($login, $senha);    
        $idusuario = $resultado->idusuario;
        self::criaSessao($idusuario);
    }
    
    public static function verificaSessao() {
        session_start();
        if($_SESSION['status'] != 'logado'){
            ?>
            <script>
                alert('Por favor, realize o login!');
                document.location.href='../view/login.php';
            </script>
            <?php
        }else{
            return true;
        }
        
    }
    
    public static function deslogar() {
        session_start();
        session_destroy();
    }
}
?>