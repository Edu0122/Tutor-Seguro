<?php
include('../funciones/setup.php');	

$sql = "INSERT INTO establecimiento (nombre,direccion,estado,rbd,telefono,director) VALUES ('".$_POST['nombre']."','".$_POST['direccion']."','".$_POST['estado']."','".$_POST['rbd']."','".$_POST['telefono']."','".$_POST['director']."')";
echo $sql;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>