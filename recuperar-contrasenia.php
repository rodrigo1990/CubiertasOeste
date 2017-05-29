<?php 
require_once("clases/Producto.php");
 session_start();

require_once("clases/BaseDatos.php");
require_once("clases/Usuario.php");

$usuario=new Usuario();


?>



<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery/jquery-3.2.1.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<!-- ESTILOS PROPIOS -->
	<link rel="stylesheet" type="text/css" href="estilos_css/estilos.css">
	<!-- MATERIAL ICONS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
	<!-- MENU FIXED  -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.sticky.js"></script>
	<!-- ANIMATED.CSS -->
	<link rel="stylesheet" href="estilos_css/animate.css">

	<!-- FUNCIONES JS -->
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/carrito.js"></script>
	<script>

	function registrarToken(){

	var email=$("#email-recuperar").val();

			$.ajax({
			data:{email:email},
			url:'ajax/registrarToken.php',
			type:'post',
			success:function(response){

				alert(response);
			}
			});
	}
	</script>
</head>
<body>

		<!-- Menu -->
	<?php 
	include("include/menu-no-animated.php");
	 ?>

	 <!-- CARRITO DE COMPRAS !! -->
<div class="container">
<div id="carrito" class="animated slideInDown carrito carrito-recuperar-contrasenia">

	<i id="carrito-close" class="material-icons"  onClick="cerrarVentanaCarrito();">close</i>
	<ul id="carrito-lista">
		<?php 

		$bd=new BaseDatos();
		$usuario->mostrarCarrito();

		?>
	</ul>
</div>
</div> <!--Fin carrito de compras  -->


		<p>Su email</p>
		<input type="text" name="email-recuperar" id="email-recuperar" placeholdeer="ej:jose@neumaticosoeste.com">
		<button onClick="registrarToken();">Ingresar</button>


		<!-- Footer -->
	<?php 
	include("include/footer.php");
	 ?>
</body>
</html>