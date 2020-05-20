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
	<title>Estilos</title>
</head>
<body>
	<div class="page-content p-5" id="content">
		<br>
		<?php $this->load->view('navVertical'); ?>
		<?php foreach ($arr as $key) {?>
			<div class="row justify-content-md-center">
				<div class="col col-xl-4">
					<h4>Datos del producto</h4><br>
					<table class="table-color">
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
				<div class="col col-xl-5">
					<form action="<?=$base_url?>/informes/actualizar/<?php echo $arr[0]['id_producto']; ?>" method="post">
						<h4>Inventario de este producto</h4>
						<table class="table-color">
							<?php foreach ($numeros as $a) {?>
								<tr>
									<td>numero: <?=$a['numero']?></td>
									<td><div class="sizeTable"><input type="number" min="0" max="200" class="form-control" placeholder="Ingrese valor" value="<?=$a['cantidad']?>" name="cantidad_actualizar[]"></div></td>
									<td><input type="hidden" value="<?=$a['id_stock']?>" name="id_stock[]"></td>
								</tr>
							<?php } ?>
						</table>
						<br>
				</div>
			</div>
			<div class="row">
				<a class='btn btn-outline-success' href="javascript:history.back()"><i class='fa fa-angle-double-left'></i></a>
				<a class='btn btn-outline-warning' href="<?=$base_url?>/inicio/">listo <i class='fa fa-check'></i></a>
				<button type="submit" name="button" class='btn btn-outline-success'>Actualizar<i class='fa fa-hdd-o'></i></button>
			</form>		  <!-- Demo content -->
			</div>
		<?php } ?>
		<br>
	</div><br><br><br>
