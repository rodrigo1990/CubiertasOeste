<?php 
require_once("clases/Usuario.php");

$usuario=new usuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Imprimir</title>
	<link rel="stylesheet" type="text/css" href="estilos_css/estilos.css">
	<script src="jquery/jquery-3.1.1.min.js"></script>
	<script>
		function imprimir(){
		
			window.print();

		}
	$(document).ready(function(){

		imprimir();

	});

	</script>

</head>
<body>
<?php 

$usuario->listarUnSoloComprobante($_GET['nro']);
 ?>	
</body>
</html>