<?php
include('../funciones/setup.php');
	



//$sql = "INSERT INTO usuario (nombre,rut,tipo_usuario,clave) VALUES ('".$_POST['nombre']."','".$_POST['rut']."','".$_POST['tipo_usuario']."','".$_POST['clave']."')";
$nombre=$_POST["nombre"];
$rbd=$_POST["rbd"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$director=$_POST["director"];
$estado=$_POST["estado"];
$idEstablecimiento=$_POST["idEstablecimiento"];



$sql = "UPDATE establecimiento SET nombre = '$nombre', rbd = '$rbd', direccion = '$direccion', estado = '$estado', telefono = '$telefono', director = '$director' where idEstablecimiento=".$idEstablecimiento;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>