<?php 
require_once("../clases/BaseDatos.php");
$bd=new BaseDatos();


$bd->listarTipoVehiculoParaBuscadorPorFiltros($_POST['tipo_de_vehiculo'],$_POST['rodado'],$_POST['marca'],$_POST['categoria'],$_POST['ancho'],$_POST['alto']);



 ?>