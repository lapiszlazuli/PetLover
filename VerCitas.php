<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis citas</title>
    <!-- Bootstrap CSS u otro CSS necesario -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css"> <!-- Asegúrate de crear y ajustar este archivo según tus necesidades -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.ico">

    <!-- Additional Stylesheets -->
    <link rel="stylesheet" href="lib/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <!-- Colocar contenido aquí si es necesario -->
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Horarios</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Correo</h6>
                        <p class="m-0">said_rdg@hotmail.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Llamanos</h6>
                        <p class="m-0">6311787186</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Pet</span>Lover</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <a href="index.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Regresar</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Contact Start -->
    <div class="container mt-5">
        <h2 class="text-center">Lista de Citas</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID de la Cita</th>
                        <th>Nombre del cliente</th>
                        <th>Correo Electrónico</th>
                        <th>Día de Cita</th>
                        <th>Hora de Cita</th>
                        <th>Tipo de Servicio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Realizar consulta a la base de datos
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

                    $sql = "SELECT Cita_ID, CitaNombreCli, CitaEmailCli, CitaDiaReserv, CitaHora, CitaServicio FROM citas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar datos de cada fila
                        while($row = $result->fetch_assoc()) {
                            $tipo_cita = "";
                            switch ($row["CitaServicio"]) {
                                case 1:
                                    $tipo_cita = "Normal";
                                    break;
                                case 2:
                                    $tipo_cita = "Estándar";
                                    break;
                                case 3:
                                    $tipo_cita = "Premium";
                                    break;
                                default:
                                    $tipo_cita = "Desconocido";
                            }

                            echo "<tr>";
                            echo "<td>" . $row["Cita_ID"] . "</td>";
                            echo "<td>" . $row["CitaNombreCli"] . "</td>";
                            echo "<td>" . $row["CitaEmailCli"] . "</td>";
                            echo "<td>" . $row["CitaDiaReserv"] . "</td>";
                            echo "<td>" . $row["CitaHora"] . "</td>";
                            echo "<td>" . $tipo_cita . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay citas registradas.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="container-fluid bg-dark text-white py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Lover</h1>
                <p class="m-0">Pet Lover</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <!-- Contenido adicional del pie de página si es necesario -->
            </div>
        </div>
    </footer>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Nombre de tu sitio web</a>. Todos los derechos reservados. Diseñado por
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Botón de Volver Arriba -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdom