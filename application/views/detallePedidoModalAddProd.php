<!-- inicio del formulario emergente para ingresar proveedor nuevo-->
<div class="modal fade" id="AddProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Datos del producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Còdigo
						</label>
						<input
							type="text"
							class="form-control"
							id="codigo_addProd"
							name="nombre-cliente"
							value="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Descripción</label>
						<div id="descripcion_addProd"class="">

						</div>
					</div>
					<div class="form-group">
						<div class="costos">
							<div class="">
								<label for="recipient-name" class="col-form-label">Número</label>
								<select id="numero_addProd"class="custom-select" name="">

								</select>
							</div>
						<div class="">
							<label for="recipient-name" class="col-form-label">Cantidad</label>
								<input
									type="number"
									class="form-control"
									id="cantidad_addProd"
									value="1">
								</input>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button"
							class="btn btn-secondary"
							data-dismiss="modal">
							Cerrar
						</button>
						<button
						 	id="btn_addProd"
							type="button"
							class="btn btn-success"
							data-dismiss="modal">
							Agregar
						</button>
					</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
		$('#btn_addProd').hide()
	$('#codigo_addProd').keypress(function(e){
		if (e.which == 13) {//<-- detecta un enter
			var codigo_prod = $('#codigo_addProd').val()

			var request = $.ajax({
				method: "POST",
				url: "<?=$base_url?>/venta/buscar_codigo",
				data: {codigo_producto: codigo_prod}
			});

			request.done(function(resultado) {
				$('#descripcion_addProd').html(resultado);
				$('#btn_addProd').show()
				$(function(){
					$.post('<?=$base_url?>/venta/numeros',{codigo: codigo_prod}).done(function(respuesta){
						$('#numero_addProd').html(respuesta);
					});
				})
			});
		}
	})

	$('#btn_addProd').on('click',function(){
		var numero_addProd = $('#numero_addProd').val()
		var id_pedido = $('#id_pedido').val()
		var cantidad_addProd = $('#cantidad_addProd').val()
		var id_producto_addProd= $('#id_producto_addProd').val()
		if (numero_addProd == '') {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Debe seleccionar una talla!',
				footer: '<a href></a>'
			})
		}else {
			var request = $.ajax({
				method: "POST",
				url: "<?=$base_url?>/informes/add_Producto_A_pedido",
				data: {
					pedido_id_pedido: id_pedido,
					producto_id_producto: id_producto_addProd,
					unidades: cantidad_addProd,
					stock_id_stock: numero_addProd
				}
			});

			request.done(function(resultado) {
				location. reload();
			});
		}
	})
</script>
