<?php
    session_start();

    #Validar post y crear sesión
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION["sesion_usuario"] = $_POST["usuario"];
        $_SESSION["sesion_contrasenia"] = $_POST["contrasenia"];
        
    }

    #Verificar si existe sesión
    if(!isset($_SESSION["sesion_usuario"]) && !isset($_SESSION["sesion_contrasenia"])){
        header("Location:index.php?auth=false");
    }

    //Creación de cookies - Sólo si vienen por POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $recuerdame = isset($_POST["recuerdame"])?$_POST["recuerdame"]:"";
        setcookie("cookie_recuerdame", $recuerdame);
        if($recuerdame != ""){
            $usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasenia"];
            setcookie("cookie_usuario", $usuario);
            setcookie("cookie_contrasenia", $contrasenia);
            setcookie("cookie_idioma", "es", time() + (60*60*24*30));
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h3>Bienvenido Usuario: <?php echo $_SESSION["sesion_usuario"];?></h3>
        <a href="mipanel.php?lang=es">ES(Español)</a> |
        <a href="mipanel.php?lang=en">EN(English)</a>
        <br/><br/>
        <a href="cerrarsesion.php">Cerrar Sesion (Esta acción borrará las cookies)</a><br/>
        <?php
            //Ingreso a la página por GET
            if(isset($_GET["lang"])){
                switch($_GET["lang"]){
                    case "es":
                        echo "<h2>Lista de productos</h2>";
                        
                        (!isset($_COOKIE["cookie_recuerdame"]))?:
                            setcookie("cookie_idioma", "es", time() + (60*60*24*30));
                        
                            $fp = fopen("categorias_es.txt", "r");
                        break;
                    case "en":
                        echo "<h2>Product list</h2>";
                        
                        (!isset($_COOKIE["cookie_recuerdame"]))?:
                            setcookie("cookie_idioma", "en", time() + (60*60*24*30));
                        
                        $fp = fopen("categorias_en.txt", "r");
                        break;
                    default:
                        echo "<h2>Idioma no soportado / Not supported language";
                }
            }else{
                echo "<h3>Seleccione un idioma / Select a language</h3>";
            }
            
            while (isset($fp) && !feof($fp)){
                $linea = fgets($fp);
                echo $linea . "<br>";
            }
        ?>
    </body>
</html>