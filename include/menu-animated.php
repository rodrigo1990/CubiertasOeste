<div class="animated bounceInLeft row">

		<div class="direccion-menu hidden-xs col-sm-12 col-md-12 col-lg-12">
			<div class="container">
				<!--  --><h6 class="h6-direccion-envio-menu"><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">phone</i>TEL:4627-8900 <span id="separadorDireccionMenu">|</span><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">room</i>Acceso Oeste 1924 Ituzaingo - GBA</h6>
			</div><!-- container -->
		</div><!-- direccion-menu col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

		 <!-- <div class="direccion-menu-cel col-xs-12 hidden-sm hidden-md hidden-lg">
			<div class="container">
			<h6 class="h6-direccion-envio-menu-cel"><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">phone</i>TEL:4627-8900 <span id="separadorDireccionMenu"> | </span><i class="material-icons md-light md-18 material-icons vertical-align-middle padding-bottom-3">room</i>Acceso Oeste 1924 Ituzaingo - GBA</h6>
		</div> --><!-- container -->


	</div><!-- row -->




	<div class="animated bounceInDown row" id="menu-fixed" >

		<div class="menu hidden-xs col-sm-12 col-md-12 col-lg-12">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" onClick="window.location='index.php'" width="210">
				
				<img src="elementos_separados/icon-mas.png" class="element-menu vertical-align-middle  img-responsive" id="icon-mas-menu" width="15">
				
				<h4 class="h4-producto-title-menu element-menu vertical-align-middle " id="producto-title-menu">Producto</h4>

				<div class="element-menu-buscador " id="buscador-menu">
					<form action="" method=""><!-- form buscador -->

					<div class="campo-busqueda-menu inner-addon right-addon">
						<i class="material-icons md-light ">search</i>
						<input type="text" class="form-control campo-busqueda-menu" id="busqueda_cubiertas" placeholder="Busca tu producto" onKeyUp="buscarCubiertas()" size="40%">
					</div>
						<div id="resultadoBusqueda"></div><!-- resultado del buscador -->

					</form><!-- cierre: buscador form -->
				</div><!-- buscador-menu -->
				
				

				
				<div class="element-menu-carrito" id="mostrar-total-menu">
					<h6><i><strong>Mi Carrito</strong></i></h6>
					<p id="total">$<?php $usuario->mostrarSubtotal();?></p>

				</div><!-- mostrar-total-menu -->

				<div id="btn-carrito" class="element-menu-carrito">
					 
					<div   class="icon-shopping-cart"><span id="cantidad"> <strong id="cantidad-strong"><?php $usuario->mostrarCantidad();?></strong></span> </div>
				</div>
			

				
			</div><!-- container -->

		</div><!-- menu -->


		<!-- CELULAR !! -->
		<div class="menu col-xs-12 hidden-sm hidden-md hidden-lg">
			<div class="container">

				<img src="elementos_separados/logo.png" class="element-menu img-responsive" id="logo-menu" width="210">
				
				

				<div class="element-menu" id="buscador-menu">
					<form action="" method=""><!-- form buscador -->

					<div class="campo-busqueda-menu inner-addon right-addon">
						<i class="material-icons md-light ">search</i>
						<input type="text" class="form-control campo-busqueda-menu" id="busqueda_cubiertas" placeholder="Busca tu producto" onKeyUp="buscarCubiertas()" size="20">
					</div>
						<div id="resultadoBusqueda"></div><!-- resultado del buscador -->

					</form><!-- cierre: buscador form -->
				</div><!-- buscador-menu -->

				<div class="element-menu" id="mostrar-total-menu">
					<h6><i><strong>Mi Carrito</strong></i></h6>
					<p id="total">$<?php $usuario->mostrarTotal();?></p>

				</div><!-- mostrar-total-menu -->
			

				<div class="element-menu-carrito-cel ">
					 
					<div class="icon-shopping-cart"><span id="cantidad"> <strong id="cantidad-strong"><?php $usuario->mostrarCantidad();?></strong></span> </div>
				</div>
			</div><!-- container -->

		</div><!-- menu -->
	</div><!-- row  -->