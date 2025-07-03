<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "pet";
	
    $con=mysqli_connect($servername,$username,$password,$database);
    if(!$con)
    {
        die(" Connection Error ");
    }
?>