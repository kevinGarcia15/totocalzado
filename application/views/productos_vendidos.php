<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$totalDia = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<title>productos vendidos</title>
</head>
<body>
	<header>
	</header>
	<div class="page-content p-5" id="content">
		<br>
		<?php $this->load->view('menu'); ?>

	<div class="col-xs-12">
		<h1>Ventas realizadas</h1>
		<div>
			<a class="btn btn-success" href="./nuevaVenta">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
			<div class="table-responsive-xl">
				<table class="table table-bordered table-color">
				<thead>
					<tr>
						<th><div class="sizeTable">Fecha</div></th>
						<th>Productos vendidos</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
								<select class="custom-select" onchange="mostrarProductos()" name="fecha" id="fechasSelect">
										<option value="">seleccionar</option>
								</select>
								<div id="fechaNombre"></div>
						</td>
						<td>
							<table class="table table-bordered table-color">
								<thead>
									<tr>
										<th><div class="sizeTable">Código</div></th>
										<th><div class="sizeTableXL">Descripción</div></th>
										<th><div class="sizeTable">Costo C/U</div></th>
										<th>Cantidad</th>
										<th><div class="sizeTable">Sub-total</div></th>
										<th><div class="sizeTable">Total</div></th>
									</tr>
								</thead>
								<tbody id="producto">
									<?php foreach($ventas as $venta){ ?>
										<?php $totalDia = $totalDia + $venta['total'];?>
									<tr>
										<td><?php echo $venta['codigo']; ?></td>
										<td><?php echo $venta['marca'].' '.$venta['estilo'].' '.$venta['color'].' '.$venta['categoria']; ?></td>
										<td><?php echo 'Q. '.$venta['unidad']; ?></td>
										<td><?php echo $venta['cantidad']; ?></td>
										<td><?php echo 'Q. '.$venta['total']; ?></td>
										<td><?php echo 'Q. '.$totalDia; ?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	  <?php $this->load->view('footer'); ?>
</div>
<script type="text/javascript">
//muestra antes de cargar la pàgina
$(window).load(function() {
	swal("Seleccione una fecha!");
});
//
function mostrarProductos(){
	var fecha = $("#fechasSelect").val();

		var request = $.ajax({
			method: "POST",
			url: "<?=$base_url?>/venta/productosVendidosFecha",
			data: {
						fechaPeticion: fecha
					}
		});
		request.done(function(resultado){
		 	let date = new Date(fecha.replace(/-+/g, '/'));

		 	let options = {
			 weekday: 'long',
			 year: 'numeric',
			 day: 'numeric',
			 month: 'long'
		 };
		 let fechaConNombre = date.toLocaleDateString('es-MX', options);
			swal("Ventas del día", fechaConNombre, "success");
				$('#fechaNombre').html(fechaConNombre);
				$('#producto').html(resultado);
		});
}

	$(function(){
		$.post('<?=$base_url?>/venta/seleccionarFechas').done(function(respuesta){
			$('#fechasSelect').html(respuesta);
		});
	})
</script>
</body>
</html>
