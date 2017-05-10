<?php
class Mail{

	function __construct(){}


	function enviarComprobante(){

		$total=$_SESSION['total'];
		$destinatario = $_SESSION["email"];

		$data=serialize($_SESSION['carrito']);

		$carritoObtenido=unserialize($data);

		$asunto = "Compra de productos cubiertas oeste"; 

$cuerpo = ' 
			<html> 
			<head> 
			   <title>¡Enhorabuena!</title> 
			</head> 
			<body> 
			<h1 style="color:orange;">Neumaticos Oeste</h1>
			<p><i>'.date("d-m-y").'</i></p> 
			<p><i>Comprobante N°:'.$_SESSION['referencia'].'</i></p>
			<p><i>Comprobante MP°:'.$_GET['collection_id'].'</i></p>
			<p><i>('.ucwords(strtolower($_SESSION['nombre'])).' '.ucwords(strtolower($_SESSION['apellido'])).','.$_SESSION['tipo_dni'].' '.$_SESSION['dni'].')</i></p>';

			$cuerpo.='<p style="color:black;">Entrega este comprobante al momento de retirar tu compra
			efectuada en nuestro sitio web <b>NeumaticosOeste.com</b> </p>

			</p>

			<table>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Precio unitario</th>
					<th>Cantidad</th>
					<th>Precio total por unidad</th>
				</tr>';

foreach ($carritoObtenido as $producto) {

			if ($producto->cantidad!=0 && $producto->tiene_descuento==0) {
				$cuerpo.="<tr>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->marca;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->modelo;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->precio;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.= $producto->cantidad;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.= $producto->cantidad*$producto->precio;
				$cuerpo.="</td>";
				$cuerpo.="</tr>";
			}
			if ($producto->cantidad!=0 && $producto->tiene_descuento==1) {
				$cuerpo.="<tr>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->marca;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->modelo;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.=$producto->precio_descuento;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.= $producto->cantidad;
				$cuerpo.="</td>";
				$cuerpo.="<td>";
				$cuerpo.= $producto->cantidad*$producto->precio_descuento;
				$cuerpo.="</td>";
				$cuerpo.="</tr>";
			}
		}
$cuerpo.="<tr><td></td><td></td><td></td><td></td> <td><p style='margin-left:45%;'><b>Total: ".$_SESSION['total']."$</b></p></td></tr>";
$cuerpo.="</table>
			<p><i>Acceso oeste 1507,(011)5423-011/4628-9292 Ituzaingo, GBA</i></p></body></html>";





//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Cubiertas Oeste <mcd77.1990@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: tatyrod@gmail.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: tatyrod5@gmail.com\r\n"; 


mail($destinatario,$asunto,$cuerpo,$headers);

echo "Hemos enviado un comprobante de compra a tu email, lo requerimos al momento de la entrega";
	}//function





 function enviarToken($email){

 	$destinatario=$email;
$token=md5($email);

		 	$asunto = "Recuperar contraseña Neumaticos Oeste"; 

		$cuerpo = ' 
		<html> 
		<head> 
		   <title>Recuperar contraseña Neumaticos Oeste</title> 
		</head> 
		<body> 
		<h1 style="color:orange;">Neumaticos Oeste</h1>
		<p><i>'.date("d-m-y").'</i></p> 
		<p>Hola te enviamos este email para que puedas <b>registrarte o recuperar tu contraseña</b></p>
		<p>Tan solo haz click en el siguiente click, para poder crear tu nueva contraseña.
		Cualquier ayuda o consulta no dudes en contactarte con <b>Neumaticos Oeste</b></p>
		<br>
		<a href="/localhost/cubiertasoeste/registrarUsuario.php?email='.$destinatario.'&token='.$token.'">/localhost/cubiertasoeste/registrarUsuario.php?email='.$destinatario.'&token='.$token.'</a>"';

		$cuerpo.="	<p><i>Acceso oeste 1507,(011)5423-011/4628-9292 Ituzaingo, GBA</i></p></body></html>";





		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		//dirección del remitente 
		$headers .= "From: Neumaticos Oeste <mcd77.1990@gmail.com>\r\n"; 

		//direcciones que recibián copia 
		//$headers .= "Cc: tatyrod@gmail.com\r\n"; 


		mail($destinatario,$asunto,$cuerpo,$headers);


		echo "Hemos enviado un mail a tu correo para seguir el proceso de registro de contraseña";
 }//function

}//class

 ?>