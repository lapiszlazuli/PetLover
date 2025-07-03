<?php
    require_once("connection.php");
   // if(isset($_POST['Post']))
   // {
        if(empty($_POST['CliNombre']) || empty($_POST['CliCorreo']) || empty($_POST['CliTelefono']) || empty($_POST['CliDireccion']))
        {
            echo ' Favor de llenar los campos en Blanco ';
        }
        else
        {
			$UserID= $_POST['IdCliente'];
            $UserName = $_POST['CliNombre'];
            $UserEmail = $_POST['CliCorreo'];
            $UserTel = $_POST['CliTelefono'];
            $UserDirec = $_POST['CliDireccion'];

            $query = " update clientes set CliNombre = '$UserName', CliCorreo= '$UserEmail',CliTelefono= '$UserTel',CliDireccion='$UserDirec' where Cliente_ID = '$UserID'";
            $result = mysqli_query($con,$query);

            if($result)
            {

				header("location:contact2.html");

            }
            else
            {
                echo ' Por favor ve la Consulta ';
            }
        }
   // }
   // else
  //  {
//echo 'no srivio';    }
