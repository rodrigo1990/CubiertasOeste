<?php
require_once("clases/Producto.php");
require_once("clases/Usuario.php");
session_start();

$usuario=new Usuario();

$usuario->cargarCarrito();

?>