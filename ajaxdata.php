<?php 
include('../funciones/setup.php');

if (isset($_POST['idAlumno'])) {
	$query = "SELECT Apoderado_idApoderado FROM alumno where idAlumno=".$_POST['idAlumno'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Apoderado</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['idApoderado'].'>'.$row['nombre'].'</option>';
		 }
	}else{

		echo '<option>No State Found!</option>';
	}

}elseif (isset($_POST['idApoderado'])) {
	 

	$query = "SELECT telefono FROM apoderado where idApoderado =".$_POST['idApoderado'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select telefono</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['idApoderado'].'>'.$row['telefono'].'</option>';
		 }
	}else{

		echo '<option>No City Found!</option>';
	}

}


?>
