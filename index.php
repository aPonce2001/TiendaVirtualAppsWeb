<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <h1>Tienda virtual - Login</h1>
        <form action="mipanel.php?lang=es" method="POST">
            <label for="txtUser"> Usuario: </label>
            <br/>
            <input type="text" id="txtUser" name="usuario" required/>
            <br/>

            <label for="pwdPass"> Contraseña: </label>
            <br/>
            <input type="password" id="pwdPass" name="contrasenia" required/>
            <br/><br/>
            
            <input type="submit" name="smtEnviar"/>
            <br/><br/>
            
            <input type="checkbox" id = "chkRecuerdame" name="recuerdame">
            <label for="chkRecuerdame"> Recuérdame</label>

            <?php
                if(isset($_GET["auth"]) && $_GET["auth"] == "false"){
                    echo "<h3>Por favor, inicie sesión.</h3>";
                }
            ?>
        </form>   
    </body>
</html>