<?php
include('../funciones/setup.php');

$sql = "SELECT registro_retiro.*, apoderado.nombre AS tutor,
 alumno.nombre AS nombre_alumno
  FROM registro_retiro 
  INNER JOIN alumno ON alumno.idAlumno = registro_retiro.Alumno_idAlumno
   INNER JOIN apoderado ON apoderado.idApoderado = registro_retiro.Apoderado_idApoderado;";


$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(
        'idRegistroRetiro' => $datos['idRegistroRetiro'],
        'tipoRetiro' => $datos['tipoRetiro'],
        'fechaRetiro' => $datos['fechaRetiro'],
        'tutor' => $datos['tutor'], 
        'nombre_alumno' => $datos['nombre_alumno'], 




    ));
}
header('Content-type: application/json');
echo json_encode($jsondata)
?>