<!DOCTYPE html>
<html>
<?php
$hostName = "localhost";
$userName = "root";
$password = "#Admin123";
$databaseName = "tutor_seguro";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php 
    $query ="SELECT nombre FROM `apoderado`;";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<form method="post" action="" name="form">  
<select name="Apoderados">
   <option>Apoderado</option>
  <?php 
  foreach ($options as $option) {
  ?>
    <option value = $option['idApoderado']><?php echo $option['nombre']; ?> </option>
    <?php 
    }
   ?>
</select>
 <input name="submit" type="submit">
 
 <?php

if (isset($_POST['Apoderados']))
{
	$query2 ="SELECT telefono FROM `apoderado` where idApoderado =.'"$_POST['Apoderados']"'.;";
    $result2 = $conn->query($query2);
	
    
    echo "$result2";
}
?>
 
 
</form>
</body>
</html>
