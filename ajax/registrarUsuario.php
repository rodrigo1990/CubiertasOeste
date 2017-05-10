<?php 
session_start();
require_once("../clases/Producto.php");
require_once("../clases/BaseDatos.php");
require_once("../clases/Validator.php");
$total=$_POST['total'];
$destinatario = $_POST["email"];
		$data=serialize($_SESSION['carrito']);

		$carritoObtenido=unserialize($data);

$BaseDatos=new BaseDatos();

$validator=new Validator();

$estado_insercion=$BaseDatos->buscarUsuarioEInsertarloEnTabla($_POST['dni'],$_POST['tipo_dni'],ucwords(strtolower($_POST['nombre'])),ucwords(strtolower($_POST['apellido'])),$_POST['calle'],$_POST['altura'],$_POST['cod_area'],$_POST['telefono'],$_POST['email'],$_POST['cp'],$_POST['ciudad'],$_POST['provincia'],$_POST['piso'],$_POST['departamento']);

	
	//Si la validacion del lado del servidor es erronea envia un 1 
	//if ($estado_insercion!=1){

	$BaseDatos->insertarVenta(0,$_POST['referencia'],$_POST['email'],date("d-m-y"),0);
	echo $estado_insercion;

	/*}else{
		//se redirige a la home
		echo $estado_insercion;

	}*/


 ?>