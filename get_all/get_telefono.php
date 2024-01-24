<?php
include('../funciones/setup.php');

$sql = "SELECT * FROM apoderado where idApoderado= '".$_POST['idApoderado']."'";
$result = mysqli_query(conectar(), $sql);


    // output data of each row
while($row = mysqli_fetch_assoc($result)) {


	$data['value']=$row['idApoderado'];
	$data['label']=$row['telefono'];
	$json[]=$data;      
}
echo json_encode($json);


mysqli_close(conectar());
?> 