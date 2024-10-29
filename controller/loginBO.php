<?php

    include_once '../model/Login.php';

    if(isset($_POST['usuario'])&& isset($_POST['senha'])){
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];
        Login::verificaLogin($login, $senha);
    }

?>