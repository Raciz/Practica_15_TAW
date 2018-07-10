<?php
//verificamos si el usuario ya ha iniciado session
if(isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php?section=dashboard');
          </script>";
}

//creamos un objeto de mvcController
$login = new mvcController();

//se manda a llamar el control para manejar el inicio de sesion
$login -> loginController();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ingresar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="views/media/css/login.css">
    </head>
    <body>
        <!--formulario para iniciar sesion en el sistema-->
        <form method="post" autocomplete="off">
            <h2>Login</h2>
            <p align="center"><img src="views/media/img/logo.png" width="106.96" height="90.3"></p>
            <label>
                <input type="text" name="user" required/>
                <div class="label-text">Username</div>
            </label>
            <label>
                <input type="password" name="password" required/>
                <div class="label-text">Password</div>
            </label>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
