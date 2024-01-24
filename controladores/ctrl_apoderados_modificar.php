<?php
//include('../funciones/setup.php');
	



//$sql = "INSERT INTO usuario (nombre,rut,tipo_usuario,clave) VALUES ('".$_POST['nombre']."','".$_POST['rut']."','".$_POST['tipo_usuario']."','".$_POST['clave']."')";
$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$rut=$_POST["rut"];
$direccion=$_POST["direccion"];
$idApoderado=$_POST["idApoderado"];
$establecimientos=$_POST["establecimientos"];
$tipo_apoderado=$_POST["tipo_apoderado"];

?>


<?php
include('../funciones/setup.php');	

$msg = ""; 

if (isset($_POST['go'])) {

    $filename = $_FILES['imagenFacial']['name'];

    $tempname = $_FILES['imagenFacial']['tmp_name'];

    $folder = "../img/rostro/".$filename;


	$sql = "UPDATE apoderado SET nombre = '$nombre', rut = '$rut', direccion = '$direccion', telefono = '$telefono', imagenFacial='".$_FILES['imagenFacial']['name']."', Establecimiento_idEstablecimiento = '$establecimientos', tipo_apoderado = '$tipo_apoderado' where idApoderado=".$idApoderado;
	echo $sql;
		mysqli_query(conectar(),$sql);
      header('Location:../Dashboard_Admin.php');
echo $sql;

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";
            echo $msg;

        }else{

            $msg = "Failed to upload image";
            echo $msg;

    }

}

?>