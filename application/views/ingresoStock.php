<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<?php $this->load->view('header'); ?>
		<title>Inventario</title>
	</head>
	<body>
		<?php $this->load->view('menu'); ?>
		<!-- Page content holder -->
	<div class="page-content p-5" id="content">
		<form class="" action="<?=$base_url?>/producto/ingresarStock/" method="post" enctype="multipart/form-data">
			<h4 style="font-family: Vegur, 'PT Sans', Verdana, sans-serif;">Datos del producto</h4><br>
			<h6><strong>Código del producto: </strong><?=$this->session->userdata('codigo')?></h6>
			<h6><strong>Marca: </strong><?= $marca?></h6>
			<h6><strong>Estilo: </strong><?=$estilo;?></h6>
			<h6><strong>Numeración: </strong><?=$numeracion?></h6>
			<h6><strong>Color: </strong><?=$color?></h6>
			<h6><strong>Precio al público: </strong>Q<?=$this->session->userdata('precio_compra');?></h6>
			<h6><strong>Precio Oferta: </strong>Q<?=$this->session->userdata('oferta');?></h6>
			<br>
			<table>
				<h4 style="font-family: Vegur, 'PT Sans', Verdana, sans-serif;">Ingrese el inventario</h4>
				<?php foreach ($numeros as $key) {?>
					<tr>
						<td>numero: <?=$key['numero']?></td>
						<td><input type="number" min="0" max="200" class="form-control" placeholder="Ingrese valor" value="0" name="numeros[]"></td>
					</tr>
				<?php } ?>
			</table><br>
			<td colspan="2">
				<input class="btn btn-success btn-md"  role="button"  type="submit" name="Guardar" value="Guardar">
				<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
				<a class="btn btn-danger btn-md" href="<?=$base_url?>/producto/borrarVariablesSesion?f=1">Cancelar</a>
			</td>
		</form>
	<br><br><br><br>
</body>

<script type="text/javascript">
$(function() {
// Sidebar toggle behavior
$('#sidebarCollapse').on('click', function() {
	$('#sidebar, #content').toggleClass('active');
});
});

//funcion Ajax para buscar en base de datos
	$(function(){
		$.post('<?=$base_url?>/producto/marca').done(function(respuesta){
			$('#marca').html(respuesta);
		});
	})
	//funcion Ajax para buscar en base de datos la numeracion
		$(function(){
			$.post('<?=$base_url?>/producto/numeracion').done(function(respuesta){
				$('#numeracion').html(respuesta);
			});
		})
	//funcion Ajax para buscar en base de datos el color
		$(function(){
			$.post('<?=$base_url?>/producto/color').done(function(respuesta){
				$('#color').html(respuesta);
			});
		})
</script>
</html>
