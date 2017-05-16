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

		<!--Start of Zendesk Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="https://v2.zopim.com/?4eooxqQhEm2xIDd0tohkfnN1KIKglQAI";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zendesk Chat Script-->

		<title>Cubiertas Oeste</title>

</head>
<body>


	<div class="animated bounceInLeft row">

		<div class="direccion-menu hidden-xs col-sm-12 col-md-12 col-lg-12">
			<div class="container">
				<!--  --><h6 class="h6-direccion-envio-menu"><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">phone</i>TEL:4627-8900 <span id="separadorDireccionMenu">|</span><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">room</i>Acceso Oeste 1924 Ituzaingo - GBA</h6>
			</div><!-- container -->
		</div><!-- direccion-menu col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

		 <!-- <div class="direccion-menu-cel col-xs-12 hidden-sm hidden-md hidden-lg">
			<div class="container">
			<h6 class="h6-direccion-envio-menu-cel"><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">phone</i>TEL:4627-8900 <span id="separadorDireccionMenu"> | </span><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">room</i>Acceso Oeste 1924 Ituzaingo - GBA</h6>
		</div> --><!-- container -->


	</div><!-- row -->




	<div class="animated bounceInDown row" id="menu-fixed" >

		<div class="menu hidden-xs col-sm-12 col-md-12 col-lg-12">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" width="210">
				
				<img src="elementos_separados/icon-mas.png" class="element-menu vertical-align-middle  img-responsive" id="icon-mas-menu" width="15">
				
				<h4 class="h4-producto-title-menu element-menu vertical-align-middle " id="producto-title-menu">Producto</h4>

				<div class="element-menu-buscador " id="buscador-menu">
					<form action="" method=""><!-- form buscador -->

					<div class="campo-busqueda-menu inner-addon right-addon">
						<i class="material-icons md-light ">search</i>
						<input type="text" class="form-control campo-busqueda-menu" id="busqueda_cubiertas" placeholder="Busca tu producto" onKeyUp="buscarCubiertas()" size="40%">
					</div>
						<div id="resultadoBusqueda"></div><!-- resultado del buscador -->

					</form><!-- cierre: buscador form -->
				</div><!-- buscador-menu -->
				
				<div id="btn-carrito" class="element-menu-carrito">
					 
					<div   class="icon-shopping-cart"><span id="cantidad"> <strong id="cantidad-strong"><?php $usuario->mostrarCantidad();?></strong></span> </div>
				</div>


				<div class="element-menu-carrito" id="mostrar-total-menu">
					<h6><i><strong>Mi Carrito</strong></i></h6>
					<p id="total">$<?php $usuario->mostrarTotal();?></p>

				</div><!-- mostrar-total-menu -->
			

				
			</div><!-- container -->

		</div><!-- menu -->


		<!-- CELULAR !! -->
		<div class="menu col-xs-12 hidden-sm hidden-md hidden-lg">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" width="210">
				
				

				<div class="element-menu" id="buscador-menu">
					<form action="" method=""><!-- form buscador -->

					<div class="campo-busqueda-menu inner-addon right-addon">
						<i class="material-icons md-light ">search</i>
						<input type="text" class="form-control campo-busqueda-menu" id="busqueda_cubiertas" placeholder="Busca tu producto" onKeyUp="buscarCubiertas()" size="20">
					</div>
						<div id="resultadoBusqueda"></div><!-- resultado del buscador -->

					</form><!-- cierre: buscador form -->
				</div><!-- buscador-menu -->

				<div class="element-menu" id="mostrar-total-menu">
					<h6><i><strong>Mi Carrito</strong></i></h6>
					<p id="total">$<?php $usuario->mostrarTotal();?></p>

				</div><!-- mostrar-total-menu -->
			

				<div class="element-menu-carrito-cel ">
					 
					<div class="icon-shopping-cart"><span id="cantidad"> <strong id="cantidad-strong"><?php $usuario->mostrarCantidad();?></strong></span> </div>
				</div>
			</div><!-- container -->

		</div><!-- menu -->
	</div><!-- row  -->

	  	<div class="slider">
		<ul>
			<li><img src="banners/banner_1.jpg" alt="" width="100%"></li>
			<li><img src="banners/banner_2.jpg" alt="" width="100%"></li>
		</ul>
	</div>


<!-- CARRITO DE COMPRAS !! -->
<div id="carrito" class="animated slideInDown carrito">

	<i id="carrito-close" class="material-icons"  onClick="cerrarVentanaCarrito();">close</i>
	<ul id="carrito-lista">
		<?php 

		$bd=new BaseDatos();
		$usuario->mostrarCarrito();

		?>
	</ul>
</div>
<div class="container-fluid">
	<?php
	$bd->listarProductos();
  ?>

</div>
<div class="row">
	<div class="buscador-filtros-index hidden-xs col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			<form id="buscador-filtros-form" name="buscador-filtros-form" action="buscador-filtros.php" method="post">
				<div class="buscador-filtros-tituloInput-index">

					<h5 class="">Tipo de vehiculo</h6>
				
					<select type="text" id="tipo-de-vehiculo" class="buscador-filtros-select-index form-control" name="tipo-de-vehiculo" fomr="buscador-filtros-form">
						<option value="valor_nulo" selected="selected">Selecciona opcion...</option>
						<?php $bd->listarTipoVehiculo(); ?>
					</select>
				</div>

				<div class="buscador-filtros-tituloInput-index">

					<h5 class="">Rodado</h6>
					<select type="text" id="rodado" class="buscador-filtros-select-index form-control" name="rodado" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Selecciona opcion...</option>
						<?php $bd->listarRodado(); ?>
					
					</select>
				</div>

				<div class="buscador-filtros-tituloInput-index">

					<h5 class="">Marca</h6>

					<select type="text" id="marca" class="buscador-filtros-select-index form-control" name="marca" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Selecciona opcion...</option>
						<?php $bd->listarMarca(); ?>

					</select>
				</div>

				<div class="buscador-filtros-tituloInput-index">

					<h5 class="">Categoria</h6>

					<select type="text" id="categoria" class="buscador-filtros-select-index form-control" name="categoria" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Selecciona opcion...</option>
						<?php $bd->listarCategoria(); ?>

					</select>
				</div>

			<div type ="submit"class="buscador-filtros-btn" onClick="document.forms['buscador-filtros-form'].submit();">
				<i id="buscador-filtros-search" class="material-icons">search</i>
			</div>
			</form>
		</div><!-- container -->
	</div><!-- buscador-filtros -->
</div><!-- row -->



<div id="respuesta"></div>
<h3>Mis Pedidos</h3>
	<p>Su email</p>
	<input type="text" name="email" id="email" placeholder="ej@NeumaticosOeste.com">
	<p>Contreseña</p>
	<input type="password" name="contrasenia" id="contrasenia">
	<a href="recuperar-contrasenia.php">Recuperar contraseña</a><br>
	<p class="form-alert" id="validarUsuario-form-alert">Usuario y/o contraseña incorrectos</p>
	<button onClick="validarUsuario()">Ingresar</button> 


</body>
</html>
