<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Incersion no fué realizada!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td><a class='btn btn-secondary' href=\"${base_url}/informes/detalles/%s\">Ver mas</a></td>

			 	</tr>";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,$a['codigo'],$a['marca'],$a['nombre_prod'],$a['color'],$a['categoria'],$a['id_producto']);
}
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
		<?php $this->load->view('menu'); ?>

	</header>
	<div id="body">
<hr><div class="table-responsive">
	<table class="table table-bordered" style="color: #000;">
		<thead>
			<th>Código del producto</th>
			<th>Marca</th>
			<th>Estilo</th>
			<th>Color</th>
			<th>Categoria</th>
			<th>Detalles</th>
		</thead>
		<tbody>
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio/">Listo</a>
		<div class="alert alert-success" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
</div>
  <?php $this->load->view('footer'); ?>
</body>
</html>
