<?php
include('../funciones/setup.php');
	
$idAlumno=$_GET["idAlumno"];

$sql = "DELETE from alumno where idAlumno=".$idAlumno;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');


?>