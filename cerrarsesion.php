<?php
    session_start();

    session_destroy();

    setcookie("cookie_usuario", "");
    setcookie("cookie_contrasenia", "");
    setcookie("cookie_recuerdame", "");
    setcookie("cookie_idioma", "");

    header("Location:index.php");
?>