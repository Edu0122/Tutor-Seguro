<?php
include('../funciones/setup.php');

$sql = "SELECT * FROM alumno WHERE 	Apoderado_idApoderado = '".$_POST['idApoderado']."'";
$result = mysqli_query(conectar(), $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['idAlumno'];
	$data['label']=$row['nombre'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close(conectar());
?> 