<?php 
session_start();
require_once("../clases/Producto.php");
require_once("../clases/Usuario.php");


$usuario=new Usuario();

$usuario->actualizarCarrito($_GET['id'],$_GET['cantidad']);


$usuario->mostrarCarritoCheckOut();




 ?>