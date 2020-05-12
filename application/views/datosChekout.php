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
						<label for="recipient-name" class="col-form-label">Ingrese número de teléfono</label>
						<input
							type="text"
							required
							class="form-control"
							id="num_telefono"
							name="nombre_estilo"
							value="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese su aldea/zona</label>
						<input
							type="text"
							required
							class="form-control"
							id="direccion"
							name="nombre_estilo"
							value="">
					</div>
					<div class="form-group">
						<label
							for="recipient-name"
							class="col-form-label">Especifique su dirección
							(caserio, número de casa, otras referencias)
						</label>
						<textarea
							class="form-control"
							id="dirEspecifico"
							rows="3">
						</textarea>
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
							class="btn btn-primary"
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
