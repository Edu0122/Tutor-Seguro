<?php
include('../funciones/setup.php');	

$sql = "INSERT INTO contactanos (nombreContacto,telefonoContacto,correoContacto,mensaje) VALUES ('".$_POST['nombreContacto']."','".$_POST['telefonoContacto']."','".$_POST['correoContacto']."','".$_POST['mensaje']."')";
echo $sql;
	mysqli_query(conectar(),$sql);
	header('Location:../index.php');
?>