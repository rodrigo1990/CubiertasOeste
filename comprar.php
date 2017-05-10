<?php 
require_once("clases/Producto.php");
session_start();
require_once("clases/Usuario.php");
require_once("clases/BaseDatos.php");
require_once("sdk-php-master-mp/lib/mercadopago.php");

$bd=new BaseDatos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprar</title>
	<link rel="stylesheet" type="text/css" href="estilos_css/estilos.css">
	<script src="jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<div id="carrito-CheckOut">
	<?php 
	$usuario=new Usuario();

	$usuario->mostrarCarritoCheckOut();



	?>
</div>
	<form  action='comprarMP.php'  method='POST' id='form-mp' onkeypress="return anular(event)">
				
				<div class='div-identificacionMp'>

				<p>Nombre <span>*</span></p>

				<input type='text'  id='nombre' name='nombre'><br>
				<p class="form-alert" id="nombre-form-alert">Ingrese un nombre valido</p>


				<p>Apellido <span>*</span></p>

				<input type='text' id='apellido' name='apellido'><br>
				<p class="form-alert" id="apellido-form-alert">Ingrese un apellido valido</p>
				
				<p>Tipo dni <span>*</span></p>
		
				<select type='text'  id='tipo_dni' name='tipo_dni'><br>
					<!-- <option>Selecciona tipo de documento</option> -->
					<?php 

					$bd->buscarTipoDocumento();

					 ?>
				</select>
				<p>dni <span>*</span></p>

				<input type='text'  id='dni' name='dni'><br>
				<p class="form-alert" id="dni-form-alert">Ingrese un dni valido ej:35365531</p>


				<P>Email <span>*</span></p>

				<input type='text'  id='email' name='email'><br>
				<p class="form-alert" id="email-form-alert">Ingrese un email valido ej:user@mail.com</p>


				<p>Telefono <span>*</span></p>

				<input type="text" id="cod_area" name="cod_area" maxlength="4" size="3">
				<p class="form-alert" id="cod_area-form-alert">Ingrese un codigo de area valido</p>



				<span>15</span><input type='text' id='telefono' name='telefono'><br>

				<?php

				echo "<input type='hidden' class='identificacionMp' id ='total' name='total' value='".$_GET['total']."'>";

				?>

				<?php 

					echo "<input type='hidden' class='identifcacionMp' id = 'referencia' name='referencia' value='".uniqid('')."'>";

				 ?>
				
				</div>
				<p class="form-alert" id="telefono-form-alert">Ingrese un telefono valido ej:46612929</p>

			<!-- SECCION UBICACION !!!!!!!!!!!!!!!!!!! -->
				<div class='div-direccionMp'>
				<p>provincia <span>*</span></p>

				<select type='text' id='provincia' name='provincia' form='form-mp'>
				<option value="" selected="selected">Selecciona tu provincia</option>
				<?php 

				$bd->buscarProvincias();

				 ?>
				</select>
				<p class="form-alert" id="provincia-form-alert">Ingrese una provincia</p>

				<p>Ciudad <span>*</span></p>

				<select type='text' id='ciudad' name='ciudad' form='form-mp'>
				<option value="" selected='selected'>Selecciona tu ciudad</option>

				</select>
				<p class="form-alert" id="ciudad-form-alert">Ingrese una ciudad</p>

				<p>Codigo Postal <span>*</span></p>

				<input type='text'  id='cp' name='cp' maxlength='8'><a href="http://www.correoargentino.com.ar/formularios/cpa" target="_blank">No conozco mi codigo postal </a>
				<p class="form-alert" id="cp-form-alert">Ingrese un codigo postal valido ej:B1708IRQ</p>
			
			

				<p>Calle <span>*</span></p>

				<input type='text' id='calle' name='calle'><br>
				<p class="form-alert" id="calle-form-alert">Ingrese un nombre de calle valido</p>

				<p>Altura <span>*</span></p>

				<input type='text'  id='altura' name='altura'><br>
				<p class="form-alert" id="altura-form-alert">Ingrese una altura valida</p>

				<p>Piso y departamento</p>
				<input type="text" id="piso" name="piso" size="3" placeholder="piso">
				<p class="form-alert" id="piso-form-alert">Ingrese un numero de piso</p>

				<!-- <p>Departamento</p> -->
				<input type="text" id="departamento" name="departamento" size="3" placeholder="depto">
				<p class="form-alert" id="departamento-form-alert">Debes ingresar un departamento valido</p>

				</div>


			<div id='comprar-total' class='comprar-total'>
			<?php 

			$usuario->mostrarTotalCheckOut();

			 ?>
			 </div>
			 </form>
		
       

<?php 
	//string con comillas simples
	$cadena_con_comillas_simples = "aquí ' hay una comilla simple escapada";
	echo addslashes($cadena_con_comillas_simples);
?>
	<br>
<?php
	//string con comillas dobles
	$cadena_con_comillas_dobles = 'aquí " hay comillas dobles escapadas';
	echo addslashes($cadena_con_comillas_dobles);
?>
    	
</body>
</html>