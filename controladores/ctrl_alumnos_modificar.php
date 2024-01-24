<?php

	
include('../funciones/setup.php');


//$sql = "INSERT INTO usuario (nombre,rut,tipo_usuario,clave) VALUES ('".$_POST['nombre']."','".$_POST['rut']."','".$_POST['tipo_usuario']."','".$_POST['clave']."')";
$nombre=$_POST["nombre"];
$letraCurso=$_POST["letraCurso"];
$cursos=$_POST["cursos"];
$rut=$_POST["rut"];
$idAlumno=$_POST["idAlumno"];
$establecimientos=$_POST["establecimientos"];
$tutor=$_POST["tutor"];

	
	$sql = "UPDATE alumno SET nombre = '$nombre', rut = '$rut', letraCurso = '$letraCurso', Curso_idCurso = '$cursos', Establecimiento_idEstablecimiento = '$establecimientos',Apoderado_idApoderado = '$tutor' where idAlumno=".$idAlumno;
	echo $sql;
		mysqli_query(conectar(),$sql);
      header('Location:../Dashboard_Admin.php');

?>