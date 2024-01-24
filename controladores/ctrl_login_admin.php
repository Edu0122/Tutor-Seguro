<?php

include("../funciones/setup.php");

//echo $_POST['frmusuario']."-".$_POST['frmclave']

$sql="select * from usuario where nombreUsu='".$_POST['frmnombre']."' and clave='".$_POST['frmclave']."'";
$result=mysqli_query(conectar(),$sql);
$num=mysqli_num_rows($result);
$datos=mysqli_fetch_array($result);

if($num!=0)
{
	session_start();
	$_SESSION['user']=$datos['nombreUsu'];
	header('Location:../Dashboard_Admin.php');
}else{
	header('Location:../iniciar_sesion_administrador.php?error');
}
?>