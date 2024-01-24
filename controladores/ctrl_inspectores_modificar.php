<?php
include('../funciones/setup.php');
	



//$sql = "INSERT INTO usuario (nombre,rut,tipo_usuario,clave) VALUES ('".$_POST['nombre']."','".$_POST['rut']."','".$_POST['tipo_usuario']."','".$_POST['clave']."')";
$nombre=$_POST["nombre"];
$rut=$_POST["rut"];
$estado=$_POST["estado"];
$establecimientos=$_POST["establecimientos"];
$idInspector=$_POST["idInspector"];



$sql = "UPDATE inspector SET nombre = '$nombre', rut = '$rut', estado = '$estado', Establecimiento_idEstablecimiento = '$establecimientos'  where idInspector=".$idInspector;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>