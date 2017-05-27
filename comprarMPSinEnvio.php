<?php 
session_start();
require_once ("sdk-php-master-mp/lib/mercadopago.php");
require_once("clases/producto.php");
require_once("clases/Usuario.php");

$_SESSION['nombre']=$_POST['nombre'];
$_SESSION['apellido']=$_POST['apellido'];
$_SESSION['tipo_dni']=$_POST['tipo_dni'];
$_SESSION['dni']=$_POST['dni'];
$_SESSION['email']=$_POST['email'];
$_SESSION['cod_area']=$_POST['cod_area'];
$_SESSION['telefono']=$_POST['telefono'];

//$_SESSION['total']=$_POST['total'];
$_SESSION['referencia']=$_POST['referencia'];

$usuario = new Usuario();
$mp = new MP("1868735362955682", "qIFkrIwXyfdRZ5q7NXBNeqyse8Dn8c9L");

$preference_data = array(
    "items" => array(
        array(
            "title" => "Productos Cubiertas Oeste",
            "currency_id" => "ARG",
            "category_id" => "Category",
            "quantity" => 1,
            "unit_price" => (float)$usuario->mostrarTotal()
        )
    ),
	"payer" => array(
			"name" => $_POST['nombre'],
			"surname" => $_POST['apellido'],
			"email" => $_POST['email'],
			"date_created" => date("y-m-d"),
	"phone" => array(
			"area_code" => $_POST['cod_area'],
			"number" => $_POST['telefono']
	),
	),
	"identification" => array(
			"type" => $_POST['tipo_dni'],
			"number" => $_POST['dni']
	),
	"auto_return"=>"approved",
	"back_urls" => array(
		"success" => "/localhost/cubiertasoeste/landing.php",
		"failure" => "/localhost/cubiertasoeste/landing-error.php",
		"pending" => "/localhost/cubiertasoeste/landing.php"
	),
		"notification_url" => "/localhost/cubiertasoeste/ipn.php",
		"external_reference" => "".$_POST['referencia'].""

);

$preference = $mp->create_preference($preference_data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprar</title>
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
	<!-- <script type="text/javascript" src="js/validaciones.js"></script> -->

	<script>

		function execute_my_onreturn (json) {
		    if (json.collection_status=='approved'){
		        alert ('Pago acreditado');
		    } else if(json.collection_status=='pending'){
		        alert ('El usuario no completó el pago');
		    } else if(json.collection_status=='in_process'){    
		        alert ('El pago está siendo revisado');    
		    } else if(json.collection_status=='rejected'){
		        alert ('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
		         eliminarPagoFallido("<?php echo $_POST['referencia'] ?>");
		    } else if(json.collection_status==null){
		        alert ('No has finalizado el proceso de pago');
		        eliminarPagoFallido("<?php echo $_POST['referencia'] ?>");
		    }
		}

	</script>
</head>
<body>
	<div class="row" id="menu-fixed" >

		<div class="menu hidden-xs hidden-sm col-md-12 col-lg-12">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" onClick="window.location='index.php'" id="logo-menu" width="210">
					

				<h4 class="seguro-menu">¡Compra 100% segura!</h4>
				<i class="candado-icon-menu material-icons">https</i>

			</div><!-- container -->

		</div><!-- menu -->
			<div class="menu col-xs-12 hidden-sm hidden-md hidden-lg">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" onClick="window.location='index.php'" id="logo-menu" width="130">
					

				<h5 class="seguro-menu">¡Compra 100% segura!</h5>

			</div><!-- container -->

		</div><!-- menu -->
			<div class="menu hidden-xs col-sm-12 hidden-md hidden-lg">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" onClick="window.location='index.php'" id="logo-menu" width="180">
					

				<h4 class="seguro-menu">¡Compra 100% segura!</h4>
				<i class="candado-sm candado-icon-menu material-icons">https</i>


			</div><!-- container -->

		</div><!-- menu -->
	</div><!-- row  -->
	<!-- FIN MENU -->



















	<div class="logo-row row">
		<div class="container">
			<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<img id="logo-comprarMP" src="elementos_separados/logo.png" alt="">		
		
			</div>
		</div>
	</div>

		<div class="compra-row row">
		<div class="container">
			<div  class=" listar-cont col-xs-8 col-sm-8 col-md-8 col-lg-8">

				<ul class="lista-compraMp sinEnvio">
					<li class="titulo-lista-comprar-mp">Medio de pago</li>
					<li>Mercado Pago</li>
				</ul>

				<ul class="lista-compraMp sinEnvio">
					<li class="titulo-lista-comprar-mp">Datos personales</li>
					<li><?php echo $_POST['nombre'] ?> <?php echo $_POST['apellido'] ?></li>
					<li><?php echo $_POST['email'] ?></li>
					<li>54 <?php echo $_POST['cod_area']?> <?php echo $_POST['telefono'] ?></li>
				</ul>
			
			
			<div class="row">
				
				<div  class=" listar-cont articulos col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<ul class="lista-compraMp articulos">
					<li class="titulo-lista-comprar-mp">Articulos</li>
					<?php $usuario->listarListaDeArticulosComprados(); ?>
				</ul>
				
				</div>

			</div>


			</div><!-- lista-cont -->
			<div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div  class="boton-pago">
							<h3 class="tit-boton-pago"><i>Subtotal:<?php  $usuario->mostrarSubtotal();?>$</i></h3>
							<h3 class="tit-boton-pago"><i>Descuentos:<span style="color:rgb(255,106,0);text-decoration:underline;"><?php $usuario->mostrarDescuento();?>$</span></i></h3>
							<h3 class="tit-boton-pago"><i>Total:<?php echo $usuario->mostrarTotal();?>$</i></h3>

							<div class="boton-pago-row row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				       <a id="pago-btn" href="<?php echo $preference["response"]["init_point"]; ?>"mp-mode="modal" onreturn="execute_my_onreturn" onClick="registrarUsuarioSinEnvio('<?php echo $_POST['nombre']?>','<?php echo $_POST['apellido']?>','<?php echo $_POST['tipo_dni']?>','<?php echo $_POST['dni']?>','<?php echo $_POST['email']?>','<?php echo $_POST['cod_area']?>','<?php echo $_POST['telefono']?>','<?php echo $_POST['referencia'] ?>');"  name="MP-Checkout"class="carrito-checkout-btn">Pagar</a>
								</div>
							</div>
						</div>
					
			</div>
		</div>
	</div>
	






















<footer>
<div class="row row-footer-fila-1 row-footer-fila-1-buscador-filtros">
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
					<li>Acceso Oeste 1924 - Ituzaingo - <br> Zona Oeste - GBA.</li>
					<li>Lunes a viernes 8:30 a 19:00 hs.<br> Sáb. de 8:30 a 14:00hs.</li>
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
</footer>
<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script> 
<script type="text/javascript">
(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
</script>
</body>
</html>