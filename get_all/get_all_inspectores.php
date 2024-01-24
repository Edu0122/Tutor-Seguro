<?php
include('../funciones/setup.php');

$sql = "SELECT inspector.*,
establecimiento.nombre AS nombre_establecimiento
FROM inspector
INNER JOIN
 establecimiento ON establecimiento.idEstablecimiento = inspector.Establecimiento_idEstablecimiento";
$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(

        'idInspector' => $datos['idInspector'],
        'nombre' => $datos['nombre'],
        'nombre_establecimiento' => $datos['nombre_establecimiento'],
        'rut' => $datos['rut'],
		'estado' => $datos['estado'],
    
        
    ));
}
header('Content-type: application/json');
echo json_encode($jsondata)
?>