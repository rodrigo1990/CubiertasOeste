<?php 
require_once("clases/Producto.php");
session_start();
require_once("clases/Usuario.php");
require_once("clases/BaseDatos.php");
require_once("sdk-php-master-mp/lib/mercadopago.php");

$bd=new BaseDatos();
$usuario= new Usuario();
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
	<script type="text/javascript" src="js/validaciones.js"></script>

	<script>

		
	function submitform(){
			 document.forms["myform"].submit();
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









	<!-- Carrito de compras -->
<div class="row">
	<div class="slider-checkout">
		
		<ul id="slider-checkout" class="normal">
		<li>
				<!-- TABLA CHECKOUT -->
	<div id="carrito-CheckOut">
		<?php 
		$usuario=new Usuario();

		$usuario->mostrarCarritoCheckOut();



		?>
		</div><!-- carrito-CheckOut-row -->

	<div class="btn-row row">
		<div class="container">
		
			<div id="carrito-checkout-btn-datos" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a id="carrito-checkout-btn-datos" class="carrito-checkout-btn">Carga de datos</a>
			</div>
		</div><!-- container -->
	</div>	<!--btn-row -->
</li>

<li>
<div id="checkout-form-row">
	<div class="container">
		<h1 class='titulos-checkout'>2. Carga Tus Datos </h1>
		<p class="descripcion-checkout"><i>Solicitaremos unicamente tus datos escenciales para realizar el proceso de compra de una manera  segura,<br> fiable, y con mayor calidad.</i></p>
	<form id="form-checkout" name="myform"  action='comprarMPSinEnvio.php'  method='POST' onkeypress="return anular(event)">
			<div class="form-group-margin col-xs-6 col-sm-6 col-md-6 col-lg-6">
				
				<p class="form-group-identidad-p">Nombre <span>*</span><span style="font-size:80%;">( * Dato obligatorio )</span></p>

				<input class="form-group-identidad" type='text'  id='nombre' name='nombre' value="<?php $bd->buscarNombreDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="nombre-form-alert">Ingrese un nombre valido</p>


				<p class="form-group-identidad-p">Apellido <span>*</span></p>

				<input class="form-group-identidad" type='text' id='apellido' name='apellido' value="<?php $bd->buscarApellidoDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="apellido-form-alert">Ingrese un apellido valido</p>
				
				<p class="form-group-identidad-p">Tipo dni <span>*</span></p>
		
				<select class="form-group-identidad" type='text'  id='tipo_dni' name='tipo_dni'><br>
					<?php 

					$bd->buscarTipoDocumento($_POST['email-modal']);

					 ?>
				</select>
				<p class="form-group-identidad-p">dni <span>*</span></p>

				<input class="form-group-identidad" type='text'  id='dni' name='dni' value="<?php $bd->buscarNumeroDocumentoDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="dni-form-alert">Ingrese un dni valido ej:35365531</p>


				<P class="form-group-identidad-p">Email <span>*</span></p>

				<input class="form-group-identidad" type='text'  id='email' name='email' value="<?php echo $_POST['email-modal'] ?>"><br>
				<p class="form-alert" id="email-form-alert">Ingrese un email valido ej:user@mail.com</p>


				<p class="form-group-identidad-p">Telefono <span>*</span></p>

				<input class="form-group-identidad small" type="text" id="cod_area" name="cod_area" maxlength="4" size="3" value="<?php $bd->buscarCodigoAreaDeUsuario($_POST['email-modal']);?>">

				<span>15</span><input class="form-group-identidad medium" type='text' id='telefono' name='telefono' value="<?php $bd->buscarTelefonoDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="telefono-form-alert">Ingrese un telefono valido ej:46612929</p>
				<p class="form-alert" id="cod_area-form-alert">Ingrese un codigo de area valido</p>

				<?php

				//echo "<input type='hidden' class='identificacionMp' id ='total' name='total' value='".$_GET['total']."'>";

				?>

				<?php 

					echo "<input type='hidden' class='identifcacionMp' id = 'referencia' name='referencia' value='".uniqid('')."'>";

				 ?>
				 <div class="form-checkbox">
				<label class="form-group-identidad-p" for="necesita_envio">Necesito envio <br> a domicilio</label>
				<input class="form-group-identidad-check" type="checkbox" id="necesita_envio" name="necesita_envio" value="yes">
				</div>
		</div><!-- col -->
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<!-- SECCION UBICACION !!!!!!!!!!!!!!!!!!! -->
				<p class="form-group-identidad-p">provincia <span>*</span></p>

				<select class="form-group-identidad " type='text' id='provincia' name='provincia' form='form-checkout'>
				<option value="" selected="selected">Selecciona tu provincia</option>
				<?php 

				$bd->buscarProvincias($_POST['email-modal']);

				 ?>
				</select>


				<p class="form-alert" id="provincia-form-alert">Ingrese una provincia</p>

				<p class="form-group-identidad-p">Ciudad <span>*</span></p>

				<select class="form-group-identidad " type='text' id='ciudad' name='ciudad' form='form-checkout'>
				<option value="" selected='selected'>Selecciona tu ciudad</option>
				<?php 
				$bd->buscarCiudadDeUsuario($_POST['email-modal']);
				 ?>
				</select>
				<p class="form-alert" id="ciudad-form-alert">Ingrese una ciudad</p>



				<p class="form-group-identidad-p">Codigo Postal <span>*</span></p>

				<input type='text' class="form-group-identidad "  id='cp' name='cp' maxlength='8' value="<?php $bd->buscarCodigoPostalDeUsuario($_POST['email-modal']);?>"><br>
				<a id="a-cp" href="http://www.correoargentino.com.ar/formularios/cpa" target="_blank">No conozco mi codigo postal </a>
				<p class="form-alert" id="cp-form-alert">Ingrese un codigo postal valido ej:B1708IRQ</p>
			
			

				<p class="form-group-identidad-p">Calle <span>*</span></p>

				<input type='text' class="form-group-identidad " id='calle' name='calle' value="<?php $bd->buscarCalleDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="calle-form-alert">Ingrese un nombre de calle valido</p>

				<p class="form-group-identidad-p">Altura <span>*</span></p>

				<input type='text' class="form-group-identidad "  id='altura' name='altura'  value="<?php $bd->buscarAlturaDeUsuario($_POST['email-modal']);?>"><br>
				<p class="form-alert" id="altura-form-alert">Ingrese una altura valida</p>

				<p class="form-group-identidad-p">Piso y departamento</p>
				<input type="text" class="form-group-identidad small " id="piso" name="piso" size="3" placeholder="piso" value="<?php $bd->buscarPisoDeUsuario($_POST['email-modal']);?>">
				<p class="form-alert" id="piso-form-alert">Ingrese un numero de piso</p>

				<!-- <p>Departamento</p> -->
				<input type="text" class="form-group-identidad small " id="departamento" name="departamento" size="3" placeholder="depto" value="<?php $bd->buscarDepartamentoDeUsuario($_POST['email-modal']);?>">
				<p class="form-alert" id="departamento-form-alert">Debes ingresar un departamento valido</p>

			<!--  -<div id='comprar-total' class='comprar-total'>
			<?php 

			$usuario->mostrarTotalCheckOut();

			 ?>
			 </div>-->
		</div>
			 </form>
	</div><!-- container -->

	<div class="btn-row row">
	<div class="container">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<a id="carrito-checkout-btn-compra2" class="carrito-checkout-btn">Confirmar compra</a>
	</div>
	<div id="carrito-checkout-btn-datos" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<a  href="javascript: submitform()"id="carrito-checkout-btn-comprar" class="carrito-checkout-btn">Comprar</a>
	</div>
	</div>
</div>	<!-- btn-row -->

</div>
</ul>
	</div><!-- slider -->

</div><!-- row -->	


<!-- BOTONES -->







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
   	
</body>
</html>