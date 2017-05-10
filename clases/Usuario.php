<?php 
require_once("BaseDatos.php");
require_once("Producto.php");

class Usuario{




function __construct(){}

function cargarCarrito(){
			$contadorArray=0;

		//Cuento la cantidad de posiciones con cantidad mayor 0 en el carrito

		$data=serialize($_SESSION['carrito']);

			$carritoObtenido=unserialize($data);

			foreach ($carritoObtenido as $producto) {

				if($producto->cantidad!=0){

					$contadorArray++;

				}//if

		}//forEach

		if(!isset($_SESSION['carrito'])){//sino esta seteada $_session agrega el producto al carrito (al menos que tenga 10 productos)

				$_SESSION['carrito'][]=new Producto($_POST['id'],$_POST['marca'],$_POST['modelo'],$_POST['precio'],$_POST['cantidad'],$_POST['imagen'],$_POST['tiene_descuento'],$_POST['precio_descuento']);

		header('Location: index.php?session=true');

		}elseif(isset($_SESSION['carrito']) && $contadorArray<=9){// sino itera hasta encontrar un id igual
				
				$data=serialize($_SESSION['carrito']);

			  	$carritoObtenido=unserialize($data);

			  	$x=0;//si x 1 es igual a uno lo almacena en el array sino unicamente suma las cantidades y se va del for con el break;
			  
			  	foreach ($carritoObtenido as $producto) {


					if($producto->id == $_POST['id']){

						$producto->cantidad=$producto->cantidad+$_POST['cantidad'];

						$x=2;

						break;

					}else{

						$x=1;

					}

				}//forEach

				if($x==1 && $contadorArray<=9){

					$carritoObtenido[]=new Producto($_POST['id'],$_POST['marca'],$_POST['modelo'],$_POST['precio'],$_POST['cantidad'],$_POST['imagen'],$_POST['tiene_descuento'],$_POST['precio_descuento']);
					
					$x=0;

				}else{
					//echo "<script>alert('No puedes seguir agregando productos al carrito');</script>";	
					header('Location: index.php?session=true');
				
				}

				$_SESSION['carrito']=$carritoObtenido;

				header('Location: index.php?session=true');
		}else{
				//echo "<script>alert('No puedes seguir agregando productos al carrito');</script>";	
				header('Location: index.php?session=true');
		}
}//function

function mostrarCarrito(){

	//if(isset($_GET['session'])){
	if(isset($_SESSION['carrito'])){

	  	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);

	  	$total=0;

	  	$i=0;
		
		


		  	//recorro la lista
			foreach ($carritoObtenido as $producto) {

				//si la cantidad del producto es diferente de  0 muestro la informacion del carrito
				if($producto->cantidad != 0){

					$i++;
					echo "<li class='item-descripcion-carrito'>";
					echo '	<img src="img/'.$producto->imagen.'" class="carrito-img img-responsive" width="100" eight="80">';

					echo "
					Marca:".$producto->marca."<br>Modelo:".$producto->modelo."
					<br> Cantidad unidades: ".$producto->cantidad."<br>
					 Precio:".$producto->cantidad*$producto->precio."$";
					echo '<i class="carrito-borrar-item material-icons" onClick="borrarDeCarrito('.$producto->id.');">delete</i>';
					 echo "</li>";

					$total=$total+$producto->precio*$producto->cantidad;

				//	echo "<button onClick='borrarDeCarrito(".$producto->id.")'>Eliminar</button><br>";

				}
			}//forEach

			if($total!=0){
			echo "<li class='item-total-carrito'>";
			echo "<a class='boton-comprar-carrito Boton-LinearGradient1' href='comprar.php?session=true&total=".$total."'>Comprar</a><br>";
			echo "</li>";

			//echo "</div>";

			}else{
					echo "<li class='item-descripcion-vacio-carrito'>";
					echo "Tu carrito de compras se encuentra vacio";
					echo "</li>";
				}//if anidado
	}else{
		echo "<li class='item-descripcion-vacio-carrito'>";
					echo "Tu carrito de compras se encuentra vacio";
					echo "</li>";		
	}	

/*}else{
	session_destroy();
	echo "<p>El carrito esta vacio </p>";
}*/

}//function mostrarCarrito()

