<?php
include('../funciones/setup.php');
	
$idApoderado=$_GET["idApoderado"];

$sql = "DELETE from apoderado where idApoderado=".$idApoderado;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');


?>