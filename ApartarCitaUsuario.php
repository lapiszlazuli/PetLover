<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    header("Location: login.php");
    exit(); // Asegurar que el script se detenga después de la redirección
}

// Obtener el nombre de usuario desde la sesión
$nombre_usuario = $_SESSION['username'];

// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = "root"; // Cambiar al usuario de tu base de datos
$password = ""; // Cambiar a la contraseña de tu base de datos
$dbname = "pet"; // Cambiar al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Variables para almacenar los datos del formulario
$dia_cita = "";
$hora_cita = "";
$tipo_servicio = "";

// Procesamiento del formulario cuando se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y escapar para evitar inyección SQL
    $dia_cita = mysqli_real_escape_string($conn, $_POST['dia_reserva']);
    $hora_cita = mysqli_real_escape_string($conn, $_POST['hora_reserva']);
    $tipo_servicio = mysqli_real_escape_string($conn, $_POST['servicio']);

    // Buscar el correo del usuario en la base de datos
    $sql_correo = "SELECT correo FROM usuarios WHERE nombre = '$nombre_usuario'";
    $result_correo = $conn->query($sql_correo);

    if ($result_correo->num_rows > 0) {
        $row = $result_correo->fetch_assoc();
        $correo_usuario = $row['correo'];

        // Verificar si ya existe una cita para el mismo día para el usuario
        $sql_verificar = "SELECT COUNT(*) as count FROM citas WHERE CitaNombreCli = '$nombre_usuario' AND CitaDiaReserv = '$dia_cita'";
        $result_verificar = $conn->query($sql_verificar);
        $row_verificar = $result_verificar->fetch_assoc();

        if ($row_verificar['count'] > 0) {
            // Si ya existe una cita para el mismo día, mostrar mensaje
            echo '<div class="alert alert-danger mt-3">Ya tienes una cita reservada para el mismo día.</div>';
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "index.php"; // Redirige a la página deseada
                    }, 3000); // 3000 milisegundos = 3 segundos
                 </script>';
        } else {
            // Insertar la cita en la tabla citas
            $sql_insertar = "INSERT INTO citas (CitaNombreCli, CitaEmailCli, CitaDiaReserv, CitaHora, CitaServicio)
                            VALUES ('$nombre_usuario', '$correo_usuario', '$dia_cita', '$hora_cita', '$tipo_servicio')";

            if ($conn->query($sql_insertar) === TRUE) {
                // Mensaje de éxito
                echo '<div class="alert alert-success mt-3">Cita registrada exitosamente.</div>';
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "index.php"; // Redirige a la página deseada
                        }, 3000); // 3000 milisegundos = 3 segundos
                     </script>';
            } else {
                // Mensaje de error
                echo '<div class="alert alert-danger mt-3">Error al registrar la cita: ' . $conn->error . '</div>';
            }
        }
    } else {
        // Mensaje si no se encuentra el correo del usuario
        echo '<div class="alert alert-danger mt-3">No se encontró el correo del usuario.</div>';
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>

<!-- Modal HTML -->
<div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cita Reservada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                El producto ha sido agregado correctamente a tu carrito de compras.
            </div>
        </div>
    </div>
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
