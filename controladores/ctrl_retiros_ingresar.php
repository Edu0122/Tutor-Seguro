<?php
include('../funciones/setup.php');	
$sql = "INSERT INTO `registro_retiro` 
(`idRegistroRetiro`, 
`fechaRetiro`, 
`tipoRetiro`,
`Alumno_idAlumno`,
`Apoderado_idApoderado`) 
VALUES (
NULL, 
now(),
'Reconocimiento Facial',
'".$_POST['idAlumno']."', 
'".$_POST['idApoderado']."')";
 


echo "<br>";
echo $sql;
echo "<br>";
echo "error no se pueden registrar porque el tutor legal y/o suplente ya han sido seleccionados <br>";
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>