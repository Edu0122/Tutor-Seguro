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
	<title>Ingresar Tutor</title>
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
<form method="POST" action="../controladores/ctrl_apoderados_ingresar.php" enctype="multipart/form-data" >
<h1>Ingresar Tutor</h1>
<center>
<img src="../img/Logo_TutorSeguro.PNG" width="150px" height="120px">
</center>
<div class="inset">
<p>
<center> <label for="text">Nombre</label> </center>
<input  type="text" placeholder="Ingresa el nombre del apoderado" name="nombre" id="nombre" onkeypress="return soloLetras(event)" required>
</p>
<p>
<center><label for="text">Rut</label> </center>
<input  type="text" placeholder="Ingresa el RUT" name="rut" id="rut" oninput="checkRut(this)" required>
</p>
<p>
<center><label for="text">Teléfono</label> </center>
<input  type="text" placeholder="Ingresa el telefono" name="telefono" id="telefono" onkeypress="return soloNumeros(event)" maxlength="8" minlength="8" required>
</p>
<p>
<center><label for="text">Dirección</label> </center>
<input  type="text" placeholder="Ingresa la dirección" name="direccion" id="direccion" required>
</p>
<p>
<center>  <label for="text">Tipo de Tutor</label> </center>
<div class="select">
<select  name="tipo_apoderado" id="tipo_apoderado" required>
<option  value="">Seleccionar</option>
 <option>Legal</option>
 <option>Suplente</option>
 </select>
</div>
</p> 
<p>
<p>
<center> <label for="text">Establecimiento</label> </center>
<div class="select" id="establecimientos" name="establecimientos"></div>
</p>
</center>
<p>
<center> <label for="file">Foto</label> </center>
<input  type="file" placeholder="Ingresa la foto" name="imagenFacial" id="imagenFacial" required>
</p> <br>
<center>
<input type="submit" name="go" id="go" value="Ingresar Tutor"> <br><br>
<a href="../Dashboard_Admin.php"><button   type="button"  class="btn-white" style="height:30px;width:150px">  Volver </button> </a> 
<br> <br>	
</center>
</form>
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




<?php
}else{
    header('Location:../acceso_denegado.php');
}
?>