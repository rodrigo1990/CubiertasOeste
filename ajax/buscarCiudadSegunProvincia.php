<?php 
require_once("../clases/BaseDatos.php");

$provincia=$_POST['provincia'];

$bd=new BaseDatos();

	

	$sql="SELECT CIU.ciudad_nombre	
		  FROM ciudad CIU JOIN provincia PRO ON CIU.provincia_id=PRO.id  
		  WHERE provincia_nombre like '%$provincia%'
		  ORDER BY CIU.ciudad_nombre ASC";

$consulta=mysqli_query($bd->conexion,$sql);

while($fila=mysqli_fetch_assoc($consulta)){

	echo "<option value='".$fila['ciudad_nombre']."'>".$fila['ciudad_nombre']."</option>";
}


 ?>