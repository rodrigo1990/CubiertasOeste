<?php
session_start();
require_once("clases/BaseDatos.php");
require_once("clases/Producto.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="Stylesheet" type="text/css" href="estilos_css/estilos.css">
   <link rel="Stylesheet" type="text/css" href="estilos_css/estilosVerMasProducto.css">
   <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link type="text/css" rel="stylesheet" href="estilos_css/materialize.min.css"/>
	<script src="jquery/jquery-3.1.1.min.js"></script>
   <script src="js/materialize.min.js"></script>

	<!-- ZENDESK CHAT -->
	<script type="text/javascript">

		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
		$.src="https://v2.zopim.com/?4eooxqQhEm2xIDd0tohkfnN1KIKglQAI";z.t=+new Date;$.
		type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

	</script>
</head>
<body>
<?php
$bd=new BaseDatos();

  if(isset($_GET['id'])){

	$bd->listarUnSoloProducto($_GET['id']);
	$bd->listarDescripcion($_GET['id']);

	}else{

	header('Location: index.php');

	}

 ?>
<div class="row">
   <div class="col s12 m6 l5">
     <div class="card grey lighten-3">
       <div class="card-content black-text">
         <h5>Hankook</h5>
         <h4>DYNAPRO ATM 75 Series</h4>
         <div class="row borde-inferior-fila center">
            <div class="col l6 m6 s12">
               <p class="orange-text">Precio Lista:</p>
               <h4 class="orange-text precio-oferta">$2000</h4>
            </div>
            <div class="col l6 m6 s12">
               <p class="grey-text lighten-3">Precio Oferta:</p>
               <h4>$1700</h4>
            </div>
         </div>
         <div class="row center grey-text borde-inferior-fila">
            <div class="container">
               <!-- <div class="col s12">
                  <div class="row">
                     <div class="col s12 m6">
                        <i class="material-icons font-medium">local_shipping</i>
                     </div>
                     <div class="col s12 m6">
                        <p class="font-small span_h2 calcular">CALCULAR ENVÍO</p>
                     </div>
                  </div>
               </div> -->
               <!-- <div class="col s12">
                  <div class="row">
                     <div class="col s12 m6">
                        <i class="material-icons font-medium">payment</i>
                     </div>
                     <div class="col s12 m6">
                        <p class="font-small span_h2 calcular">CALCULAR CUOTA</p>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
         <div class="row container center">
            <div class="col s12 m4 l4">
               <div class="input-field col s12 m6">
                  <input type="number" name="Number" value="1" min="0"/>
                  <label for="Number">Cant.</label>
               </div>
            </div>
            <div class="col s12 m8 l8">
               <a href="#" class="btn btn-large orange white-text" style="margin-top:10px">
                  <i class="material-icons left">shopping_cart</i>COMPRAR
               </a>
            </div>
         </div>
       </div>
     </div>
   </div>
</div>

<a href="index.php?session=true">Ir al menu principal</a>
</body>
</html>
