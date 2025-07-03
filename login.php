<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="formulario">
        <h1>Inicio de Sesion</h1>
        <form method="Post" action = "loginu.php">
            <div class="username">
                <input id = "username" name = "username" type="text" required>
                <label>Nombre de Usuario</label>
            </div>
            <div class="username">
                <input id = "clave" name= "clave" type="password" required>
                <label>Contraseña</label>
            </div>
            <!-- <div class="recordar">¿Olvidaste tu contraseña?<a href="index.html"></div> -->
            <input name = "btnIngresar" type="submit" value="Iniciar">
            <div class="registrarse">
                No tienes cuenta? <a href="Registro.php">registrate!</a>
            </div>
        </form>
    
    </div>
<body>
<html>