function mostrarTotal(){

  	$total=0;

if(isset($_SESSION['carrito'])){


  	$i=0;

	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);
		

		  	//recorro la lista
			foreach ($carritoObtenido as $producto) {

				//si la cantidad del producto es diferente de  0 muestro la informacion del carrito
				if($producto->cantidad != 0){

					$i++;

					$total=$total+$producto->precio*$producto->cantidad;


				}
			}//forEach

			
}//if isset

echo $total;

}//function

function mostrarCantidad(){
	$i=0;
if(isset($_SESSION['carrito'])){


  

	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);
		

		  	//recorro la lista
			foreach ($carritoObtenido as $producto) {

				//si la cantidad del producto es diferente de  0 muestro la informacion del carrito
				if($producto->cantidad != 0){

					$i++;

		
				}
			}//forEach

			
}//if isset

echo $i;

}

function mostrarCarritoCheckOut(){

	$contador=0;

	if(isset($_SESSION['carrito'])){
	  	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);

	  	$total=0;

	  	echo "<table>
				<tr>
				<th>Producto</th>
				<th></th>
				<th>Envio</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
				</tr>";
	  	//recorro la lista
		foreach ($carritoObtenido as $producto) {

			//si la cantidad del producto es diferente de  0 muestro la informacion del carrito
			if($producto->cantidad != 0 && $producto->tiene_descuento==0){

				$contador++;


				echo "<tr>
				<td><img width='120' height='120' src='img/".$producto->imagen."'/></td>
				<td>".$producto->marca."<br>".$producto->modelo."</td>
				<td>a calcular</td> 
				<td>".$producto->precio."</td> 
				<td><input type='number' id='cantidad".$contador."' name='cantidad' min='1' max='20' onChange='actualizarCantidad".$contador."(".$producto->id.")' value='".$producto->cantidad."'/></td> 
				<td>".$producto->cantidad*$producto->precio."<button onClick='borrarDeCarritoCheckOut(".$producto->id.")'>Eliminar</button><br></tr>";
				
				$total=$total+$producto->precio*$producto->cantidad;

			}else if($producto->cantidad !=0 && $producto->tiene_descuento==1){

				$contador++;

				echo "<tr>
				<td><img width='120' height='120' src='img/".$producto->imagen."'/></td>
				<td>".$producto->marca."<br>".$producto->modelo."</td>
				<td>a calcular</td> 
				<td>Antes:".$producto->precio."<br>Ahora:".$producto->precio_descuento."</td> 
				<td><input type='number' id='cantidad".$contador."' name='cantidad' min='1' max='20' onChange='actualizarCantidad".$contador."(".$producto->id.")' value='".$producto->cantidad."'/></td> 
				<td>".$producto->cantidad*$producto->precio_descuento."<button onClick='borrarDeCarritoCheckOut(".$producto->id.")'>Eliminar</button><br></tr>";				
			}
		}//forEach
		echo "</table>";


		echo "";

}else{
	header("location: index.php");
}


}//function mostrarCarrito()

function mostrarTotalCheckOut(){

	if(isset($_GET['session'])){
	  	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);

	  	$subtotal=0;
	  	$descuento=0;

	  	//recorro la lista
		foreach ($carritoObtenido as $producto) {

			//si la cantidad del producto es diferente de  0 acumulo el total
			if($producto->cantidad != 0 && $producto->tiene_descuento==0){

			$subtotal=$subtotal+$producto->precio*$producto->cantidad;

			}else if($producto->cantidad != 0 && $producto->tiene_descuento==1){
				$descuento=$descuento+$producto->precio_descuento*$producto->cantidad-($producto->precio*$producto->cantidad);
				$subtotal=$subtotal+$producto->precio*$producto->cantidad;
			}

		}//forEach

		$total=$subtotal+$descuento;

		echo "	 <ul>
				  <li>Subtotal:<span>".$subtotal."$</span></li>
				  <li>Descuento:<span>".$descuento."$</span></li>
				  <li>Total:<span id='total'>".$total."$</span></li>
				  </ul>
				  <input type='hidden' name='total' value='".$total."'/>
				  <button id='btn-form'>Comprar</button>";


	}else{
		session_destroy();
		echo "<p>El carrito esta vacio </p>";
	}


}

