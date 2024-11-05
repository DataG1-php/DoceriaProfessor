<?php

    include_once '../model/Login.php';
    Login::deslogar();
    header("location:../view/principal.php");

?>