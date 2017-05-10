
<?php 
require_once("clases/BaseDatos.php");

$baseDatos=new BaseDatos();

if($baseDatos->buscarToken($_GET['token'])==FALSE){
header('Location: index.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="jquery/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos_css/estilos.css">
	<script>

	$(document).ready(function(){

			var soloLetrasYNumeros=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/;
			var contrasenia;
			var contraseniaRepetir;
		$("#contrasenia").keyup(function(){

			 contrasenia=$("#contrasenia").val();

			if(contrasenia.search(soloLetrasYNumeros)){
				$("#contrasenia-form-alert").css("display","block");
			}else{
				$("#contrasenia-form-alert").css("display","none");
			}


		});

		$("#contrasenia-repetir").keyup(function(){

			 contraseniaRepetir=$("#contrasenia-repetir").val();

			if(contraseniaRepetir==contrasenia){
				$("#validarContraseniaButton").css("display","block");
				$("#contrasenia-repetir-form-alert").css("display","none");

			}else{
				$("#validarContraseniaButton").css("display","none");
				$("#contrasenia-repetir-form-alert").css("display","block");
			}


		});



	});


	</script>
</head>
<body>

	<form action="usuario.php?registro=true" method="POST">


		<?php echo "<p><i>".$_GET['email']."</i></p>"; ?>
		
		<?php echo "<input type='hidden' name='email' id='email' value=".$_GET['email'].">" ?>

		<p>Su contraseña</p>

		<input type="password" name="contrasenia" id="contrasenia">

		<p class="form-alert" id="contrasenia-form-alert">Ingrese una minuscula una mayusucula y un numero en su contraseña de al menos 8 caracteres</p>
		
		<p>Repita su contraseña</p>


		<input type="password" name="contrasenia-repetir" id="contrasenia-repetir">

		<p class="form-alert" id="contrasenia-repetir-form-alert">Ambas contraseñas deben ser iguales</p>

		<button id="validarContraseniaButton">Ingresar</button>
	</form>
	
</body>
</html>