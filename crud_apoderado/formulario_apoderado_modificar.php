<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modificar Tutor</title>
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
	$idApoderado=$_GET['idApoderado'];
	$sql="SELECT * FROM apoderado where idApoderado='".$idApoderado."'";
	
	$result=mysqli_query(conectar(),$sql);// EJECUTAMOS LA QUERY

	while($user=mysqli_fetch_array($result))
	{
?>

</head>
<body>
<form method="POST" action="../controladores/ctrl_apoderados_modificar.php" enctype="multipart/form-data" >
<h1>Modificar Tutor</h1>
<center>
<img src="../img/Logo_TutorSeguro.PNG" width="150px" height="120px">
	</center>
<div class="inset">
<input type="text" style="display: none;" name="idApoderado" value="<?php echo $_GET['idApoderado'] ?>">
<p>
 <center> <label for="text">Nombre</label> </center>
<input  type="text" placeholder="Ingresa el nombre del apoderado" name="nombre" id="nombre" value="<?php echo $user['nombre'] ?>" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center><label for="text">Rut</label> </center>
<input  type="text" placeholder="Ingresa el RUT" name="rut" id="rut" value="<?php echo $user['rut'] ?>" oninput="checkRut(this)"  required>
</p>
<p>
<center>  <label for="text">Teléfono</label> </center>
  <input  type="text" placeholder="Ingresa el telefono" name="telefono" id="telefono" maxlength="8" minlength="8" value="<?php echo $user['telefono'] ?>" onkeypress="return soloNumeros(event)"required>
</p>
<p>
<center><label for="text">Dirección</label> </center>
<input  type="text" placeholder="Ingresa la dirección" name="direccion" id="direccion" value="<?php echo $user['direccion'] ?>" required>
</p>  


<p>
<center>  <label for="text">Tipo de Tutor</label> </center>
<div class="select">
<select  name="tipo_apoderado" id="tipo_apoderado">
<?php if($user['tipo_apoderado'] == 'Legal'){?>
<option selected>Legal</option>
<option>Suplente</option>
<?php } ?>

<?php if($user['tipo_apoderado'] == 'Suplente'){?>
<option>Legal</option>
<option selected>Suplente</option>
<?php } ?>
</select>
<br> <br>
</div>
</p>


<p>
<center> <label for="text">Establecimiento</label> </center>
<div class="select" id="establecimientos" name="establecimientos">
</div>
</p>
</center>
<p>
<center>  <label for="file">Foto</label> </center>
<input  type="file" placeholder="Ingresa la foto" name="imagenFacial" id="imagenFacial"  value="<?php echo $user['imagenFacial'] ?>"  required>
</p> <br>
</center>
<center>
<input type="submit" name="go" id="go" value="Modificar Tutor"> <br> <br>
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
<script src="../js/validaciones_crud/validarRUT.js"></script>
<script src='../js/validaciones_crud/solo_letras.js'></script>
  <script src='../js/validaciones_crud/solo_numeros.js'></script>