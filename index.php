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

	<script>
	$(document).ready(function() {

	$(".buscador-filtros-select").change(function(){
		window.location.href = "buscador-filtros.php";
		});//$(".buscador-filtros-select").change(function(){
});
	</script>

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
				
				

				
				<div class="element-menu-carrito" id="mostrar-total-menu">
					<h6><i><strong>Mi Carrito</strong></i></h6>
					<p id="total">$<?php $usuario->mostrarTotal();?></p>

				</div><!-- mostrar-total-menu -->

				<div id="btn-carrito" class="element-menu-carrito">
					 
					<div   class="icon-shopping-cart"><span id="cantidad"> <strong id="cantidad-strong"><?php $usuario->mostrarCantidad();?></strong></span> </div>
				</div>
			

				
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
<div class="container">
<div id="carrito" class="animated slideInDown carrito">

	<i id="carrito-close" class="material-icons"  onClick="cerrarVentanaCarrito();">close</i>
	<ul id="carrito-lista">
		<?php 

		$bd=new BaseDatos();
		$usuario->mostrarCarrito();

		?>
	</ul>
</div>
</div>
<!-- TITULO OFERTAS DESTACAS -->
<div class="row titulo-home-row">
	<div class="container">
		<div class="titulo-home col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="titulo-cont">
				<hr class="linea-titulo">
				<h3>Ofertas Destacadas</h3>
			</div>
		</div>
	</div>
</div>




<!-- LISTA DE PRODUCTOS -->
<div class="container">
	<?php
	$bd->listarProductos();
  ?>

</div>




<!-- SEPARADOR -->
<div class="separador-row row">
	<div class="separador col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">>
			<h2 class="element-separador">Importador<br>Oficial:</h2>
			<img src="elementos_separados/hankook.png" class="element-separador separador-img"alt="">
		</div
	</div><!-- col-xs-12 col-sm-12 col-md-12 col-lg-12 -->
</div><!-- row -->



<!-- TITULO BUSCADOR -->
<div class="row titulo-home-row">
	<div class="container">
		<div class="titulo-home col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="titulo-cont">
				<hr class="linea-titulo">
				<h3>Buscar</h3>
			</div>
		</div>
	</div>
</div>



<!-- BUSCADORR -->
<div class="row">
	<div class="buscador-filtros-index hidden-xs col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			<form id="buscador-filtros-form" name="buscador-filtros-form" action="buscador-filtros.php" method="post">
			
				<div class="buscador-filtros-tituloInput">
					<h5> Tipo de vehiculo</h5>
					<select type="text" id="tipo-de-vehiculo" class="buscador-filtros-select form-control" name="tipo-de-vehiculo" fomr="buscador-filtros-form">
						<option value="valor_nulo" selected="selected">Vehiculo</option>
						<?php $bd->listarTipoVehiculo(); ?>
					</select>
				</div>
				
				<div class="buscador-filtros-tituloInput">
					<h5> Rodado</h5>
					<select type="text" id="rodado" class="buscador-filtros-select form-control" name="rodado" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Rodado</option>
						<?php $bd->listarRodado(); ?>
					
					</select>
				</div>

				<div class="buscador-filtros-tituloInput">

					<h5> Marca</h5>
					<select type="text" id="marca" class="buscador-filtros-select form-control" name="marca" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Marca</option>
						<?php $bd->listarMarca(); ?>

					</select>
				</div>

				<div class="buscador-filtros-tituloInput">

					<h5> Categoria</h5>
					<select type="text" id="categoria" class="buscador-filtros-select form-control" name="categoria" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Categoria</option>
						<?php $bd->listarCategoria(); ?>

					</select>
				</div>

				<div class="buscador-filtros-tituloInput">

				<h5>Ancho</h5>
					<select type="text" id="ancho" class="buscador-filtros-select form-control" name="ancho" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Ancho</option>
						<option value="5.0">5.0</option>
						<option value="7.5">7.5</option>
						<option value="27">27</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="35">35</option>
						<option value="135">135</option>
						<option value="145">145</option>
						<option value="155">155</option>
						<option value="165">165</option>
						<option value="175">175</option>
						<option value="185">185</option>
						<option value="195">195</option>
						<option value="205">205</option>
						<option value="215">215</option>
						<option value="225">225</option>
						<option value="235">235</option>
						<option value="245">245</option>
						<option value="255">255</option>
						<option value="265">265</option>
						<option value="275">275</option>
						<option value="285">285</option>
						<option value="295">295</option>
						<option value="305">305</option>
						<option value="315">315</option>
						<option value="325">325</option>
					</select>
				</div>


				<div class="buscador-filtros-tituloInput">

				<h5>Alto</h5>
					<select type="text" id="alto" class="buscador-filtros-select form-control" name="alto" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Alto</option>
						<option value="8.5">8.5</option>
						<option value="9.5">9.5</option>
						<option value="10.5">10.5</option>
						<option value="11.5">11.5</option>
						<option value="12.5">12.5</option>
						<option value="25">25</option>
						<option value="30">30</option>
						<option value="35">35</option>
						<option value="40">40</option>
						<option value="45">45</option>
						<option value="50">50</option>
						<option value="55">55</option>
						<option value="60">60</option>
						<option value="65">65</option>
						<option value="70">70</option>
						<option value="75">75</option>
						<option value="80">80</option>
						<option value="85">85</option>
					</select>
				</div>


				<div class="buscador-filtros-tituloInput">

				<h5>Ordenar</h5>
					<select type="text" id="ordenar" class="buscador-filtros-select form-control" name="ordenar" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Ordenar precios</option>
						<option value="ascendente">De menor a mayor</option>
						<option value="descendente">De mayor a menor</option>

					</select>
				</div>

			<div id="buscar-btn-buscador-filtros" type ="submit"class="buscador-filtros-btn" onClick="document.forms['buscador-filtros-form'].submit();">
				<i id="buscador-filtros-search" class="material-icons">search</i>
			</div>
			</form>
		</div><!-- container -->
	</div><!-- buscador-filtros -->
