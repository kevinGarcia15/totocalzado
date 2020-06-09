<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Incersion no fué realizada!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td><a class='btn btn-warning' href=\"${base_url}/informes/mostrarProducto/%s\"><i class='fa fa-list mr-2'></i></a></td>
			 	</tr>";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,$a['nombre'],$a['color'],$a['id_producto']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Estilos</title>
</head>
<?php $this->load->view('menu'); ?>

	<div class="page-content p-5" id="content">
		<br>
		<h6>Seleccione la numeración y el color</h6>
		<form class="" action="<?=$base_url?>/producto/nuevo/" method="post" enctype="multipart/form-data">
			<hr><br><br>
			<div class="d-flex justify-content-center">
				<div class="table-responsive-sm">
					<table class="table table-striped sizeTableInventario" style="color: #000;">
						<thead>
							<th><div class="sizeTable">Numeración</div></th>
							<th><div class="sizeTable">Color</div></th>
							<th><div class="sizeTableXS">Acciones</div></th>
						</thead>
						<tbody>
							<?=$htmltrows?>
						</tbody>
					</table>
			</div>
		</form>		  <!-- Demo content -->
	</div>
	<a class='btn btn-outline-success' href="javascript:history.back()"><i class='fa fa-angle-double-left'></i></a>
</div>
