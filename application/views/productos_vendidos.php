<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$totalDia = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/productos_vendidos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<title>productos vendidos</title>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="page-content" id="content">
	<div class="col-xs-12">
		<h2 class="font-color-white">Ventas realizadas</h2>
		<div>
			<a class="btn btn-success" href="./nuevaVenta">Nueva venta<i class="fa fa-plus"></i></a>
		</div>
		<br>
			<div class="table-responsive-xl">
				<table class="table table-bordered table-color">
				<thead class="font-color-white">
					<tr>
						<th><div class="headTable-L">Fecha</div></th>
						<th>Productos vendidos</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
								<select class="custom-select" onchange="mostrarProductos()" name="fecha" id="fechasSelect">
										<option value="">seleccionar</option>
								</select>
								<div id="fechaNombre" class="font-color-white"></div>
						</td>
						<td>
							<table class="table table-bordered table-color">
								<thead>
									<tr>
										<th><div class="headTable-m">Código</div></th>
										<th><div>Número</div></th>
										<th><div class="headTable-XL">Descripción</div></th>
										<th><div class="headTable-m">Costo C/U</div></th>
										<th>Cantidad</th>
										<th><div class="headTable-m">Sub-total</div></th>
										<th><div class="headTable-m">Total</div></th>
									</tr>
								</thead>
								<tbody id="producto">
									<?php foreach($ventas as $venta){ ?>
										<tr>
											<td><?=$venta['codigo']?></td>
											<td><?=$venta['talla']?></td>
											<td><?=$venta['marca'].' '.$venta['estilo'].' '.$venta['color']?></td>
											<td><?=$venta['unidad']?></td>
											<td><?=$venta['cantidad']?></td>
											<td><?=$venta['total']?></td>
										</tr>
										<?php $totalDia = $totalDia + $venta['total'];?>
								<?php } ?>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>
<script type="text/javascript">
//muestra antes de cargar la pàgina
$(window).load(function() {
	Swal.fire("Seleccione una fecha!");
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
			Swal.fire("Ventas del día", fechaConNombre, "success");
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
