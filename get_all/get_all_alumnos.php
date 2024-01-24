<?php
include('../funciones/setup.php');

$sql = "SELECT alumno.*,
establecimiento.nombre AS nombre_establecimiento,
apoderado.nombre AS tutor, 
curso.nombre AS nombre_curso
FROM alumno
INNER JOIN
 establecimiento ON establecimiento.idEstablecimiento = alumno.Establecimiento_idEstablecimiento
 INNER JOIN
 apoderado ON apoderado.idApoderado = alumno.Apoderado_idApoderado 
 INNER JOIN
 curso ON curso.idCurso = alumno.Curso_idCurso";


$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(
        'idAlumno' => $datos['idAlumno'],
        'nombre' => $datos['nombre'],
        'rut' => $datos['rut'],
        'letraCurso' => $datos['letraCurso'],
        'nombre_establecimiento' => $datos['nombre_establecimiento'],
        'tutor' => $datos['tutor'], 
        'nombre_curso' => $datos['nombre_curso'], 




    ));
    
}

header('Content-type: application/json');
echo json_encode($jsondata)

?>