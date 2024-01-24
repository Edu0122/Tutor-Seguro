<!DOCTYPE html>
<html lang="en">
<head>
<title>Modificar Inspector</title>
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
$idInspector=$_GET['idInspector'];
$sql="SELECT * FROM inspector where idInspector='".$idInspector."'";

$result=mysqli_query(conectar(),$sql);// EJECUTAMOS LA QUERY

while($user=mysqli_fetch_array($result))
{
?>

</head>
<body>
<form method="POST" action="../controladores/ctrl_inspectores_modificar.php" >
<h1>Modificar Inspector</h1>
<center>
<img src="../img/Logo_TutorSeguro.PNG" width="150px" height="120px">
</center>
<div class="inset">
<input type="text" style="display: none;" name="idInspector" value="<?php echo $_GET['idInspector'] ?>">
<p>
<center> <label for="text">Nombre</label> </center>
<input  type="text" placeholder="Ingresa el nombre del inspector" name="nombre" id="nombre" value="<?php echo $user['nombre'] ?>" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center><label for="text">Rut</label> </center>
<input  type="text" placeholder="Ingresa el RUT" name="rut" id="rut" value="<?php echo $user['rut'] ?>" oninput="checkRut(this)"  required>
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
<p> <br>
<center> <label for="text">Establecimiento</label> </center>
<div class="select" id="establecimientos" name="establecimientos"></div>
</p>
</center> <br> <br>

<center>
<input type="submit" name="go" id="go" value="Modificar Inspector"> <br> <br>
<a href="../Dashboard_Admin.php"><button   type="button" class="btn-white" style="height:30px;width:150px">  Volver </button> </a> 
<br> <br>
</center>
</form>
<?php } ?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src='formulario_establecimiento.js'></script>
<script src='../js/validaciones_crud/solo_letras.js'></script>
<script src='../js/validaciones_crud/solo_numeros.js'></script>