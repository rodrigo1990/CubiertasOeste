/////////////FUNCIONES DE CARRITO
var i=0;
$(document).ready(function() {

 document.getElementById("carrito").style.display = "none";

		$( "#btn-carrito").click(function() {

			if(i==1){
			$("#carrito").removeClass("animated");
			$("#carrito").removeClass("fadeOutUp");
			$("#carrito").addClass("animated");
			$("#carrito").addClass("slideInDown");
			}

		 	 document.getElementById("carrito").style.display = "block";

		});	

});// ready


function cerrarVentanaCarrito() {
	
  	$("#carrito").removeClass("animated");
	$("#carrito").removeClass("slideInDown");
	$("#carrito").addClass("animated");
	$("#carrito").addClass("zoomOut");

	i=1;
 	 document.getElementById("carrito").style.display = "none";

}



function borrarDeCarrito(id){

				$.ajax({
				data:"id="+ id,
				url:'ajax/borrarDeCarrito.php',
				type:'get',
				success:function(response){
				//$(".carrito").html(response);
				//alert(response);
				//window.location="index.php?session=true";
				$("#carrito-lista").html(response);

					$.ajax({
					url:'ajax/mostrarCantidad.php',
					success:function(response){

					$("#cantidad-strong").html(response);

					$.ajax({
					url:'ajax/mostrarTotalIndex.php',
					success:function(response){

					$("#total").html(response);



					}
					});	

					}
					});




				}
				});
	}