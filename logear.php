<?php
    require_once("connection.php");

    if(isset($_POST['btnIngresar'])) {
        if(empty($_POST['usuario']) || empty($_POST['clave'])) {
            echo 'Favor de llenar todos los campos.';
        } else {
            $UserName = mysqli_real_escape_string($con, $_POST['usuario']);
            $UserPass = mysqli_real_escape_string($con, $_POST['clave']);
            
            $query = "select * FROM usuarios WHERE nombre = '$UserName'";
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0) 
            {
                // Usuario encontrado
                $usuario = mysqli_fetch_assoc($result);
                // Verificar contraseña
                $ContraPHP=strval($UserPass);
                $ContraSQL=strval($usuario['clave']);
                if($ContraPHP==$ContraSQL) {
                    // Inicio de sesión exitoso, redirigir a index.html
                    header("Location: index.html");
                    exit(); // Asegurarse de que el script termine después de redirigir
                } 
                else 
                {
                    echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
                    header("Location: login.php");
                    echo 'Usuario no encontrado.';
                    //header("Location: login.php");
                }
            } else {
                echo 'Usuario no encontrado.';
                header("Location: login.php");
                echo 'Usuario no encontrado.';
            }
        }
    } else {
        echo 'Usuario no encontrado.';
        header("Location: login.php");
        echo 'Usuario no encontrado.';
        exit();
    }
?>
