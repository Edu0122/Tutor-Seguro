<?php

function conectar()
{
    $con=mysqli_connect("localhost","root","#Admin123","tutor_seguro");
    return $con;
}

?>
