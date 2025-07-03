!DOCTYPE html>
<html lang="en">

<head>
        <!-- Bootstrap CSS u otro CSS necesario -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery (para facilitar el scroll) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <title>Formulario de Registro</title>
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
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
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
                <a href="login.php" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Regresar</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Registro </h4>
            <h1 class="display-4 m-0">Ingresa tus  <span class="text-primary">Datos</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post"  onsubmit="return validarFormulario()">
    <div class="control-group">
        <input type="text" class="form-control p-4" name="CliNombre" id="CliNombre" placeholder="Nombre" required>
        <p class="help-block text-danger"></p>
    </div>
    <div class="control-group">
        <input type="email" class="form-control p-4" name="CliCorreo" id="CliCorreo" placeholder="Correo" required>
    </div>
    <div class="control-group">
        <input type="tel" class="form-control p-4" name="CliTelefono" id="CliTelefono" placeholder="Telefono" required>
    </div>
    <div class="control-group">
        <input type="text" class="form-control p-4" name="CliDireccion" id="CliDireccion" placeholder="Direccion" required>
    </div>
    <div class="control-group">
        <label>Contraseña</label>
        <input type="password" class="form-control p-4" name="CliContrasena" id="CliContrasena" placeholder="" required>
    </div>
    <div class="control-group">
        <label>Confirme su Contraseña</label>
        <input type="password" class="form-control p-4" name="CliContrasena2" id="CliContrasena2" placeholder="" required>
        <p class="help-block text-danger" id="error-password-match" style="display: none;">Las contraseñas no coinciden.</p>
    </div>
    <div>
        <button name="submit" type="submit" id="submit" class="btn btn-primary py-3 px-5">Registrar</button>
    </div>
</form>

<script>
    function validarFormulario() {
        var password = document.getElementById("CliContrasena").value;
        var confirmPassword = document.getElementById("CliContrasena2").value;

        if (password != confirmPassword) {
            document.getElementById("error-password-match").style.display = "block";
            return false;
        } else {
            document.getElementById("error-password-match").style.display = "none";
            return true;
        }
    }
</script>
<?php
                // Procesamiento del formulario cuando se envía
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                    // Escapar variables para evitar inyección SQL
                    $nombre = mysqli_real_escape_string($conn, $_POST['CliNombre']);
                    $correo = mysqli_real_escape_string($conn, $_POST['CliCorreo']);
                    $telefono = mysqli_real_escape_string($conn, $_POST['CliTelefono']);
                    $direccion = mysqli_real_escape_string($conn, $_POST['CliDireccion']);
                    $contrasena = mysqli_real_escape_string($conn, $_POST['CliContrasena']);

                    // Verificar si el correo electrónico ya está registrado
                    $sql_verificar = "SELECT * FROM usuarios WHERE correo = '$correo'";
                    $result_verificar = $conn->query($sql_verificar);

                    if ($result_verificar->num_rows > 0) {
                        echo '<div id="Correo" class="alert alert-danger mt-3">Error: El correo electrónico ya está registrado.</div>';
                    } else {
                        // Insertar datos en la base de datos
                        $sql_insertar = "INSERT INTO usuarios (nombre, correo, telefono, direccion, contrasena)
                                        VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$contrasena')";

                        if ($conn->query($sql_insertar) === TRUE) {
                            echo '<div id="registro-exitoso" class="alert alert-success mt-3">Registro exitoso. ¡Gracias por registrarte!</div>';
                            // Redireccionar a index.html después de 3 segundos
                            echo '<script>
                                    $(document).ready(function() {
                                        // Hacer scroll hacia el mensaje de registro exitoso
                                        $("html, body").animate({
                                            scrollTop: $("#registro-exitoso").offset().top
                                        }, 1000); // Velocidad del scroll en milisegundos (ej. 1000 = 1 segundo)
                                    });
                                  </script>';
                            echo '<script>window.setTimeout(function() {
                                window.location.href = "index.html";
                            }, 3000);</script>';
                        } else {
                            echo '<div class="alert alert-danger mt-3">Error al registrar: ' . $conn->error . '</div>';
                        }
                    }

                    // Cerrar conexión
                    $conn->close();
                }
                ?>


                </div>
            </div>
            
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Lover</h1>
                <p class="m-0"></p>
            </div>
            <div class="col-lg-8 col-md-12">
                
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
           
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>