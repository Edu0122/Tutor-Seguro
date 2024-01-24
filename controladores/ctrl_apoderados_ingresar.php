

<?php
include('../funciones/setup.php');	

$msg = ""; 

if (isset($_POST['go'])) {

    $filename = $_FILES['imagenFacial']['name'];

    $tempname = $_FILES['imagenFacial']['tmp_name'];

    $folder = "../img/rostro/".$filename;


	$sql = "INSERT INTO apoderado (nombre,telefono,rut,direccion,imagenFacial,Establecimiento_idEstablecimiento,tipo_apoderado) VALUES ('".$_POST['nombre']."','".$_POST['telefono']."','".$_POST['rut']."','".$_POST['direccion']."','".$_FILES['imagenFacial']['name']."','".$_POST['establecimientos']."','".$_POST['tipo_apoderado']."')";
	echo $sql;
		mysqli_query(conectar(),$sql);
        header('Location:../Dashboard_Admin.php');


        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";
            echo $msg;

        }else{

            $msg = "Failed to upload image";
            echo $msg;

    }

}

?>
       
       