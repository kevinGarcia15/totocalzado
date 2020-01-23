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
	<?php $this->load->view('menu'); ?>
	<title>Estilos</title>
</head>
<body>
	<div class="page-content p-5" id="content">
		<br>
		<?php $this->load->view('navVertical'); ?>
		<h4 style="font-family: Vegur, 'PT Sans', Verdana, sans-serif;">Datos del producto</h4><br>
		<?php foreach ($arr as $key) {?>
			<h6><strong>Código del producto: </strong><?=$key['codigo']?></h6>
			<h6><strong>Marca: </strong><?=$key['marca']?></h6>
			<h6><strong>Estilo: </strong><?=$key['estilo']?></h6>
			<h6><strong>Numeración: </strong><?=$key['categoria']?></h6>
			<h6><strong>Color: </strong><?=$key['color']?></h6>
			<h6><strong>Precio de compra: </strong>Q<?=$key['compra']?></h6>
			<h6><strong>Precio Mayoreo: </strong>Q<?=$key['precio_mayoreo']?></h6>
			<h6><strong>Provedor: </strong><?=$key['proveedor']?></h6>
		<?php } ?>
		<br>
		<form action="<?=$base_url?>/producto/nuevo/" method="post" enctype="multipart/form-data">
			<h4>Inventario de este producto</h4>
			<table>
				<?php foreach ($numeros as $a) {?>
					<tr>
						<td>numero: <?=$a['numero']?></td>
						<td><div class="sizeTable"><input type="number" min="0" max="200" class="form-control" placeholder="Ingrese valor" value="<?=$a['cantidad']?>" name=""></div></td>
					</tr>
				<?php } ?>
			</table><br>
			<br>
			<a class='btn btn-outline-success' href="javascript:history.back()"><i class='fa fa-angle-double-left'></i></a>
			<a class='btn btn-outline-warning' href="<?=$base_url?>/inicio/">listo <i class='fa fa-check'></i></a>
			<a class='btn btn-outline-success' href="<?=$base_url?>/inicio/">Actualizar <i class='fa fa-hdd-o'></i></a>
		</form>		  <!-- Demo content -->
	</div><br><br><br>
