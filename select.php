<?php
$mysql = new mysqli ("localhost", "root","", "pet");
if ($mysql->connect_error)
die("Problemas con la conexión a la base de datos");
if(empty($_POST['CliCodigo']))
{

    echo 'Esta vacio';
}
else    
{

    $CliCodigo = $_POST['CliNombre'];
}
$registro = $mysql->query("select * from clientes where Cliente_ID= " ($CliCodigo)) or
die($mysql->error) ;
if ($reg = Sregistro->fetch_array())
{
$strID = $regl['CliCodigo'];
$strNombre = $regL['CliNombre'];
$strCorreo = $reg['CliCorreo'];
$strTelefono = $reg['CliTelefono'];
$strDireccion = $reg['CliDireccion'];
}
else
echo 'No existe el ID seleccionado';
$mysql->close();
?>