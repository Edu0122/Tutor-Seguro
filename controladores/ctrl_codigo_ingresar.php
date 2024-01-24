<?php
include('../funciones/setup.php');


$sql="select * from smsenviados where codigo='".$_POST['clave']."'";
$result=mysqli_query(conectar(),$sql);
$num=mysqli_num_rows($result);
$datos=mysqli_fetch_array($result);



if($num!=0)
{

    $sql2 = "INSERT INTO `registro_retiro` 
    (`idRegistroRetiro`, 
    `fechaRetiro`, 
    `tipoRetiro`,
    `Alumno_idAlumno`,
    `Apoderado_idApoderado`) 
    VALUES (
    NULL, 
    now(),
    'SMS',
    '".$_POST['idAlumno']."', 
    '".$_POST['idApoderado']."')";
     

    mysqli_query(conectar(),$sql2);

    $sql3 = "UPDATE `smsenviados` SET `codigo` = null WHERE `smsenviados`.`idSmsEnviados` ='".$datos['idSmsEnviados']."'";
    mysqli_query(conectar(),$sql3);


}else{
	header('Location:../test.php?error');
}


	
?>