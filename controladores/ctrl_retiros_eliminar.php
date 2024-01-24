<?php
include('../funciones/setup.php');
	
$idRegistroRetiro=$_GET["idRegistroRetiro"];



$sql = "DELETE from registro_retiro where idRegistroRetiro=".$idRegistroRetiro;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');


?>