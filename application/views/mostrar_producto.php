<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Incersion no fué realizada!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<style media="screen">
		body{
			color:white;
		}
		.border{
			border: 3px solid;
			border-radius: 10px;
			margin: 0 5px;
		}
		.table_Width{
			width: 90%;
		}
		.sizeTable_md{
			width: 80px;
		}
	@media only screen and (max-width: 600px) {
	.border{
		margin: 5px 0;
	}
}
	</style>
	<title>Estilos</title>
</head>
<body>
	<header>
		<?php $this->load->view('menu'); ?>
	</header>
	<div class="page-content p-5" id="content">
		<?php foreach ($arr as $key) {?>
			<div class="row justify-content-md-center">
				<div class="col-12 col-xl-4 col-ms-12 border">
					<h4>Datos del producto</h4><br>
					<table class="table-color table_Width">
						<tbody>
							<tr>
								<td><strong>Código del producto: </strong></td>
								<td><?=$key['codigo']?></td>
							</tr>
							<tr>
								<td><strong>Marca: </strong></td>
								<td><?=$key['marca']?></td>
							</tr>
							<tr>
								<td><strong>Estilo: </strong></td>
								<td><?=$key['estilo']?></td>
							</tr>
							<tr>
								<td><strong>Numeración: </strong></td>
								<td><?=$key['categoria']?></td>
							</tr>
							<tr>
								<td><strong>Color: </strong></td>
								<td><?=$key['color']?></td>
							</tr>
							<tr>
								<td><strong>Precio de compra: </strong></td>
								<td><?=$key['compra']?></td>
							</tr>
							<tr>
								<td><strong>Precio Mayoreo: </strong></td>
								<td><?=$key['oferta']?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-12 col-xl-5 col-md-12 border">
					<form action="<?=$base_url?>/informes/actualizar/<?php echo $arr[0]['id_producto']; ?>" method="post">
						<h4>Inventario de este producto</h4>
						<table class="table-color table_Width">
							<?php foreach ($numeros as $a) {?>
								<tr>
									<td>numero: <?=$a['numero']?></td>
									<td><div class="sizeTable_md"><input type="number" min="0" max="200" class="form-control" placeholder="Ingrese valor" value="<?=$a['cantidad']?>" name="cantidad_actualizar[]"></div></td>
									<td><input type="hidden" value="<?=$a['id_stock']?>" name="id_stock[]"></td>
								</tr>
							<?php } ?>
						</table>
						<br>
				</div>
			</div>
			<div class="row">
				<a class='btn btn-outline-warning' href="<?=$base_url?>/inicio/">listo <i class='fa fa-check'></i></a>
				<button type="submit" name="button" class='btn btn-outline-success'>Actualizar<i class='fa fa-hdd-o'></i></button>
			</div>
			</form>		  <!-- Demo content -->
		<?php } ?>
		<br>
	</div><br><br><br>
	<?php $this->load->view('footer'); ?>
