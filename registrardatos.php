<?php

$cont=mysqli_connect('localhost','root','','tutor_seguro');

$sql="select * from usuario where rut='".$_GET['usu']."' and clave='".$_GET['pass']."' and estado = 'Activo' and tipo_usuario = 'Administrador'";

$result=mysqli_query($cont,$sql);

$num=mysqli_num_rows($result);

$val=array('estado'=>$num==null?'0':$num);

echo json_encode($val);

?>