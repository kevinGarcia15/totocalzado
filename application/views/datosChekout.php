<!-- inicio del formulario emergente para ingresar proveedor nuevo-->
<div class="modal fade" id="datosChekout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Datos del pedido</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese número de teléfono
							<div style="color: red;">
								(obligatorio)
							</div>
						</label>
						<input
							type="number"
							max="99999999"
							min="10000000"
							required
							class="form-control"
							id="num_telefono"
							name="nombre_estilo"
							value="">
					</div>
					<div id="inpAldea"class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese su aldea/zona
							<div style="color: red;">
								(obligatorio)
							</div>
						</label>
							<select class="form-control" id="aldea" name="">
								<option value="">Seleccionar</option>
							</select>
					</div>
					<div id="inpDireccion"class="form-group">
						<label
							for="recipient-name"
							class="col-form-label">Especifique su dirección
							(caserio, número de casa, otras referencias)
							<div style="color: red;">
								(obligatorio)
							</div>
						</label>
						<input
						type="text"
							class="form-control"
							id="dirEspecifico"
							rows="3">
						</input>
					</div>
					<div class="modal-footer">
						<button type="button"
							class="btn btn-secondary"
							data-dismiss="modal"
							style="color:white;">
							Cerrar
						</button>
						<button
							data-dismiss="modal"
							class="btn btn-primary simpleCart_empty "
							name="Enviar"
							id="finalizar"
							value="Enviar"
							style="color:white;">
							Enviar
						</button>
					</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#inpAldea').hide()
		$('#inpDireccion').hide()
		$('#finalizar').hide()
	})
		$('#num_telefono').on('keyup', function(){
			if ($('#num_telefono').val().length ==8) {
				$('#inpAldea').show()
	  }else {
	  	$('#inpAldea').hide()
			$('#finalizar').hide()
			$('#dirEspecifico').val("")
	  }
	})

	$('#aldea').on('change', function(){
		if ($('#aldea').val() != '') {
			$('#inpDireccion').show()
		}else {
			$('#inpDireccion').hide()
			$('#finalizar').hide()
			$('#dirEspecifico').val("")
		}
	})

	$('#dirEspecifico').on('keyup', function(){
		if ($('#dirEspecifico').val() != '') {
			$('#finalizar').show()
		}else {
			$('#finalizar').hide()
		}
	})
</script>
