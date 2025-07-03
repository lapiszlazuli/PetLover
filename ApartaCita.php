<?php
require_once("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $correo = mysqli_real_escape_string($con, $_POST['correo']);
    $dia_reserva = mysqli_real_escape_string($con, $_POST['dia_reserva']);
    $hora_reserva = mysqli_real_escape_string($con, $_POST['hora_reserva']);
    $servicio = mysqli_real_escape_string($con, $_POST['servicio']);

    // Aquí puedes procesar los datos recibidos (por ejemplo, guardar en una base de datos, enviar por correo electrónico, etc.)
    // Prepara la consulta SQL usando consultas preparadas para prevenir inyecciones SQL
    $query = "INSERT INTO citas (CitaNombreCli, CitaEmailCli, CitaDiaReserv, CitaHora, CitaServicio) VALUES (?, ?, ?, ?, ?)";
    
    // Prepara la declaración
    $stmt = mysqli_prepare($con, $query);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "sssss", $nombre, $correo, $dia_reserva, $hora_reserva, $servicio);

    // Ejecuta la consulta
    $result = mysqli_stmt_execute($stmt);

    // Verifica si la inserción fue exitosa
    if ($result) {
        echo "Se realizo con exito el registro";
        header("location:booking.html");
    } else {
        echo "Error al insertar los datos: " . mysqli_error($con);
    }


    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
