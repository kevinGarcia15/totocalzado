<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('header'); ?>
		<title>nuevo producto</title>
	</head>
	<body>
		<!-- Page content holder -->
	<div class="page-content p-5" id="content">
		<br>
		<?php $this->load->view('navVertical'); ?>
		<form class="" action="<?=$base_url?>/producto/nuevo/" method="post" enctype="multipart/form-data">
				  <!-- Demo content -->
		<br>
		<h4 style="font-family: Vegur, 'PT Sans', Verdana, sans-serif;">Ingresar Nuevo Producto</h4><br>
		<!-- input-->
		<label class="form-control-label" for="inputDanger1">Ingrese código que identificará el producto</label>
		<div class="row">
			<div class="col-10">
				<input type="text" required class="form-control" placeholder="Código del producto" name="codigo" value="">
			</div>
		</div>
		<label class="form-control-label" for="inputDanger1">Seleccione marca del calzado</label>
		<div class="row">
			<div class="col-10">
				<select class="custom-select" required name="marca" id="marca">
					<option value="">Seleccionar</option>
				</select>
			</div>
			<div class="col-2">
				<button type="button" data-toggle="modal" data-target="#IngresoMarca" data-whatever="@mdo" class="btn btn-primary"><i class='fas fa-plus'></i></button>
			</div>
			</div>
			<label class="form-control-label" for="inputDanger1">Seleccione estilo</label>
			<div class="row">
				<div class="col-10">
					<select class="custom-select" required name="estilo" id="estilo">
							<option value="">Seleccionar</option>
					</select>
				</div>
				<div class="col-2">
					<button
						type="button"
						data-toggle="modal"
						data-target="#IngresoEstilo"
						data-whatever="@mdo" 
						class="btn btn-primary">
						<i class='fas fa-plus'></i>
					</button>
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1">Seleccione la numeración</label>
			<div class="row">
				<div class="col-10">
					<select class="custom-select" required name="numeracion" id="numeracion">
							<option value="">Seleccionar</option>
					</select>
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1">Seleccione el color del calzado</label>
			<div class="row">
				<div class="col-10">
					<select class="custom-select" required name="color" id="color">
							<option value="">Seleccionar</option>
					</select>
				</div>
				<div class="col-2">
					<button
						type="button"
						data-toggle="modal"
						data-target="#IngresoColor"
						data-whatever="@mdo"
						class="btn btn-primary">
						<i class='fas fa-plus'></i>
					</button>
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1">Seleccione el departameto</label>
			<div class="row">
				<div class="col-10">
					<select class="custom-select" required name="genero" id="genero">
							<option value="">Seleccionar</option>
					</select>
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1">Ingrese el precio al público</label>
			<div class="row">
				<div class="col-10">
					<input type="number"  step="any" min="0"class="form-control" placeholder="Precio" required name="precio_compra"  value="">
				</div>
			</div><br><hr>

<!--input url imagenes-->
			<h4>Ingrese las url para cargar las imagenes</h4>
			<label class="form-control-label" for="inputDanger1"></label>
			<div class="row">
				<div class="col-10">
					<input type="text" class="form-control" placeholder="URL 1" required name="url_1"  value="">
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1"></label>
			<div class="row">
				<div class="col-10">
					<input type="text" class="form-control" placeholder="URL 2" required name="url_2"  value="">
				</div>
			</div>
			<label class="form-control-label" for="inputDanger1"></label>
			<div class="row">
				<div class="col-10">
					<input type="text" class="form-control" placeholder="URL 3" required name="url_3"  value="">
				</div>
			</div>
			<hr>

			<h4>Datos opcionales</h4>
			<label class="form-control-label" for="inputDanger1">Ingrese el precio por mayor</label>
			<div class="row">
				<div class="col-10">
					<input type="number" step="any" min="0"class="form-control" placeholder="Precio Mayoreo (Opcional)" name="Precio_mayoreo"  value="">
				</div>
			</div>
<!--			<label class="form-control-label" for="inputDanger1">Seleccione una foto de referencia</label>
			<div class="row">
				<div class="col-10">
					<input type="file" class="fform-control-file" name="foto" value="<?php $estilo ?>">
				</div>
		</div>  -->
		<label for="exampleFormControlTextarea1">Observaciones</label>
		<div class="row">
			<div class="col-10">
    		<textarea class="form-control" name="observaciones" maxlength="50" rows="3"></textarea>
			</div>
		</div>
		<td colspan="2">
			<input class="btn btn-primary btn-md"  role="button" id="continuar" type="submit" name="continuar" value="continuar">
			<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
		</td>
	</div>
