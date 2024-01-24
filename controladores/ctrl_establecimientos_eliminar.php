<?php
include('../funciones/setup.php');
	
$idEstablecimiento=$_GET["idEstablecimiento"];



$sql = "DELETE from establecimiento where idEstablecimiento=".$idEstablecimiento;
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');


?>