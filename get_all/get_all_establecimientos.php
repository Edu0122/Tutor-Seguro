<?php
include('../funciones/setup.php');

$sql = "SELECT * FROM establecimiento";
$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(
        'nombre' => $datos['nombre'],
        'rbd' => $datos['rbd'],
        'idEstablecimiento' => $datos['idEstablecimiento'],
        'direccion' => $datos['direccion'],
        'estado' => $datos['estado'],
        'telefono' => $datos['telefono'],
        'director' => $datos['director'],
    ));
}
header('Content-type: application/json');
echo json_encode($jsondata)
?>