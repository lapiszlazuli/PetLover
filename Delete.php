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

            $query = " delete from clientes where Cliente_ID = '$UserID'";
            $result = mysqli_query($con,$query);

            if($result)
            {
                echo 'Operacion excitosa';
				header("location:contact2.html");
                echo 'Operacion excitosa';

            }
            else
            {
                echo ' Por favor ve la Consulta ';
            }
        }