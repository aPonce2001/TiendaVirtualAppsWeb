<?php
    session_start();

    if(!isset($_COOKIE["cookie_recuerdame"])){
        setcookie("cookie_usuario", "");
        setcookie("cookie_contrasenia", "");
        setcookie("cookie_recuerdame", "");
    }

    session_destroy();

    header("Location:index.php");
?>