<?php
include('../funciones/setup.php');
	
$idInspector=$_GET["idInspector"];

$sql = "DELETE from inspector where idInspector=".$idInspector;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');


?>