</form>
<br><br><br><br>
<?php $this->load->view('ingresoEstilo'); ?><!--ventana emergente para ingreasr un nuevo estilo-->
<!-- inicio del formulario emergente para ingresar marca-->
<div class="modal fade" id="IngresoMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva Marca</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="subir" action="<?=$base_url?>/producto/nuevaMarca/" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese la marca del calzado</label>
						<input type="text" required class="form-control" id="recipient-name" name="marca" value="<?php $marca ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
						<button  type="submit" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Fin ventana emergente-->
<!-- inicio del formulario emergente para ingresar color nuevo-->
<div class="modal fade" id="IngresoColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Color</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese un nuevo color</label>
						<input type="text" required class="form-control" id="nuevo_color" name="color" value="<?php $color ?>">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
						<button  onclick="nuevoColor()" data-dismiss="modal" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- Fin ventana emergente-->
</body>

<script type="text/javascript">
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/producto/marca').done(function(respuesta){
		$('#marca').html(respuesta);
	});

	//lista de municipios
	$('#marca').change(function(){
		var id_marca = $(this).val();

		$.post('<?=$base_url?>/producto/estilo',{marca: id_marca}).done(function(respuesta){
			$('#estilo').html(respuesta);
		});
	});
})

	//funcion Ajax para buscar en base de datos la numeracion
		$(function(){
			$.post('<?=$base_url?>/producto/numeracion').done(function(respuesta){
				$('#numeracion').html(respuesta);
			});
		})
	//funcion Ajax para buscar en base de datos el color
		$(function(){
			$.post('<?=$base_url?>/producto/color').done(function(respuesta){
				$('#color').html(respuesta);
			});
		})
	//funcion Ajax para buscar en base de datos a los proveedores
		$(function(){
			$.post('<?=$base_url?>/producto/proveedor').done(function(respuesta){
				$('#proveedor').html(respuesta);
			});
		})
	//funcion Ajax para buscar en base de datos los generos
		$(function(){
			$.post('<?=$base_url?>/producto/genero').done(function(respuesta){
				$('#genero').html(respuesta);
			});
		})

		function nuevoProveedor(){
			//validar No. de CUI
			var nombre = $("#nombre_proveedor").val();
			var telefono = $("#telefono_proveedor").val();
			var direccion = $("#direccion_proveedor").val();

			if (nombre == "" || telefono == "" || direccion == "") {
				$("#mensaje").addClass("alert alert-danger");
				$("#mensaje").text("No se pudo insertar los elementos");
			}else {
				var request = $.ajax({
					method: "POST",
					url: "<?=$base_url?>/producto/nuevoProveedor",
					data: {
								nombre_proveedor: nombre,
								telefono_proveedor: telefono,
								direccion_proveedor: direccion
							}
				});
				request.done(function(){
					$(function(){
						$("#nombre_proveedor").val("");
						$("#telefono_proveedor").val("");
						$("#direccion_proveedor").val("");
				});
					$.post('<?=$base_url?>/producto/proveedor').done(function(respuesta){
						$('#proveedor').html(respuesta);
						swal("¡Bien!", "datos ingresados exitosamente", "success");
					});
				});
			}
		}
//nuevo color
		function nuevoColor(){
		  var nombre = $("#nuevo_color").val();

		  if (nombre == "") {
		    $("#mensaje").addClass("alert alert-danger");
		    $("#mensaje").text("No se pudo insertar el elemento");
		  }else {
		    var request = $.ajax({
		      method: "POST",
		      url: "<?=$base_url?>/producto/nuevoColor/",
		      data: {
		            color: nombre
		          }
		    });
		    request.done(function(){
		      $(function(){
		        $("#color").val("");
		      });
		      $.post('<?=$base_url?>/producto/color').done(function(respuesta){
		        $('#color').html(respuesta);
		      });
		    });
				swal("¡Bien!", "datos ingresados exitosamente", "success");
		  }
		}
</script>
</html>
