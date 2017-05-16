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
	document.getElementById("warning-buscador-filtros-default").style.display = "block";

	$(".buscador-filtros-select").change(function(){

		var tipo_de_vehiculo = $("#tipo-de-vehiculo option:selected").val();
		var rodado = $("#rodado option:selected").val();
		var marca = $("#marca option:selected").val();
		var categoria = $("#categoria option:selected").val();
		var ancho = $("#ancho option:selected").val();
		var alto = $("#alto option:selected").val();
		var ordenar =$("#ordenar option:selected").val();

		if(tipo_de_vehiculo=='valor_nulo' && rodado=='valor_nulo' && marca=='valor_nulo' && categoria=='valor_nulo'&& ancho=='valor_nulo'&& alto=='valor_nulo'){
			document.getElementById("warning-buscador-filtros-default").style.display = "block";
			document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "none";
			}else{
			document.getElementById("warning-buscador-filtros-default").style.display = "none";

			}
		if(ordenar=='valor_nulo'){

				$.ajax({
				data:{tipo_de_vehiculo:tipo_de_vehiculo,rodado:rodado,marca:marca,categoria:categoria,ancho:ancho,alto:alto},
				url:'ajax/buscarTipoDeVehiculo.php',
				type:'post',
				success:function(response){
				if(response==''){

					if(tipo_de_vehiculo=='valor_nulo' && rodado=='valor_nulo' && marca=='valor_nulo' && categoria=='valor_nulo'&& ancho=='valor_nulo'&& alto=='valor_nulo'){
						document.getElementById("warning-buscador-filtros-default").style.display = "block";
						document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "none";
					}else{
					 document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "block";
					 document.getElementById("warning-buscador-filtros-default").style.display = "none";

					 }
					}//if(response==''){

				$("#resultado-buscador-filtros").html(response);
				}//success:function(response){

				});//ajax

		}else if(ordenar=='ascendente'){

				$.ajax({
				data:{tipo_de_vehiculo:tipo_de_vehiculo,rodado:rodado,marca:marca,categoria:categoria,ancho:ancho,alto:alto},
				url:'ajax/buscarTipoDeVehiculoAscendente.php',
				type:'post',
				success:function(response){

				if(response==''){

					if(tipo_de_vehiculo=='valor_nulo' && rodado=='valor_nulo' && marca=='valor_nulo' && categoria=='valor_nulo'&& ancho=='valor_nulo'&& alto=='valor_nulo'){
						document.getElementById("warning-buscador-filtros-default").style.display = "block";
						document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "none";
					}else{
					 	document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "block";
					 	document.getElementById("warning-buscador-filtros-default").style.display = "none";

					 }
					}//if(response==''){

				$("#resultado-buscador-filtros").html(response);
				
				}//success:function(response){

				});//ajax

		}else if(ordenar=='descendente'){

					$.ajax({
				data:{tipo_de_vehiculo:tipo_de_vehiculo,rodado:rodado,marca:marca,categoria:categoria,ancho:ancho,alto:alto},
				url:'ajax/buscarTipoDeVehiculoDescendente.php',
				type:'post',
				success:function(response){

				if(response==''){

					if(tipo_de_vehiculo=='valor_nulo' && rodado=='valor_nulo' && marca=='valor_nulo' && categoria=='valor_nulo'&& ancho=='valor_nulo'&& alto=='valor_nulo'){
						document.getElementById("warning-buscador-filtros-default").style.display = "block";
						document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "none";
					}else{
						 document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "block";
						 document.getElementById("warning-buscador-filtros-default").style.display = "none";

					 }
					}//if(response==''){



				$("#resultado-buscador-filtros").html(response);
				}//success:function(response){
				});//ajax

		}//}else if(ordenar=='descendente'){

	

	});//$(".buscador-filtros-select").change(function(){

});//ready
</script>

