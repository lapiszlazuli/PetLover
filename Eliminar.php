<?php
session_start(); // Inicia la sesión
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Mostrar un mensaje de confirmación utilizando JavaScript
    echo '<script language="javascript">';
    echo 'if(confirm("¿Estás seguro de que deseas cerrar sesión?")) {';
    echo 'window.location.href = "index.html";'; // Redirigir a logout.php si confirma
    echo '}';
    echo '</script>';
}
?>
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
<?php
    //$mysql = new mysqli ("utn3dos.mx", "utn79dos67","HGb4d@Q3!pE37v", "utn79dos67_pet") ;
    $mysql = new mysqli ("localhost", "root","", "pet") ;
    if ($mysql->connect_error)
         die("Problemas con la conexión a la base de datos");

    $registro = $mysql->query("select * from clientes where Cliente_ID='$_REQUEST[IdCliente]'") or
    die ($mysql->error) ;

    if ($reg = $registro->fetch_array())
    {
        $strID = $reg['Cliente_ID'];
        $strName = $reg['CliNombre'];
        $strCorreo = $reg['CliCorreo'];
        $strTelefono = $reg['CliTelefono'];
        $strDireccion = $reg['CliDireccion'];

    }
    else
    {

        echo 'No existe el ID seleccionado' ;
        header("location:Eliminars.html");
    }
    $mysql->close() ;
?>	
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                <a class="text-white pr-3" >admin</a>
                    <a class="text-white pr-3" href="">FAQs</a>
                    <span class="text-white">|</span>
                    <a class="text-white px-3" href="">Help</a>
                    <span class="text-white">|</span>
                    <a class="text-white pl-3" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Inicio</a>
                    <a href="Acercade.php" class="nav-item nav-link">Conocenos</a>
                    <a href="Servicios.php" class="nav-item nav-link">Servicios</a>
                    <a href="Inscribirse.php" class="nav-item nav-link">Inscripciones</a>
                    <a href="contact2.html" class="nav-item nav-link ">Edita Registros </a>
                    <a href="Eliminars.html" class="nav-item nav-link active">Elimina registros</a>
                    
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3">Clientes :)</h4>
            <h1 class="display-4 m-0">Escribe  <span class="text-primary">Un ID</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form  method= "Post" action="Delete.php" ><!--name="sentMessage"id="contactForm" novalidate="novalidate"-->
                        <div class="control-group">
                            <input value="<?php echo $reg['Cliente_ID'];?>" type="text" class="form-control p-4" name="IdCliente" id="IdCliente" placeholder="Codigo ID"  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input value="<?php echo $reg['CliNombre'];?>" type="text" class="form-control p-4" name="CliNombre" id="CliNombre" placeholder="Nombre"  />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input value="<?php echo $reg['CliCorreo'];?>" type="text" class="form-control p-4" name="CliCorreo" id="CliCorreo" placeholder="Correo" ></p>
                        </div>
                        <div class="control-group">
                            <input value="<?php echo $reg['CliTelefono'];?>" type="text" class="form-control p-4" name="CliTelefono" id="CliTelefono" placeholder="Telefono" ></p>
                        </div>
                        <div class="control-group">
                            <input value="<?php echo $reg['CliDireccion'];?>" type="text" class="form-control p-4" name="CliDireccion" id="CliDireccion" placeholder="Direccion" ></p>
                        </div>
                        <div>
                            <button  name="submit" type="submit" id="submit"class="btn btn-primary py-3 px-5">Eliminar Registro</button>
                        </div>
                    </form>
<!--                     <form  method= "Post" action="Update.php" >
                        
                        <button  name="Actualizars" type="submit" id="Actualizar"class="btn btn-primary py-3 px-5">ACTUALIZAR</button>
                    </div>
                    </form> -->
                </div>
            </div>
            <div class="col-12 mb-n2 p-0">
                <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Conocenos</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicios</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Nuestro equipo</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contactanos :)</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
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