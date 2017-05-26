




///////////////////////////////////////////////MENU FIXED

$(window).load(function(){
	      $("#menu-fixed").sticky({ topSpacing: 0 });
	    });

$(window).load(function(){
	      $("#buscador-fixed").sticky({ topSpacing: 55 });
	    });






function borrarDeCarritoCheckOut(id){

				$.ajax({
				data:{id:id,session:"true"},
				url:'ajax/borrarDeCarritoCheckOut.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);
				
					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});



				}
				});
	}

function buscarCubiertas(){

	var cubiertaBuscada = $("#busqueda_cubiertas").val();

		if(cubiertaBuscada != ''){

			$.ajax({
			data:"cubiertaBuscada="+ cubiertaBuscada,
			url:'ajax/busquedaCubiertas.php',
			type:'get',
			success:function(response){
			//alert(response);
			document.getElementById("resultadoBusqueda").style.display = "block";
			$("#resultadoBusqueda").html(response)

			}
			});

		}else{
			document.getElementById("resultadoBusqueda").style.display = "none";

		}
}

function registrarUsuario(nombre,apellido,tipo_dni,dni,email,cod_area,telefono,provincia,ciudad,cp,calle,altura,piso,departamento,total,referencia){
				
			$.ajax({
			data:{nombre:nombre,apellido:apellido,tipo_dni:tipo_dni,dni:dni,email:email,cod_area:cod_area,telefono:telefono,provincia:provincia,ciudad:ciudad,cp:cp,calle:calle,altura:altura,piso:piso,departamento:departamento,total:total,referencia:referencia},
			url:'ajax/registrarUsuario.php',
			type:'post',
			success:function(response){

				if(response==1){
					window.location.href = "index.php";
				}else{
					alert(response);
				}
			}
			});


		}

function registrarUsuarioSinEnvio(nombre,apellido,tipo_dni,dni,email,cod_area,telefono,total,referencia){
				
			$.ajax({
			data:{nombre:nombre,apellido:apellido,tipo_dni:tipo_dni,dni:dni,email:email,cod_area:cod_area,telefono:telefono,total:total,referencia:referencia},
			url:'ajax/registrarUsuarioSinEnvio.php',
			type:'post',
			success:function(response){

				if(response==1){
					window.location.href = "index.php";
				}else{
					alert(response);
				}
			}
			});


		}

		function eliminarPagoFallido(referencia){

				$.ajax({
				data:{referencia:referencia},
				url:'ajax/eliminarPagoFallido.php',
				type:'post',
				success:function(response){
				}
				});
		}

		function actualizarCantidad1(id){

	var cantidad= $("#cantidad1").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}

function actualizarCantidad2(id){

	var cantidad= $("#cantidad2").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad3(id){

	var cantidad= $("#cantidad3").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}

function actualizarCantidad4(id){

	var cantidad= $("#cantidad4").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad5(id){

	var cantidad= $("#cantidad5").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad6(id){

	var cantidad= $("#cantidad6").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad7(id){

	var cantidad= $("#cantidad7").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad8(id){

	var cantidad= $("#cantidad8").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad9(id){

	var cantidad= $("#cantidad9").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}
function actualizarCantidad10(id){

	var cantidad= $("#cantidad10").val();
	var session="true"

				$.ajax({
				data:{cantidad:cantidad,id:id,session:session},
				url:'ajax/actualizarCantidad.php',
				type:'get',
				success:function(response){
				$("#carrito-CheckOut").html(response);

					$.ajax({
					data:"session=true",
					url:'ajax/mostrarTotal.php',
					type:'get',
					success:function(response){

						$("#comprar-total").html(response);



					}
					});


				}
				});

}



	function validarUsuario(){

		var email=$("#email").val();
		var contrasenia=$("#contrasenia").val();
	
			$.ajax({

				data:{email:email,contrasenia:contrasenia},
				url:'ajax/validarUsuario.php',
				type:'post',
				success:function(response){
					if(response=="TRUE"){
						window.location ="usuario.php?email="+email+"";

					}else{
					$("#validarUsuario-form-alert").css("display","block");
					}

				}
				});
	}



     function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          return (tecla != 13);
     }