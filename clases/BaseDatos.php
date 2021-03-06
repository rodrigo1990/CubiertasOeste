<?php 

class BaseDatos{

	public $base='oestecubiertas';
	public $servidor='localhost';
	public $conexion;
	public $mysqli;


	public function __construct(){
		$this->conexion=mysqli_connect($this->servidor,'root','',$this->base) or die ("No se ha podido establecer conexion con la base de datos");
		$this->mysqli=new mysqli($this->servidor, 'root','', $this->base);
	}



	public function listarProductos(){
		//contador
		$i=0;
		$z=0;//Descomentar para listar 8 elementos segun grilla bootstrap

		$sql="SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.medida,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,CAT.descripcion,ROD.descripcion as rodado,TV.descripcion as tipo_vehiculo
			 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
			 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
			 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo";



		$consulta=mysqli_query($this->conexion,$sql);

		while($fila=mysqli_fetch_assoc($consulta)){
			//lista nada mas los primeros 10 productos
			$i++;
			$z++;//Descomentar para listar 8 elementos segun grilla bootstrap
			if($i==11){break;}

			if($fila['tiene_descuento']==0){

					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
					<div class='producto-responsive'>


						<h3>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img  src=img/".$fila['imagen']." width='165' height='165'>
						
						<div class='producto-precio-responsive'>
						<h4>$".$fila['precio']."ARG</h4>
						</div>
						
						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>
						
						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>

						</div>
					</div>";
					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}

				}else if($fila['tiene_descuento']==1){
				
					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
					$cien=100;
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
						<div class='producto-responsive'>

						<h3>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img   src=img/".$fila['imagen']." width='165' height='165'>
						<div class='circulo-cont'><h3 class='producto-porcentaje-descuento'>".-floor(($fila['precio']-$fila['precio_descuento'])/$fila['precio']*$cien)."%</h3></div>

						<div class='producto-precio-responsive'>
						<h4><del>$".$fila['precio']."</del> $".$fila['precio_descuento']." ARG</h4>
						</div>

						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>

						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>
				
					</div>
					</div>";	

					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}
		
				}
		}//while



	}//function

	public function listarProductosHankook(){
		//contador
		$z=0;
		$i=0;

		$sql="SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.medida,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,CAT.descripcion,ROD.descripcion as rodado,TV.descripcion as tipo_vehiculo
			 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
			 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
			 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
			 WHERE PRO.marca='Hankook'";

		$consulta=mysqli_query($this->conexion,$sql);

		while($fila=mysqli_fetch_assoc($consulta)){
			
			$i++;
			if($i==6){break;}

			if($fila['tiene_descuento']==0){

			if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
					<div class='producto-responsive'>


						<h3>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img  src=img/".$fila['imagen']." width='165' height='165'>
						
						<div class='producto-precio-responsive'>
						<h4>$".$fila['precio']."ARG</h4>
						</div>
						
						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>
						
						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>

						</div>
					</div>";
					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}

				}else if($fila['tiene_descuento']==1){
				
					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
					$cien=100;
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
						<div class='producto-responsive'>

						<h3>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img   src=img/".$fila['imagen']." width='165' height='165'>
						<div class='circulo-cont'><h3 class='producto-porcentaje-descuento'>".-floor(($fila['precio']-$fila['precio_descuento'])/$fila['precio']*$cien)."%</h3></div>

						<div class='producto-precio-responsive'>
						<h4><del>$".$fila['precio']."</del> $".$fila['precio_descuento']." ARG</h4>
						</div>

						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>

						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>
				
					</div>
					</div>";	

					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}
		
				}
		}//while



	}//function

	public function listarUnSoloProducto($id){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.medida,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,CAT.descripcion
				 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id
				 WHERE PRO.id=(?)");
			$stmt->bind_param("i",$id);

			$stmt->execute();

			$resultado=$stmt->get_result();




		while($fila=$resultado->fetch_assoc()){

			$fila['id'];
			$fila['marca'];
			$fila['modelo'];
			$fila['medida'];
			$fila['imagen'];
			$fila['precio'];
			$fila['descripcion'];
			$fila['tiene_descuento'];
			$fila['precio_descuento'];

			echo "<div class='producto'><h1>".$fila['marca']."</h1>
					<img  width='200' height='200' src=img/".$fila['imagen'].">
					<h2>".$fila['modelo']."</h4>
					<h2>".$fila['medida']."<h5>
					<h3>De nuestra linea ".$fila['descripcion']."</h3>
					<h3>$".$fila['precio']."ARG</h3>
					
					<form action='agregarACarrito.php' method='POST'>

					<p>Ingrese cantidad de unidades</p>
					<input type='number' id='cantidad' name='cantidad' min='1' max='20'/><br><br>
					<input type='hidden' name='id' value='".$fila['id']."'>
					<input type='hidden'name='marca' value='".$fila['marca']."'>
					<input type='hidden'name='precio' value='".$fila['precio']."'>
					<input type='hidden'name='modelo' value='".$fila['modelo']."'>		
					<input type='hidden'name='imagen' value='".$fila['imagen']."'>					
					<input type='hidden'name='tiene_descuento' value='".$fila['tiene_descuento']."'>
					<input type='hidden'name='precio_descuento' value='".$fila['precio_descuento']."'>					
					<button>Añadir a carrito</button>
					
					</form>





					</div>";
		}//while

		$stmt->close();




	}//function

	public function buscarProvincias($email){

		$stmt=$this->mysqli->prepare("SELECT PRO.provincia_nombre
			  								  FROM usuario USU JOIN ciudad CIU  ON USU.ciudad_id=CIU.id
			  								  					JOIN provincia PRO ON CIU.provincia_id=PRO.id 
			  								  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila_provincia_usuario=$resultado->fetch_assoc();



		$sql="SELECT provincia_nombre
			  FROM provincia";

		$consulta=mysqli_query($this->conexion,$sql);

		while($fila=mysqli_fetch_assoc($consulta)){

			if($fila_provincia_usuario['provincia_nombre']==$fila['provincia_nombre']){

				echo "<option value='".$fila['provincia_nombre']."' selected>".$fila['provincia_nombre']."</option>";

			}else{

				echo "<option value='".$fila['provincia_nombre']."'>".$fila['provincia_nombre']."</option>";
		
			}
		}


	}

		public function buscarTipoDocumento($email){

		$stmt=$this->mysqli->prepare("SELECT TD.descripcion
			  								  FROM usuario USU JOIN tipo_documento TD ON USU.tipo_doc=TD.id 
			  								  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila_doc_usuario=$resultado->fetch_assoc();


		$sql="SELECT descripcion
			  FROM tipo_documento";

		$consulta=mysqli_query($this->conexion,$sql);

		while($fila=mysqli_fetch_assoc($consulta)){

			if($fila_doc_usuario['descripcion']==$fila['descripcion']){

			echo "<option value='".$fila['descripcion']."'selected>".$fila['descripcion']."</option>";
		
			}else{

			echo "<option value=".$fila['descripcion'].">".$fila['descripcion']."</option>";

			}
		}


	}//function




	public function buscarUsuarioEInsertarloEnTabla($nro_doc,$tipo_doc,$nombre,$apellido,$calle,$altura,$cod_area,$telefono,$email,$cp,$ciudad_nombre,$provincia_nombre,$piso,$departamento){


		//busca el email

		$stmt=$this->mysqli->prepare("SELECT email,calle
							  		  FROM usuario
							  		  WHERE email=(?)");

		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila_existe_usuario=$resultado->fetch_assoc();

			//si el email no existe creara un usuario en la tabla
			if($fila_existe_usuario['email']==''){

				//busco el id de la ciudad
				$stmt=$this->mysqli->prepare("SELECT CIU.id
											  FROM ciudad CIU JOIN provincia PRO ON CIU.provincia_id=PRO.id
											  WHERE ciudad_nombre=(?) AND provincia_nombre=(?)");

				$stmt->bind_param("ss",$ciudad_nombre,$provincia_nombre);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_ciudad=$resultado->fetch_assoc();

				$ciudad_id=$fila_id_ciudad['id'];


				//busco id de tipo de doc
				$stmt=$this->mysqli->prepare("SELECT id
											  FROM tipo_documento
											  WHERE descripcion=(?)");

				$stmt->bind_param("s",$tipo_doc);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_tipo_doc=$resultado->fetch_assoc();

				$ciudad_id=$fila_id_ciudad['id'];

				$tipo_doc_id=$fila_id_tipo_doc['id'];



				$stmt=$this->mysqli->prepare("INSERT INTO usuario(nro_doc,tipo_doc,nombre,apellido,calle,altura,cod_area,telefono,email,ciudad_id,cp,piso,departamento)
					  							VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

				$stmt->bind_param("iisssiissisis",$nro_doc,$tipo_doc_id,$nombre,$apellido,$calle,$altura,$cod_area,$telefono,$email,$ciudad_id,$cp,$piso,$departamento);

				$stmt->execute();

				$stmt->close();

				echo("Finalizado el proceso de pago, te redireccionaremos a la emision del detalle de  compra.");

				//Si el email ya existe actualiza el resto de los datos
		}else{

				$stmt=$this->mysqli->prepare("SELECT CIU.id
											  FROM ciudad CIU JOIN provincia PRO ON CIU.provincia_id=PRO.id
											  WHERE ciudad_nombre=(?) AND provincia_nombre=(?)");

				$stmt->bind_param("ss",$ciudad_nombre,$provincia_nombre);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_ciudad=$resultado->fetch_assoc();

				$ciudad_id=$fila_id_ciudad['id'];

					//busco id de tipo de doc
				$stmt=$this->mysqli->prepare("SELECT id
											  FROM tipo_documento
											  WHERE descripcion=(?)");

				$stmt->bind_param("s",$tipo_doc);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_tipo_doc=$resultado->fetch_assoc();

				$ciudad_id=$fila_id_ciudad['id'];

				$tipo_doc_id=$fila_id_tipo_doc['id'];


				$stmt=$this->mysqli->prepare("UPDATE usuario
											   SET nro_doc=(?),tipo_doc=(?), nombre=(?),apellido=(?), calle=(?),altura=(?),cod_area=(?),telefono=(?),ciudad_id=(?),cp=(?),piso=(?),departamento=(?)
											   WHERE email=(?)");

				$stmt->bind_param("iisssiisisiss",$nro_doc,$tipo_doc_id,$nombre,$apellido,$calle,$altura,$cod_area,$telefono,$ciudad_id,$cp,$piso,$departamento,$email);

				$stmt->execute();

				$stmt->close();

				echo("Finalizado el proceso de pago, te redireccionaremos a la emision del detalle de  compra.");


					

			}

	}//FUNCTION


	public function buscarUsuarioEInsertarloEnTablaSinEnvio($nro_doc,$tipo_doc,$nombre,$apellido,$cod_area,$telefono,$email){

		$stmt=$this->mysqli->prepare("SELECT email
							  		  FROM usuario
							  		  WHERE email=(?)");

		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila_existe_usuario=$resultado->fetch_assoc();


			if($fila_existe_usuario['email']==''){

				
				//busco id de tipo de doc
				$stmt=$this->mysqli->prepare("SELECT id
											  FROM tipo_documento
											  WHERE descripcion=(?)");

				$stmt->bind_param("s",$tipo_doc);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_tipo_doc=$resultado->fetch_assoc();

				$tipo_doc_id=$fila_id_tipo_doc['id'];




				$stmt=$this->mysqli->prepare("INSERT INTO usuario(nro_doc,tipo_doc,nombre,apellido,cod_area,telefono,email)
					  							VALUES (?,?,?,?,?,?,?)");

				$stmt->bind_param("iissiis",$nro_doc,$tipo_doc_id,$nombre,$apellido,$cod_area,$telefono,$email);

				$stmt->execute();

				$stmt->close();

				echo("Finalizado el proceso de pago, te redireccionaremos a la emision del detalle de  compra.");

			//Si el email ya existe actualiza el resto de los datos
			}else{//if($fila_existe_usuario['email']=='')		


					//busco id de tipo de doc
				$stmt=$this->mysqli->prepare("SELECT id
											  FROM tipo_documento
											  WHERE descripcion=(?)");

				$stmt->bind_param("s",$tipo_doc);

				$stmt->execute();

				$resultado=$stmt->get_result();

				$fila_id_tipo_doc=$resultado->fetch_assoc();

				$tipo_doc_id=$fila_id_tipo_doc['id'];

				$stmt=$this->mysqli->prepare("UPDATE usuario
											   SET nro_doc=(?),tipo_doc=(?), nombre=(?),apellido=(?),cod_area=(?),telefono=(?)
											   WHERE email=(?)");

				$stmt->bind_param("iississ",$nro_doc,$tipo_doc_id,$nombre,$apellido,$cod_area,$telefono,$email);

				$stmt->execute();

				$stmt->close();

				echo("Finalizado el proceso de pago, te redireccionaremos a la emision del detalle de  compra.");

			}



	}//FUNCTION

	public function insertarVenta($id_mp,$referencia,$email,$fecha,$recibio_email){

		$data=serialize($_SESSION['carrito']);

		$carritoObtenido=unserialize($data);


		$stmt=$this->mysqli->prepare("SELECT comprobante_nro
									  FROM usuario_compra_producto
									  WHERE comprobante_nro=(?)");

		$stmt->bind_param("s",$referencia);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila_buscar_venta=$resultado->fetch_assoc();

			if($fila_buscar_venta['comprobante_nro']==''){

					foreach ($carritoObtenido as $producto) {

					if ($producto->cantidad!=0) {

						$stmt=$this->mysqli->prepare("INSERT INTO usuario_compra_producto(id_mp,comprobante_nro,email_usuario,id_producto,fecha,cantidad,recibio_email)
					  		  					VALUES (?,?,?,?,?,?,?)");

						$stmt->bind_param("issisii",$id_mp,$referencia,$email,$producto->id,$fecha,$producto->cantidad,$recibio_email);

						$stmt->execute();



					}//if
				}//foreach

			$stmt->close();

			}//if

	}// function

	public function actualizarIdMpEnVenta($id_mp,$referencia,$recibio_email){


		$stmt=$this->mysqli->prepare("SELECT id_mp
					   				  FROM usuario_compra_producto
					   				  WHERE id_mp=(?) AND comprobante_nro=(?)");

		$stmt->bind_param("is",$id_mp,$referencia);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila_buscar_id_mp=$resultado->fetch_assoc();

			if($fila_buscar_id_mp['id_mp']==''){

			$stmt=$this->mysqli->prepare("UPDATE usuario_compra_producto 
										  SET id_mp=(?), recibio_email=(?) 
										  WHERE comprobante_nro=(?)");

			$stmt->bind_param("iis",$id_mp,$recibio_email,$referencia);

			$stmt->execute();

			$stmt->close();

			}//if

	}//function

	public function eliminarPagoFallido($referencia){



		$sql_buscar_referencia="SELECT comprobante_nro
								FROM usuario_compra_producto
								WHERE comprobante_nro='$referencia'";

		$consulta_buscar_referencia=mysqli_query($this->conexion,$sql_buscar_referencia);
		$fila_buscar_referencia=mysqli_fetch_assoc($consulta_buscar_referencia);

		if($fila_buscar_referencia!=''){

		$sql="DELETE FROM usuario_compra_producto
			  WHERE comprobante_nro = '$referencia'";

		$consulta=mysqli_query($this->conexion,$sql);

		}
	}//function

	public function actualizarToken($email,$token){

			$stmt=$this->mysqli->prepare("UPDATE usuario SET token=(?)WHERE email=(?)");

			$stmt->bind_param("ss",$token,$email);

			$stmt->execute();

			$stmt->close();

	//	$sql="UPDATE usuario SET token='$token' WHERE email='$email'";
	//	$consulta=mysqli_query($this->conexion,$sql);

	}//

	public function buscarToken($token){

		$stmt=$this->mysqli->prepare("SELECT token
									  FROM usuario
									  WHERE token=(?)");

		$stmt->bind_param("s",$token);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila=$resultado->fetch_assoc();

		if($fila==''){
			return FALSE;
		}else{
			return TRUE;
		}

		$stmt->close();

	}


	public function insertarContrasenia($email,$contrasenia){


			$stmt=$this->mysqli->prepare("UPDATE usuario 
										  SET contrasenia=(?)
										  WHERE email=(?)");

			$stmt->bind_param("ss",$contrasenia,$email);

			$stmt->execute();

			$stmt->close();


		/*$sql="UPDATE usuario 
			  SET contrasenia='$contrasenia'
			  WHERE email='$email'";

		$consulta=mysqli_query($this->conexion,$sql) or die ("No se pudo insertar contraseña en la base de datos");*/

	}

	public function validarUsuario($email,$contrasenia){

		$stmt=$this->mysqli->prepare("SELECT contrasenia
									  FROM usuario
									  WHERE email=(?)");

		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$fila=$resultado->fetch_assoc();

		if($fila["contrasenia"]==$contrasenia){
			return TRUE;
		}else{
			return FALSE;
		}

		$stmt->close();

	}//function

public function listarTipoVehiculo(){

		$stmt=$this->mysqli->prepare("SELECT descripcion
									  FROM tipo_vehiculo");

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){
			echo "<option value='".$fila['descripcion']."'>".$fila['descripcion']."</option>";
		}


		$stmt->close();

	}//function

	public function listarRodado(){

		$stmt=$this->mysqli->prepare("SELECT descripcion
									  FROM rodado");

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){
			echo "<option value='".$fila['descripcion']."'>".$fila['descripcion']."</option>";
		}


		$stmt->close();

	}//function

	public function listarMarca(){

		$stmt=$this->mysqli->prepare("SELECT DISTINCT marca
									  FROM producto");

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){
			echo "<option value='".$fila['marca']."'>".$fila['marca']."</option>";
		}


		$stmt->close();

	}//function

	public function listarCategoria(){

		$stmt=$this->mysqli->prepare("SELECT descripcion
									  FROM categoria");

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){
			echo "<option value='".$fila['descripcion']."'>".$fila['descripcion']."</option>";
		}


		$stmt->close();

	}//function

	public function listarDescripcion($id_producto){


		$stmt=$this->mysqli->prepare("SELECT descripcion
									  FROM producto
									  WHERE id=(?)");
		$stmt->bind_param("i",$id_producto);

		$stmt->execute();

		$resultado=$stmt->get_result();

		while($fila=$resultado->fetch_assoc()){
			echo $fila['descripcion'];
		}


		$stmt->close();
	}

	public function buscarNombreDeUsuario($email){

			$stmt=$this->mysqli->prepare("SELECT nombre
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();


		echo $fila['nombre'];
	}

	public function buscarApellidoDeUsuario($email){

			$stmt=$this->mysqli->prepare("SELECT apellido
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();


		echo $fila['apellido'];
	}



	public function buscarNumeroDocumentoDeUsuario($email){

			$stmt=$this->mysqli->prepare("SELECT nro_doc
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();


		echo $fila['nro_doc'];
	}

		public function buscarCodigoAreaDeUsuario($email){

			$stmt=$this->mysqli->prepare("SELECT cod_area
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();


		echo $fila['cod_area'];
	}

		public function buscarTelefonoDeUsuario($email){

		$stmt=$this->mysqli->prepare("SELECT telefono
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();


		echo $fila['telefono'];
	}

		public function buscarCiudadDeUsuario($email){

		$stmt=$this->mysqli->prepare("SELECT ciudad_id
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila_ciudad_usuario=$resultado->fetch_assoc();


		$stmt=$this->mysqli->prepare("SELECT ciudad_nombre
									  FROM ciudad
									  WHERE id=(?)");

		$stmt->bind_param("i",$fila_ciudad_usuario['ciudad_id']);

		$stmt->execute();

		$resultado=$stmt->get_result();

		$stmt->close();

		$fila=$resultado->fetch_assoc();

		echo "<option value='".$fila['ciudad_nombre']."'selected>".$fila['ciudad_nombre']."</option>";
	}

	public function buscarCodigoPostalDeUsuario($email){


			$stmt=$this->mysqli->prepare("SELECT cp
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila=$resultado->fetch_assoc();

		echo $fila['cp'];



	}


		public function buscarCalleDeUsuario($email){


			$stmt=$this->mysqli->prepare("SELECT calle
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila=$resultado->fetch_assoc();

		echo $fila['calle'];



	}


		public function buscarAlturaDeUsuario($email){


			$stmt=$this->mysqli->prepare("SELECT altura
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila=$resultado->fetch_assoc();

		echo $fila['altura'];



	}

		public function buscarPisoDeUsuario($email){


			$stmt=$this->mysqli->prepare("SELECT piso
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila=$resultado->fetch_assoc();

		echo $fila['piso'];



	}


		public function buscarDepartamentoDeUsuario($email){


			$stmt=$this->mysqli->prepare("SELECT departamento
									  FROM usuario
									  WHERE email=(?)");
		$stmt->bind_param("s",$email);

		$stmt->execute();

		$resultado=$stmt->get_result();


		$fila=$resultado->fetch_assoc();

		if($fila['departamento']!=''){

			echo $fila['departamento'];

		}

	}



	

	public function listarTipoVehiculoParaBuscadorPorFiltros($tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto){

		$confirmacion_busqueda=0;
		$z=0;


		if($tipo_de_vehiculo!='valor_nulo' && $rodado=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										WHERE TV.descripcion=(?)");

			$stmt->bind_param("s",$tipo_de_vehiculo);

			$confirmacion_busqueda=1;


	}elseif($rodado!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?)");

			$stmt->bind_param("i",$rodado);

			$confirmacion_busqueda=1;


	}elseif($marca!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){
			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?)");

			$stmt->bind_param("s",$marca);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?)");

			$stmt->bind_param("s",$categoria);

			$confirmacion_busqueda=1;


	}elseif($ancho!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?)");

			$stmt->bind_param("i",$ancho);

			$confirmacion_busqueda=1;		


	}elseif($alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.alto=(?)");

			$stmt->bind_param("i",$alto);

			$confirmacion_busqueda=1;		


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo' && $marca=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?)");

			$stmt->bind_param("si",$tipo_de_vehiculo,$rodado);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo' && $rodado=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?)");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$marca);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("si",$tipo_de_vehiculo,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$alto!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("si",$tipo_de_vehiculo,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?)");

			$stmt->bind_param("is",$rodado,$marca);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("is",$rodado,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("ii",$rodado,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ii",$rodado,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("ss",$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("si",$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.alto=(?)");

			$stmt->bind_param("si",$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("si",$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("si",$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($ancho!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ii",$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?)");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$marca);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$categoria);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$ancho);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$alto!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$alto);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("sss",$tipo_de_vehiculo,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("iss",$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("isi",$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)");

			$stmt->bind_param("isi",$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("isi",$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("isi",$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("iii",$rodado,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("ssi",$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ssi",$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)");

			$stmt->bind_param("siss",$tipo_de_vehiculo,$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $alto!='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}






	elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $ancho!='valor_nulo' && $alto=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $alto!='valor_nulo' && $ancho=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("isii",$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $categoria !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $marca=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("isii",$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $categoria!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ssii",$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $tipo_de_vehiculo!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("ssii",$marca,$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho!='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $alto!='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sssii",$tipo_de_vehiculo,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("issii",$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)");

			$stmt->bind_param("sissii",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}






if($confirmacion_busqueda==1){
		$stmt->execute();

		$resultado=$stmt->get_result();
		
		while($fila=$resultado->fetch_assoc()){
			$z++;

			if($fila['tiene_descuento']==0){

					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
					<div class='producto-responsive'>


						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img  src=img/".$fila['imagen']." width='125' height='125'>
						
						<div class='producto-precio-responsive'>
						<h4>$".$fila['precio']."ARG</h4>
						</div>
						
						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>
						
						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>

						</div>
					</div>";
					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}

				}else if($fila['tiene_descuento']==1){
					$cien=100;
				
					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
						<div class='producto-responsive'>

						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img   src=img/".$fila['imagen']." width='125' height='125'>
						<div class='circulo-cont'><h3 class='producto-porcentaje-descuento'>".-floor(($fila['precio']-$fila['precio_descuento'])/$fila['precio']*$cien)."%</h3></div>

						<div class='producto-precio-responsive'>
						<h4><del>$".$fila['precio']."</del> $".$fila['precio_descuento']." ARG</h4>
						</div>

						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>

						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>
				
					</div>
					</div>";	

					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}
		
				}
		}//while
		
	

		$stmt->close();
}//if confirmacion_busqueda==1
}//function


	public function listarTipoVehiculoParaBuscadorPorFiltrosAscendente($tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto){

		$confirmacion_busqueda=0;
		$z=0;

		if($tipo_de_vehiculo!='valor_nulo' && $rodado=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										WHERE TV.descripcion=(?)
										ORDER BY PRO.precio ASC");

			$stmt->bind_param("s",$tipo_de_vehiculo);

			$confirmacion_busqueda=1;


	}elseif($rodado!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("i",$rodado);

			$confirmacion_busqueda=1;


	}elseif($marca!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){
			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("s",$marca);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("s",$categoria);

			$confirmacion_busqueda=1;


	}elseif($ancho!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("i",$ancho);

			$confirmacion_busqueda=1;		


	}elseif($alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("i",$alto);

			$confirmacion_busqueda=1;		


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo' && $marca=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$rodado);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo' && $rodado=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$marca);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$alto!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("is",$rodado,$marca);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("is",$rodado,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ii",$rodado,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ii",$rodado,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ss",$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("si",$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($ancho!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ii",$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$marca);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$categoria);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$ancho);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$alto!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$alto);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sss",$tipo_de_vehiculo,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("iss",$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isi",$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isi",$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isi",$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isi",$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("iii",$rodado,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssi",$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("siss",$tipo_de_vehiculo,$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $alto!='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}






	elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $ancho!='valor_nulo' && $alto=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $alto!='valor_nulo' && $ancho=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isii",$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $categoria !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $marca=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("isii",$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $categoria!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssii",$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $tipo_de_vehiculo!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("ssii",$marca,$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho!='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $alto!='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sssii",$tipo_de_vehiculo,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("issii",$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio ASC");

			$stmt->bind_param("sissii",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}






if($confirmacion_busqueda==1){
		$stmt->execute();

		$resultado=$stmt->get_result();
		
		while($fila=$resultado->fetch_assoc()){
			$z++;

		if($fila['tiene_descuento']==0){

					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
					<div class='producto-responsive'>


						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img  src=img/".$fila['imagen']." width='125' height='125'>
						
						<div class='producto-precio-responsive'>
						<h4>$".$fila['precio']."ARG</h4>
						</div>
						
						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>
						
						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>

						</div>
					</div>";
					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}

				}else if($fila['tiene_descuento']==1){
					$cien=100;
				
					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
						<div class='producto-responsive'>

						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img   src=img/".$fila['imagen']." width='125' height='125'>
						<div class='circulo-cont'><h3 class='producto-porcentaje-descuento'>".-floor(($fila['precio']-$fila['precio_descuento'])/$fila['precio']*$cien)."%</h3></div>

						<div class='producto-precio-responsive'>
						<h4><del>$".$fila['precio']."</del> $".$fila['precio_descuento']." ARG</h4>
						</div>

						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>

						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>
				
					</div>
					</div>";	

					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}
		
				}
		}//while producto-buscador-filtros
		
	

		$stmt->close();
}//if confirmacion_busqueda==1
}//function
public function listarTipoVehiculoParaBuscadorPorFiltrosDescendente($tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto){

		$confirmacion_busqueda=0;
		$z=0;

		if($tipo_de_vehiculo!='valor_nulo' && $rodado=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										WHERE TV.descripcion=(?)
										ORDER BY PRO.precio DESC");

			$stmt->bind_param("s",$tipo_de_vehiculo);

			$confirmacion_busqueda=1;


	}elseif($rodado!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("i",$rodado);

			$confirmacion_busqueda=1;


	}elseif($marca!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado =='valor_nulo' && $categoria=='valor_nulo' && $ancho=='valor_nulo' && $alto=='valor_nulo'){
			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("s",$marca);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("s",$categoria);

			$confirmacion_busqueda=1;


	}elseif($ancho!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("i",$ancho);

			$confirmacion_busqueda=1;		


	}elseif($alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $marca =='valor_nulo' && $rodado=='valor_nulo'  && $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("i",$alto);

			$confirmacion_busqueda=1;		


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo' && $marca=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$rodado);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo' && $rodado=='valor_nulo' && $categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$marca);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ss",$tipo_de_vehiculo,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$alto!='valor_nulo' && $rodado=='valor_nulo' && $marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$tipo_de_vehiculo,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("is",$rodado,$marca);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("is",$rodado,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ii",$rodado,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ii",$rodado,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ss",$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("si",$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($ancho!='valor_nulo'&& $alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ii",$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$marca);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$marca=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sis",$tipo_de_vehiculo,$rodado,$categoria);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$ancho);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$rodado!='valor_nulo'&&$alto!='valor_nulo'&&$marca=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$rodado,$alto);

			$confirmacion_busqueda=1;


	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$rodado=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sss",$tipo_de_vehiculo,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$tipo_de_vehiculo,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$rodado=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sii",$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$categoria!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("iss",$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isi",$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$marca!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isi",$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isi",$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isi",$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $marca=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("iii",$rodado,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$categoria!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssi",$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($categoria!='valor_nulo'&&$ancho!='valor_nulo'&&$alto!='valor_nulo'&&$tipo_de_vehiculo=='valor_nulo'&& $rodado=='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sii",$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("siss",$tipo_de_vehiculo,$rodado,$marca,$categoria);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $categoria=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $alto!='valor_nulo'&& $categoria=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$marca,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $marca=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $marca=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisi",$tipo_de_vehiculo,$rodado,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $alto!='valor_nulo'&& $rodado=='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sssi",$tipo_de_vehiculo,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}






	elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $ancho!='valor_nulo' && $alto=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $categoria=='valor_nulo' && $alto!='valor_nulo' && $ancho=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("issi",$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isii",$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $categoria !='valor_nulo'&& $ancho!='valor_nulo' && $alto!='valor_nulo' && $marca=='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("isii",$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $categoria!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssii",$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($marca !='valor_nulo'&& $tipo_de_vehiculo!='valor_nulo' && $ancho!='valor_nulo' && $alto!='valor_nulo' && $categoria=='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE PRO.marca=(?) AND TV.descripcion=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("ssii",$marca,$tipo_de_vehiculo,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $ancho!='valor_nulo' && $alto=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.ancho=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $categoria!='valor_nulo'&& $alto!='valor_nulo' && $ancho=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sissi",$tipo_de_vehiculo,$rodado,$marca,$categoria,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $categoria=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$marca,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $marca=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sisii",$tipo_de_vehiculo,$rodado,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $rodado=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sssii",$tipo_de_vehiculo,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo' && $tipo_de_vehiculo=='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("issii",$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}elseif($tipo_de_vehiculo!='valor_nulo' && $rodado!='valor_nulo' && $marca!='valor_nulo' && $categoria !='valor_nulo' && $ancho!='valor_nulo'&& $alto!='valor_nulo'){

			$stmt=$this->mysqli->prepare("SELECT PRO.id,PRO.marca,PRO.modelo,PRO.ancho,PRO.alto,PRO.imagen,PRO.precio,PRO.tiene_descuento,PRO.precio_descuento,PRO.origen,ROD.descripcion as rodado,TV.descripcion AS tipo_vehiculo,CAT.descripcion
										 FROM producto PRO JOIN categoria CAT ON PRO.id_categoria=CAT.id 
										 					JOIN tipo_vehiculo TV ON PRO.id_tipo_vehiculo=TV.id_tipo_vehiculo
										 					JOIN rodado ROD ON PRO.id_rodado=ROD.id_rodado
										 WHERE TV.descripcion=(?) AND ROD.descripcion=(?) AND PRO.marca=(?) AND CAT.descripcion=(?) AND  PRO.ancho=(?) AND PRO.alto=(?)
										 ORDER BY PRO.precio DESC");

			$stmt->bind_param("sissii",$tipo_de_vehiculo,$rodado,$marca,$categoria,$ancho,$alto);

			$confirmacion_busqueda=1;

	}






if($confirmacion_busqueda==1){
		$stmt->execute();

		$resultado=$stmt->get_result();
		
		while($fila=$resultado->fetch_assoc()){
			$z++;

	if($fila['tiene_descuento']==0){
				

					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
					<div class='producto-responsive'>


						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img  src=img/".$fila['imagen']." width='125' height='125'>
						
						<div class='producto-precio-responsive'>
						<h4>$".$fila['precio']."ARG</h4>
						</div>
						
						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>
						
						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>

						</div>
					</div>";
					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}

				}else if($fila['tiene_descuento']==1){
					$cien=100;
				
					if($z==1){
						echo "<div class='producto-row row'>";
						echo "<div class='container'>";
					}
				
					echo "<div class='col-xs-15 col-sm-15 col-md-15 col-lg-15'>
						<div class='producto-responsive'>

						<h3 class='titulo-buscador'>".$fila['marca']." <br><span> ".$fila['modelo']."</span></h3>


						<img   src=img/".$fila['imagen']." width='125' height='125'>
						<div class='circulo-cont'><h3 class='producto-porcentaje-descuento'>".-floor(($fila['precio']-$fila['precio_descuento'])/$fila['precio']*$cien)."%</h3></div>

						<div class='producto-precio-responsive'>
						<h4><del>$".$fila['precio']."</del> $".$fila['precio_descuento']." ARG</h4>
						</div>

						<ul>
						<li>Medida:".$fila['ancho']." x ".$fila['alto']."</li>
						<li>Rodado:".$fila['rodado']."</li>
						<li>Vehiculo:".$fila['tipo_vehiculo']."</li>
						<li>Categoria:".$fila['descripcion']."</li>
						</ul>

						<div class='paralelogramo-btn-responsive'><a href='vermasproducto.php?id=".$fila['id']."'>Ver mas</a></div>
				
					</div>
					</div>";	

					if($z==5){
						echo "</div>";
						echo "</div>";
						$z=0;
					}
		
				}
		}//while
		
	

		$stmt->close();
}//if confirmacion_busqueda==1
}//function



}// CLASS

?>