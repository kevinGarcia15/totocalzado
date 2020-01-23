<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Incersion no fué realizada!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td><a class='btn btn-warning' href=\"${base_url}/informes/mostrarEstilo/%s\"><i class='fa fa-list mr-2'></i></a></td>
			 	</tr>";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,$a['nombre'],$a['id_marca']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<?php $this->load->view('menu'); ?>
	<title>Inventario</title>
</head>
	<div class="page-content p-5" id="content">
		<br>
		<?php $this->load->view('navVertical'); ?>
		<h6>Seleccione la marca para listar los estilos disponibles</h6>
		<form class="" action="<?=$base_url?>/producto/nuevo/" method="post" enctype="multipart/form-data">
			<hr><br><br>
			<div class="d-flex justify-content-center">
				<div class="table-responsive-sm">
					<table class="table table-striped sizeTableInventario" style="color: #000;">
						<thead>
							<th><div class="sizeTable">Marcas</div></th>
							<th><div class="sizeTableXS">Acciones</div></th>
						</thead>
						<tbody>
							<?=$htmltrows?>
						</tbody>
					</table>
				</div>
			</div>
		</form>		  <!-- Demo content -->
	</div>