<script>
	
	function reestablecerBusqueda(){
	var valor_nulo="valor_nulo"; 
    $("#tipo-de-vehiculo").val(valor_nulo);
    $("#rodado").val(valor_nulo);
    $("#marca").val(valor_nulo);
    $("#categoria").val(valor_nulo);
    $("#ancho").val(valor_nulo);
    $("#alto").val(valor_nulo);
    $("#ordenar").val(valor_nulo);

    $("#resultado-buscador-filtros").html("");

    document.getElementById("warning-buscador-filtros-default").style.display = "block";
    document.getElementById("warning-buscador-filtros-sin-resultados").style.display = "none";



	}
</script>

<title>Cubiertas Oeste</title>


</head>
<body>


	<div class="row">

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




	<div class="row" id="menu-fixed" >

		<div class="menu hidden-xs col-sm-12 col-md-12 col-lg-12">
			<div class="container">

				<img style="cursor:pointer;" onClick="window.location='index.php';" src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" width="210">
				
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

				<img style="cursor:pointer;" onClick="window.locationf='index.php';" src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" width="210">
				
				

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
<!-- CARRITO DE COMPRAS !! -->
<div id="carrito" class="animated slideInDown carrito-para-buscador-filtros">

	<i id="carrito-close" class="material-icons"  onClick="cerrarVentanaCarrito();">close</i>
	<ul id="carrito-lista">
		<?php 

		$bd=new BaseDatos();
		$usuario->mostrarCarrito();

		?>
	</ul>
</div>
<div id="buscador-fixed" class="row">
	<div class="buscador-filtros hidden-xs col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			<form id="buscador-filtros-form" name="buscador-filtros-form" action="buscador-filtros.php" method="post">
				<div class="buscador-filtros-tituloInput">

				
					<select type="text" id="tipo-de-vehiculo" class="buscador-filtros-select form-control" name="tipo-de-vehiculo" fomr="buscador-filtros-form">
						<option value="valor_nulo" selected="selected">Vehiculo</option>
						<?php $bd->listarTipoVehiculo(); ?>
					</select>
				</div>

				<div class="buscador-filtros-tituloInput">

					<select type="text" id="rodado" class="buscador-filtros-select form-control" name="rodado" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Rodado</option>
						<?php $bd->listarRodado(); ?>
					
					</select>
				</div>

				<div class="buscador-filtros-tituloInput">


					<select type="text" id="marca" class="buscador-filtros-select form-control" name="marca" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Marca</option>
						<?php $bd->listarMarca(); ?>

					</select>
				</div>

				<div class="buscador-filtros-tituloInput">


					<select type="text" id="categoria" class="buscador-filtros-select form-control" name="categoria" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Categoria</option>
						<?php $bd->listarCategoria(); ?>

					</select>
				</div>

				<div class="buscador-filtros-tituloInput">


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


					<select type="text" id="ordenar" class="buscador-filtros-select form-control" name="ordenar" form="buscador-filtros-form">
						
						<option value="valor_nulo" selected="selected">Ordenar precios</option>
						<option value="ascendente">De menor a mayor</option>
						<option value="descendente">De mayor a menor</option>

					</select>
				</div>

			<div type ="submit"class="buscador-filtros-btn" onClick="reestablecerBusqueda();" title="Reiniciar campos">
				<i id="buscador-filtros-search" class="material-icons">close</i>
			</div>
			</form>
		</div><!-- container -->
	</div><!-- buscador-filtros -->
</div><!-- row -->

<div class="row">
		<div id="resultado-buscador-filtros" class="container">
		</div><!-- container -->


	<div id="warnings-buscador-filtros" class="container">
	<h2 id="warning-buscador-filtros-default" class="warning-buscador-filtros">Todos los campos se encuentran vacios</h2>
	<h2 id="warning-buscador-filtros-sin-resultados" class="warning-buscador-filtros">No se encontraron resultados</h2>
		</div><!-- container -->
</div><!-- row -->



</body>
</html>