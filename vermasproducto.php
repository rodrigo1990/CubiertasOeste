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
	<script src="jquery/jquery-3.1.1.min.js"></script>
	
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
<a href="index.php?session=true">Ir al menu principal</a>
</body>
</html>