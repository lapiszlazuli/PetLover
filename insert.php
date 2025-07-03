<?php
    require_once("connection.php");
    if(isset($_POST['submit']))
    {
        if(empty($_POST['CliNombre']) || empty($_POST['CliCorreo']) || empty($_POST['CliTelefono']) || empty($_POST['CliDireccion']))
        {
            echo ' Favor de llenar los campos en Blanco ';
        }
        else
        {
            $UserName = $_POST['CliNombre'];
            $UserEmail = $_POST['CliCorreo'];
            $UserTel = $_POST['CliTelefono'];
            $UserDirec = $_POST['CliDireccion'];

            $query = " insert into clientes(CliNombre, CliCorreo,CliTelefono,CliDireccion) values('$UserName','$UserEmail','$UserTel','$UserDirec')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:contact.html");
            }
            else
            {
                echo ' Por favor ve la Consulta ';
            }
        }
    }
    else
    {
        header("location:contact.html");
    }
