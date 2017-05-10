<?php 
session_start();
require_once("clases/Producto.php");
require_once("clases/BaseDatos.php");
require_once("clases/Mail.php");

if(isset($_GET['collection_id'])){
$BaseDatos=new BaseDatos();

$BaseDatos->actualizarIdMpEnVenta($_GET['collection_id'],$_SESSION['referencia'],1);

//El metodo utiliza todos los datos de la sesion, y de las variables x GET
$mail = new Mail();
$mail->enviarComprobante();

session_destroy(); 
}else{
	header("location: index.php");
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<h1>Te hemos enviado un email con los detalles de la compra</h1>

 	<h3><a href="index.php">Sigue comprando y enterandote de nuestras ofertas</a></h3>
 </body>
 </html>