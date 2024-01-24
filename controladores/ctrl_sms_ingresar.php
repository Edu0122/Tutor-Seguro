<?php
include('../funciones/setup.php');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$contra = generateRandomString();

echo $contra;

$sql = "INSERT INTO `smsenviados` (`idSmsEnviados`, `telefono`, `horaEnvio`, `codigo`, `RegistroRetiro_Apoderado_idApoderado`)
 VALUES (NULL,
 '".$_POST['telefono']."', 
now(),
'$contra', 
'".$_POST['idApoderado']."');";
 

mysqli_query(conectar(), $sql);

	
?>