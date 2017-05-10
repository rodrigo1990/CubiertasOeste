<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="jquery/jquery-3.1.1.min.js"></script>
	<script>

	function registrarToken(){

	var email=$("#email-recuperar").val();

			$.ajax({
			data:{email:email},
			url:'ajax/registrarToken.php',
			type:'post',
			success:function(response){

				alert(response);
			}
			});
	}
	</script>
</head>
<body>

		<p>Su email</p>
		<input type="text" name="email-recuperar" id="email-recuperar" placeholdeer="ej:jose@neumaticosoeste.com">
		<button onClick="registrarToken();">Ingresar</button>



</body>
</html>