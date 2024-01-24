<?php
include('../funciones/setup.php');	
$sql = "INSERT INTO alumno 
(nombre,
rut,
Curso_idCurso,
letraCurso,
Establecimiento_idEstablecimiento,
Apoderado_idApoderado)
 VALUES 
(
'".$_POST['nombre']."',
'".$_POST['rut']."',
'".$_POST['cursos']."',
'".$_POST['letraCurso']."',
'".$_POST['establecimientos']."',
'".$_POST['tutor']."'
)";

echo "<br>";
echo $sql;
echo "<br>";
echo "error no se pueden registrar porque el tutor legal y/o suplente ya han sido seleccionados <br>";
	mysqli_query(conectar(),$sql);
	header('Location:../Dashboard_Admin.php');
?>