<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('header'); ?>
		<title>Inicio</title>
	</head>
		<?php $this->load->view('menu'); ?>
<div class="page-content p-5" id="content">
	<?php $this->load->view('navVertical'); ?>

		<?php $this->load->view('carusel'); ?>
		<!-- Page content holder -->
		<div class="card-group text-center" id="content">
			<div class="col-md-3 col-lg-3">
					<div class="card m-3">
							<img class="card-img-top mb-3"  style="width:50%;padding-left: 0px;margin-left: 60px;" src="<?=$base_url?>/recursos/img/nuevo_producto.png" alt="Card image cap">
							<div class="card-block">
								 <h4 class="card-title">Ingresar</h4>
									<p class="card-text p-2">Nuevo producto</p>
									<!-- Large modal -->
								 <a class="btn btn-warning" href="<?=$base_url?>/producto/nuevo" role="button" ><img src="<?=$base_url?>/recursos/img/ir.png"></a>
							</div>
							<br>
					</div>
			</div>
			<div class="col-md-3 col-lg-3">
					<div class="card m-3">
							<img class="card-img-top mb-3" style="width:79%;padding-left: 0px;margin-left: 36px;" src="<?=$base_url?>/recursos/img/nueva_venta.jpg" alt="Card image cap">
							<div class="card-block">
								 <h4 class="card-title">Venta</h4>
									<p class="card-text p-2">Nueva venta</p>
									<!-- Large modal -->
								 <a class="btn btn-warning" href="<?=$base_url?>/venta/nuevaVenta" role="button"><img src="<?=$base_url?>/recursos/img/ir.png"></a>
							</div>
							<br>
					</div>
			</div>
			<div class="col-md-3 col-lg-3">
					<div class="card m-3">
							<img class="card-img-top mb-3" style="width:70%;padding-left: 0px;margin-left: 36px;" src="<?=$base_url?>/recursos/img/inventario.jpg" alt="Card image cap" >
							<div class="card-block">
									<h4 class="card-title">Inventario</h4>
									<p class="card-text p-2">Mostrar inventario</p>
									<!-- Large modal -->
								 <a class="btn btn-warning" href="<?=$base_url?>/informes/mostrar" role="button"><img src="<?=$base_url?>/recursos/img/ir.png"></a>
							</div>
							<br>
					</div>
			</div>
			<div class="col-md-3 col-lg-3">
					<div class="card m-3">
							<img class="card-img-top mb-3" style="width:70%;padding-left: 0px;margin-left: 56px;" src="<?=$base_url?>/recursos/img/productos_vendidos.jpg" alt="Card image cap" >
							<div class="card-block">
									<h4 class="card-title">Hoy</h4>
									<p class="card-text p-2">Productos vendidos</p>
									<!-- Large modal -->
								 <a class="btn btn-warning" href="<?=$base_url?>/venta/productosVendidosHoy" role="button"><img src="<?=$base_url?>/recursos/img/ir.png"></a>
							</div>
							<br>
					</div>
			</div>
		</div>
</div>
</html>
