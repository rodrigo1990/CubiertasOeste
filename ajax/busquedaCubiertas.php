<?php
require_once("../clases/BaseDatos.php");
//Variable de búsqueda
$cubiertaBuscada = $_GET['cubiertaBuscada'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$cubiertaBuscada = str_replace($caracteres_malos, $caracteres_buenos, $cubiertaBuscada);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

if (isset($cubiertaBuscada)) {

	$baseDatos=new BaseDatos();

	$sql="SELECT id,marca,modelo,medida
	FROM Producto
	WHERE marca  LIKE '%$cubiertaBuscada%' OR modelo LIKE '%$cubiertaBuscada%' OR medida LIKE '%$cubiertaBuscada%'";

	$consulta = mysqli_query($baseDatos->conexion,$sql);
	
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

		if ($filas == 0) {


			$mensaje = '<li class="list-busqueda-menu">No hay ningún producto con este nombre</li>';


		}else {//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				


			echo '<li class="list-busqueda-menu">Resultados para <strong>'.$cubiertaBuscada.'</strong></li>';
				

			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			$mensaje="";
			while($resultados = mysqli_fetch_array($consulta)) {

			$id=$resultados['id'];
			$marca = $resultados['marca'];
			$modelo=$resultados['modelo'];
			$medida=$resultados['medida'];

		//Output
			$mensaje.= '<li class="list-busqueda-menu"> <a class="a-busqueda-menu" href="vermasproducto.php?id='.$id.'"><strong>Marca:</strong> '.$marca.'<strong> Modelo: </strong> '.$modelo.' <strong>Medida:</strong> '.$medida.'<br></a></li>';

									

		};//while

	}//else

	echo $mensaje;

			}//if isset

?>