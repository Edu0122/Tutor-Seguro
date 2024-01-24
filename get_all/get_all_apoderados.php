<?php
include('../funciones/setup.php');

$sql = "SELECT apoderado.*,
establecimiento.nombre AS nombre_establecimiento
FROM apoderado
INNER JOIN
 establecimiento ON establecimiento.idEstablecimiento = apoderado.Establecimiento_idEstablecimiento";
$data = mysqli_query(conectar(), $sql);
$jsondata = array();
while($datos=mysqli_fetch_array($data)) {
    array_push($jsondata, array(

        'idApoderado' => $datos['idApoderado'],
        'nombre' => $datos['nombre'],
        'nombre_establecimiento' => $datos['nombre_establecimiento'],
        'telefono' => $datos['telefono'],
        'rut' => $datos['rut'],
        'direccion' => $datos['direccion'],
        'imagenFacial' => $datos['imagenFacial'],
        'tipo_apoderado' => $datos['tipo_apoderado'],
    
        
    ));
}
header('Content-type: application/json');
echo json_encode($jsondata)
?>