</div><!-- row -->

<!-- MAS PRODUCTOS -->
<div class="container">
	<?php
	$bd->listarProductosHankook();
  ?>

</div>


<!-- FOOTER -->
<div class="row row-footer-fila-1">
	<div class="footer-fila-1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			<h4>Medios de Pago</h4>
			<ul>
				<li><img src="elementos_separados/mercadopago-icon.png" alt="" ></li>
				<li><img src="elementos_separados/visa-icon.png" alt="" ></li>
				<li><img src="elementos_separados/master-icon.png" alt="" ></li>
				<li><img src="elementos_separados/cabal-icon.png" alt="" ></li>
				<li><img src="elementos_separados/american-icon.png" alt="" ></li>
				<li><img src="elementos_separados/diners-icon.png" alt="" ></li>
				<li><img src="elementos_separados/shoping-icon.png" alt="" ></li>
				<li><img src="elementos_separados/naranja-icon.png" alt="" ></li>
			</ul>
		</div>
	</div>
</div>
<div class="row-footer-logo">
	<div class="container">
		<div class="footer-logo col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<img id="footer-logo" src="elementos_separados/logo.png" alt="" width="24%" class="img-responsive">
		</div>
	</div>
</div>
<div class="row row-footer-fila-2">
	<div class="container">
		<div class="footer-fila-2 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<ul>
					<li>(54) (011) 4627-8900</li>
					<li>Acceso Oeste 1924 - Ituzaingo - Zona Oeste - GBA.</li>
					<li>Lunes a viernes 8:30 a 19:00 hs. Sáb. de 8:30 a 14:00hs.</li>
					<li>ventas@oesteneumaticos.com.ar</li>
				</ul>
			</div><!--  col 4 -->
		<div class="footer-fila-2-col-2 col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<ul>
					<li><h4>Informacion</h4></li>
					<li>Terminos y condiciones</li>
					<li>Devoluciones y reembolsos</li>
					<li>Quienes somos</li>
					<li>Contacto</li>
					<li>Envio</li>
				</ul>
					<ul id="utilidades">
					<li><h4>Utilidades</h4></li>
					<li>Mis pedidos</li>
					<li>Como comprar</li>
					<li>Sucursales</li>

				</ul>
			</div><!--  col 4 -->

			<div class="footer-fila-2-col-3 col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div id="footer-fila-2-col-3-cont">
				<h4>¡Compra 100 % segura !</h4>
				<img src="elementos_separados/afip-icon.jpg" width="15%" alt="">	
			</div>
			</div><!--  col 4 -->

	</div>
</div>


<!-- <div id="respuesta"></div>
<h3>Mis Pedidos</h3>
	<p>Su email</p>
	<input type="text" name="email" id="email" placeholder="ej@NeumaticosOeste.com">
	<p>Contreseña</p>
	<input type="password" name="contrasenia" id="contrasenia">
	<a href="recuperar-contrasenia.php">Recuperar contraseña</a><br>
	<p class="form-alert" id="validarUsuario-form-alert">Usuario y/o contraseña incorrectos</p>
	<button onClick="validarUsuario()">Ingresar</button> --> 


</body>
</html>
