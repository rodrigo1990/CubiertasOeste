<?php 
require_once("clases/BaseDatos.php");
require_once("clases/Usuario.php");
$baseDatos=new BaseDatos();
if(isset($_GET['registro'])){
	$baseDatos->insertarContrasenia($_POST['email'],md5($_POST['contrasenia']));
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="estilos_css/estilos.css">
</head>

<body>
	
<?php 
if(isset($_GET['email'])){
$usuario=new Usuario();

$usuario-> mostrarComprobantes($_GET['email']);
}else{

echo "<a href='usuario.php?email=".$_POST['email']."'><h3>Enhorabuena! ya puedes acceder a tu cuenta haciendo click aqui</h3></a>";
 }

 ?>

</body>
</html>