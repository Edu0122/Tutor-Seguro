<?php
include('../funciones/setup.php');

$sql = "SELECT * FROM curso";
$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(
        'idCurso' => $datos['idCurso'],
        'nombre' => $datos['nombre'],
    ));
}
header('Content-type: application/json');
echo json_encode($jsondata)
?>