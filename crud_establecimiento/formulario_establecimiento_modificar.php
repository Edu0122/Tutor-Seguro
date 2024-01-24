<!DOCTYPE html>
<html lang="en">
<head>
<title>Modificar Establecimiento</title>
<meta charset="UTF-8">
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
<?php
include("../funciones/setup.php");
$idEstablecimiento=$_GET['idEstablecimiento'];
$sql="SELECT * FROM establecimiento where idEstablecimiento='".$idEstablecimiento."'";

$result=mysqli_query(conectar(),$sql);// EJECUTAMOS LA QUERY

while($user=mysqli_fetch_array($result))
{
?>

</head>
<body>
<form method="POST" action="../controladores/ctrl_establecimientos_modificar.php" >
<h1>Modificar Establecimiento</h1>
<center>
<img src="../img/Logo_TutorSeguro.PNG" width="150px" height="120px">
</center>
<div class="inset">
<input type="text" style="display: none;" name="idEstablecimiento" value="<?php echo $_GET['idEstablecimiento'] ?>">
<p>
<center> <label for="text">Nombre</label> </center>
<input  type="text" placeholder="Ingresa el nombre del establecimiento" name="nombre" id="nombre" value="<?php echo $user['nombre'] ?>" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center><label for="text">RBD</label> </center>
<input  type="text" placeholder="Ingresa el RBD del establecimiento" name="rbd" id="rbd" value="<?php echo $user['rbd'] ?>" required>
</p>
<p>
<center> <label for="text">Dirección</label> </center>
<input type="text" placeholder="Ingresa la dirección del establecimiento" name="direccion"  id="direccion"  value="<?php echo $user['direccion'] ?>"required>
</p>
<p>
<center> <label for="text">Telefono</label> </center>
<input type="text" placeholder="Ingresa el teléfono del establecimiento" name="telefono"  id="telefono"  value="<?php echo $user['telefono'] ?>" onkeypress="return soloNumeros(event)"  maxlength="8" minlength="8" required>
</p>
<p>
<center> <label for="text">Director</label> </center>
<input type="text" placeholder="Ingresa al director del establecimiento" name="director"  id="director"  value="<?php echo $user['director'] ?>" onkeypress="return soloLetras(event)" required>
</p>

<p>
<center>  <label for="text">Estado</label> </center>
<div class="select">
<select  name="estado" id="estado">
<?php if($user['estado'] == 'Activo'){?>
<option selected>Activo</option>
<option>Inactivo</option>
<?php } ?>

<?php if($user['estado'] == 'Inactivo'){?>
<option>Activo</option>
<option selected>Inactivo</option>
<?php } ?>
</select>
<br> <br>
</div>
</p>

<center>
<input type="submit" name="go" id="go" value="Modificar Establecimiento"> <br> <br>
<a href="../Dashboard_Admin.php"><button   type="button" class="btn-white" style="height:30px;width:150px">  Volver </button> </a> 
<br> <br>
</center>
</form>
<?php } ?>
</body>
</html>

<script src='../js/validaciones_crud/solo_letras.js'></script>
<script src='../js/validaciones_crud/solo_numeros.js'></script>