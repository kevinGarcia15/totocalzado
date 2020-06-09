<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>Q.%s</td>
				<td>Q.%s</td>
				<td>
					<a type='button' class='btn btn-warning' href=\"${base_url}/informes/mostrarProducto/%s\">ver mas</a>
				</td>
			 	</tr>";
$htmltrows = "";

foreach ($prod as $a) {
	$htmltrows .= sprintf($htmltrow,
		$a['codigo'], htmlspecialchars($a['marca']), htmlspecialchars($a['estilo']),htmlspecialchars($a['color']),
		htmlspecialchars($a['genero']),$a['compra'],$a['oferta'],$a['id_producto']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<!-- Data tables------------------------------------------------------------>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<style media="screen">
		.pagination{display: flex !important;}
	</style>
	<title>Inventario</title>
</head>
<header>
	<?php $this->load->view('menu'); ?>
</header>
	<body>
		<div class="table table-responsive">
			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<th>Código</th>
					<th>Marca</th>
					<th>Estilo</th>
	        <th>Color</th>
					<th>Departamento</th>
					<th>Precio Publico</th>
					<th>Oferta</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					<?=$htmltrows?>
				</tbody>
			</table>
		</div>
	</body>
	<script type="text/javascript">
	$(document).ready(function() {
		var groupColumn = 1;
		var table = $('#example').DataTable({
			"language": {
						"lengthMenu": "_MENU_",
						"zeroRecords": "Ningún registro",
						"searchPlaceholder": "Buscar",
						"info": "_TOTAL_ registro(s)",
						"infoEmpty": "Ningun registro",
						"infoFiltered": "(Busqueda en _MAX_ registros)",
						"search": "",
						"paginate": {
								"first": "Primero",
								"last": "Último",
								"next": "Siguiente",
								"previous": "Anterior"
						},
				},
				"columnDefs": [
						{ "visible": false, "targets": groupColumn }
				],
				"order": [[ groupColumn, 'asc' ]],
				"displayLength": 10,
				"drawCallback": function ( settings ) {
						var api = this.api();
						var rows = api.rows( {page:'current'} ).nodes();
						var last=null;

						api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
								if ( last !== group ) {
										$(rows).eq( i ).before(
												'<tr class="group" style="font-weight: bold;"><td colspan="6">'+group+'</td></tr>'
										);

										last = group;
								}
						} );
				}
		} );

		// Order by the grouping
		$('#example tbody').on( 'click', 'tr.group', function () {
				var currentOrder = table.order()[3];
				if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
						table.order( [ groupColumn, 'desc' ] ).draw();
				}
				else {
						table.order( [ groupColumn, 'asc' ] ).draw();
				}
		});
});
	</script>
</html>