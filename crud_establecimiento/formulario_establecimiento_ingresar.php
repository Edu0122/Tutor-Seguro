<?php
session_start();

if(isset($_SESSION['user']))
{
    include('../funciones/setup.php');


    if(isset($_GET['idusu']))
    {
        $sqlusu="select * from usuario where id_usuario=".$_GET['idusu'];
        $resultusu=mysqli_query(conectar(),$sqlusu);
        $datosusu=mysqli_fetch_array($resultusu);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingresar Establecimiento</title>
	<meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/train.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/Formularios/login.css">
<!--===============================================================================================-->
<link rel="icon" href="../img/favicon_tutorseguro.ico" type="image/x-icon" />
</head>
<body>
<form method="POST" action="../controladores/ctrl_establecimientos_ingresar.php" >
<h1>Ingresar Establecimiento</h1>
<center><img src="../img/Logo_TutorSeguro.PNG" width="150px" height="120px"></center>
<div class="inset">
<p>
<center> <label for="text">Nombre</label> </center>
<input  type="text" placeholder="Ingresa el nombre del establecimiento" name="nombre" id="nombre" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center> <label for="text">RBD</label> </center>
<input  type="text" placeholder="Ingresa el RBD del establecimiento" name="rbd" id="rbd" required>
</p>
<p>
<center> <label for="text">Dirección</label> </center>
<input type="text" placeholder="Ingresa la dirección del colegio" name="direccion" id="direccion" required>
</p>
<p>
<center> <label for="text">Director</label> </center>
<input type="text" placeholder="Ingresa al director del colegio" name="director" id="director" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center> <label for="text">Teléfono (51)</label> </center>
<input type="text" placeholder="Ingresa el teléfono del colegio" name="telefono" id="telefono" onkeypress="return soloNumeros(event)" maxlength="7" minlength="7"   required>
</p>
<p>
<center>  <label for="text">Estado</label> </center>
<div class="select">
<select  name="estado" id="estado" required>
<option  value="">Seleccionar</option>
 <option>Activo</option>
 <option>Inactivo</option>
 </select>
</div>
</p> <br>
<center>
<input type="submit" name="go" id="go" value="Ingresar Establecimiento"> <br><br>
<a href="../Dashboard_Admin.php"><button   type="button" class="btn-white" style="height:30px;width:150px">  Volver </button> </a> 
<br> <br>	
</center>
</form>
</body>
</html>
<script src='../js/validaciones_crud/solo_letras.js'></script>
<script src='../js/validaciones_crud/solo_numeros.js'></script>

<?php
}else{
    header('Location:../acceso_denegado.php');
}
?>