<?php
include('../funciones/setup.php');	

$sql = "INSERT INTO inspector (nombre,rut,estado,Establecimiento_idEstablecimiento)
 VALUES ('".$_POST['nombre']."',
 '".$_POST['rut']."',
 '".$_POST['estado']."',
 '".$_POST['establecimientos']."')";
echo $sql;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>
       
       