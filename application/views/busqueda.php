<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (!empty($buscarProd)) {
	$htmltrow = "<tr>
	<td><a href=\"${base_url}/proventa/detalle?id={$buscarProd[0]['id_producto']}&dep={$buscarProd[0]['depto']}\"><img src=\"${base_url}/./%s\"></a></td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
	<td>%s</td>
	<td><a class='btn btn-secondary' href=\"${base_url}/proventa/detalle?id=%s&dep={$buscarProd[0]['depto']}\">Ver</a></td>
	</tr>";

	$htmltrows = "";
	foreach ($buscarProd as $a) {
		$htmltrows .= sprintf($htmltrow,$a['img'],$a['codigo'],$a['marca'],$a['nombre_prod'],$a['color'],$a['categoria'],$a['id_producto']);
	}
}else {
	$htmltrow = "";
	$htmltrows = "Sin resultado";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/busqueda.css">
	<title>Nueva inserción</title>
</head>
<body>
<div id="container">
	<header>
		<?php $this->load->view('menu'); ?>
		<style media="screen">
		#items img{
			width: 100px;
		}
		</style>
	</header>
	<div id="body">
<hr><div class="table table-responsive">
	<table class="table table-striped">
		<thead>
			<th>Img</th>
			<th class="headTable-L">Código</th>
			<th><div class="headTable-L" >Marca</div></th>
			<th>Estilo</th>
			<th>Color</th>
			<th>Categoria</th>
			<th>Opciones</th>
		</thead>
		<tbody id="items">
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio/">Listo</a>
	</div>
</div>
  <?php $this->load->view('footer'); ?>
</body>
</html>
