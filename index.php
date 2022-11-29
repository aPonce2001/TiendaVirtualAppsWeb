<?php
    $recuerdame = false;
    
    if(isset($_COOKIE["cookie_recuerdame"]) && $_COOKIE["cookie_recuerdame"] != ""){
        $recuerdame = true;
        $usuario = isset($_COOKIE["cookie_usuario"])?$_COOKIE["cookie_usuario"]:"";
        $contrasenia = isset($_COOKIE["cookie_contrasenia"])?$_COOKIE["cookie_contrasenia"]:"";
    }
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <h1>Tienda virtual - Login</h1>
        <form action=
        "<?php
            if(isset($_COOKIE["cookie_idioma"])){
                echo "mipanel.php?lang=" . $_COOKIE["cookie_idioma"];
            }else{
                echo "mipanel.php?lang=es";
            }
        ?>" method="POST">
            <label for="txtUser"> Usuario: </label>
            <br/>
            <input type="text" id="txtUser" name="usuario" value="<?php echo (isset($usuario))?$usuario:"";?>" required/>
            <br/>

            <label for="pwdPass"> Contraseña: </label>
            <br/>
            <input type="password" id="pwdPass" name="contrasenia" value="<?php echo (isset($contrasenia))?$contrasenia:"";?>" required/>
            <br/><br/>
            
            <input type="submit" name="smtEnviar"/>
            <br/><br/>
            
            <input type="checkbox" id = "chkRecuerdame" name="recuerdame" <?php echo ($recuerdame)?"checked":""?>>
            <label for="chkRecuerdame"> Recuérdame</label>

            <?php
                if(isset($_GET["auth"]) && $_GET["auth"] == "false"){
                    echo "<h3>Por favor, inicie sesión.</h3>";
                }
            ?>
        </form>
    </body>
</html>