function mostrarComprobantes($email){

		$baseDatos = new BaseDatos();


		$stmt=$baseDatos->mysqli->prepare("SELECT DISTINCT UCP.comprobante_nro
									  FROM usuario_compra_producto UCP
									  WHERE UCP.email_usuario=(?)");

		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){

			$total=0;
			$buscar=$fila['comprobante_nro'];

			$sql2="SELECT PRO.marca,PRO.modelo,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,UCP.cantidad
				   FROM usuario_compra_producto UCP JOIN producto PRO ON UCP.id_producto=PRO.id
				   WHERE UCP.comprobante_nro='$buscar'";

			$consulta2=mysqli_query($baseDatos->conexion,$sql2);

			echo "<div class='comprobante'>
				<h4>Nro Comprobante:".$buscar."</h4>";
					//Listo los registros que corresponden a los nro de comprobante
					while($fila2=mysqli_fetch_assoc($consulta2)){

							if($fila2['tiene_descuento']==1){

							$total=$total+$fila2['precio_descuento']*$fila2['cantidad'];

							echo "<p>".$fila2['marca']." ".$fila2['modelo']." ".$fila2['cantidad']."/u $".$fila2['precio_descuento']."</p>";
							
							}else{

							$total=$total+$fila2['precio']*$fila2['cantidad'];	

							echo "<p>".$fila2['marca']." ".$fila2['modelo']." ".$fila2['cantidad']."/u $".$fila2['precio']."</p>";
							
							}//if

						}//while

						echo "<p class='total-comprobante'><b>Total:$".$total."</b></p>";
						echo "<a href='comprobante.php?nro=".$buscar."' target='__blank'>Imprimir</a>";
						echo "</div>";


		}//while prin
		$stmt->close();

	}//function

function listarUnSoloComprobante($comprobante){

		$baseDatos = new BaseDatos();

		$total=0;

		$stmt=$baseDatos->mysqli->prepare("SELECT PRO.marca,PRO.modelo,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,UCP.cantidad
											   FROM usuario_compra_producto UCP JOIN producto PRO ON UCP.id_producto=PRO.id
											   WHERE UCP.comprobante_nro=(?)");

		$stmt->bind_param("s",$comprobante);

		$stmt->execute();

		$resultado=$stmt->get_result();

		echo "<div class='comprobante'>
				<h4>Nro Comprobante:".$comprobante."</h4>";

		while($fila=$resultado->fetch_assoc()){

			if($fila['tiene_descuento']==1){

				$total=$total+$fila['precio_descuento']*$fila['cantidad'];

				echo "<p>".$fila['marca']." ".$fila['modelo']." ".$fila['cantidad']."/u $".$fila['precio_descuento']."</p>";
				
			}else{

				$total=$total+$fila['precio']*$fila['cantidad'];	

				echo "<p>".$fila['marca']." ".$fila['modelo']." ".$fila['cantidad']."/u $".$fila['precio']."</p>";
				
			}//if



		}//while
		$stmt->close();

		echo "<p class='total-comprobante'><b>Total:$".$total."</b></p>";
		echo "</div>";



}//function

function actualizarCarrito($id,$cantidad){
	
	  	$data=serialize($_SESSION['carrito']);

	  	$carritoObtenido=unserialize($data);


	  	//recorro la lista
		foreach ($carritoObtenido as $producto) {

			//si la cantidad del producto es diferente de  0 muestro la informacion del carrito
			if($producto->cantidad != 0){
				if($producto->id == $id){
					$producto->cantidad=$cantidad;


				}

			}//if
		}//forEach

		$_SESSION['carrito']=$carritoObtenido;

}//function
}//class



?>	