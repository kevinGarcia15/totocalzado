<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Nueva inserción</title>
</head>
<body>
<div id="container">
	<header>
	</header>
	<div class="page-content p-5" id="content">
		<div>
			<br>
			<?php $this->load->view('navVertical'); ?>
				<h1>Vender</h1>
				<form action="<?=$base_url?>/venta/nuevaVenta/" method="POST">
				<br>
				<div class="row">
					<div class="col-8"><strong>Buscador:</strong> Ingrese la marca del producto
						<input onkeyup="BtnBuscarProducto()" id="texto" class="form-control" type="text" placeholder="Marca">
					</div>
				</div>
				<div class="row">
					<div class="col-10" id="buscador">
					</div>
				</div><br><br>
				<div class="table-responsive">
				<table class="table table-bordered" style="color: #000;" id="tablaVenta">
					<thead>
						<tr>
							<th><div class="sizeTable">Código</div></th>
							<th><div class="sizeTableXL">Descripción del producto</div></th>
							<th><div class="sizeTable">Número</div></th>
							<th>Cantidad</th>
							<th><div class="sizeTable">precio unidad</div></th>
							<th><div class="sizeTable">Subtotal</div></th>
							<th>Quitar</th>
						</tr>
					</thead>
					<tbody>
						<tr id="fila">
							<td>
								<input required
									onchange="buscar_codigo(id='codigo0',0)"
									id="codigo0"
									class="form-control"
									type="text"
									name="codigo[]"
									value=""
									placeholder="Código">
							</td>
							<td id="descripcion0"></td>
							<td>
								<select class="custom-select" required name="numero[]" id="numero0">
									<option value="">Seleccionar</option>
								</select>
							</td>
							<td>
								<input
									id="cantidad0"
									class="form-control"
									onchange="totales(0)"
									min="1"
									type="number"
									required
									name="cantidad[]"
									value="1"
									placeholder="Cantidad">
							</td>
							<td>
								<input
									id="precio0"
									class="form-control"
									onchange="totales(0)"
									type="number"
									required
									name="precioUnidad[]"
									value=""
									placeholder="precio">
							</td>
							<td id="subtotal0">Q. 0</td>
						</tr>
					</tbody>
				</table>
				
			</div>
				<div class="row">
					<div class="col-11">
						<h3 id="total">Total: </h3>
					</div>
					<div class="col-1">
						<button type="button" id="btnAgregar" class="btn btn-primary"><i class='fas fa-plus'></i></button>
					</div>
				</div>
					<div class="row">
						<div class="col-12">
							<input name="total" type="hidden" value="<?php ?>">
							<button type="submit" name="guardar" class="btn btn-success">Guardar <i class='fa fa-hdd-o'></i></button>
							<button id="cancelar" class="btn btn-danger">Cancelar <i class='fa fa-times'></i></button>
						</div>
					</div>
					<br><br><br><br>
				</form>
			</div>
	</div>
</div>
<script type="text/javascript">
var contador = 1;
var totalVenta = 0;

var buscar_codigo = function(id,desc) {
	var codigo_prod = $("#"+id).val();

	var request = $.ajax({
		method: "POST",
		url: "<?=$base_url?>/venta/buscar_codigo",
		data: {codigo_producto: codigo_prod}
	});

	request.done(function(resultado) {
		$('#descripcion'+desc).html(resultado);
		$(function(){
			$.post('<?=$base_url?>/venta/numeros',{codigo: codigo_prod}).done(function(respuesta){
				$('#numero'+desc).html(respuesta);
			});
		})
	});
}
//BtnBuscarPRoducto
var BtnBuscarProducto = function() {
	var argumento = $("#texto").val();

	var request = $.ajax({
		method: "POST",
		url: "<?=$base_url?>/venta/buscarProducto",
		data: {buscar_prod: argumento}
	});

	request.done(function(resultado) {
		$('#buscador').html(resultado);
	});
}
//switalert para el boton eliminar
function eliminar(indice){
	swal({
  title: "Estas seguro?",
  text: "Una vez eliminado, no podrás revertir la acción!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
		$("#fila"+indice).remove();
  } else {
    swal("El producto no se ha eliminado!");
  }
});
}

function totales(indice){
	var cantidad = $('#cantidad'+indice).val();
	var precio = $('#precio'+indice).val();

	var subtotal = cantidad * precio;
	$('#subtotal'+indice).text('Q.'+ subtotal);
	totalVenta = totalVenta + subtotal;
	$('#total').text('Q.'+totalVenta);
}

$(document).ready(function(){
	$("#btnAgregar").click(function(){
		$("#tablaVenta")
			.append
			(
				$('<tr>').attr('id','fila'+contador)
				.append
				(
					$('<td>')
					.append
					(
						$('<input>').attr('onchange','buscar_codigo(id,'+contador+')').attr('id','codigo'+contador).attr('type', 'text').addClass('form-control').attr('placeholder', 'Código').attr('name', 'codigo[]').attr('value','')
					)
				)
//------------descripcion
				.append
				(
					$('<td>').attr('id','descripcion'+contador)
				)
//------------fin del selector
//------------otro selector de los números
				.append
				(
					$('<td>')
						.append
						(
							$('<select>').addClass('custom-select').attr('name','numero[]').attr('id','numero'+contador)
							.append
							(
								$('<option>').attr('value','').text('Seleccionar')
							)
						)
				)
//------------fin del selector
//------------input cantidad
				.append
				(
					$('<td>')
						.append
						(
							$('<input>').attr('id','cantidad'+contador).addClass('form-control').attr('onchange','totales('+contador+')').attr('min','1').attr('type', 'number').attr('name', 'cantidad[]').attr('value', '1')
						)
				)
//------------fin del selector
//------------input precio
				.append
				(
					$('<td>')
						.append
						(
							$('<input>').attr('id','precio'+contador).addClass('form-control').attr('onchange','totales('+contador+')').attr('min','0').attr('type', 'number').attr('name', 'precioUnidad[]').attr('value', '').attr('placeholder','precio')
						)
				)
//------------fin
//------------mostrar subtotal
				.append
				(
					$('<td>').attr('id','subtotal'+contador).text('Q. 0')
				)
//------------fin del selector
//------------icono de eliminar
				.append
				(
					$('<td>')
					.append
					(
						$('<a>').addClass('btn btn-danger').attr('onclick','eliminar('+contador+')')
						.append
						(
							$('<i>').addClass('fa fa-trash')
						)
					)
				)
//------------fin del selector
			);
			contador = contador + 1;
	});
});

//---------cancelar venta-------------
$("#cancelar").click(function(){
		swal({
		title: "Estas seguro?",
		text: "Una vez cancelado, se perderán todos los datos!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			window.location.replace("<?=$base_url?>/inicio");
		} else {
			swal("La acción fué cancelada!");
		}
	});
});
 </script>
</body>
</html>
