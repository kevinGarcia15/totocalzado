<!-- inicio del formulario emergente para ingresar proveedor nuevo-->
<div class="modal fade" id="generarPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ingrese los siguientes datos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Nombre del cliente
						</label>
						<input
							type="text"
							class="form-control"
							id="nombre-cliente"
							name="nombre-cliente"
							value="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ciudad</label>
						<input
							type="text"
							class="form-control"
							id="ciudad"
							name="ciudad"
							value="N/A">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Alguna referencia</label>
						<input
							type="text"
							class="form-control"
							id="referencia"
							name="referencia"
							value="N/A">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Enviar el:</label>
						<input
							type="date"
							class="form-control"
							id="fecha-entrega"
							value="">
						</input>
					</div>
					<div class="form-group">
						<div class="costos">
							<div class="">
								<label for="recipient-name" class="col-form-label">Costos de envio</label>
								<input
								type="number"
								class="form-control"
								id="costo-Envio"
								value="0">
							</input>
						</div>
						<div class="">
							<label for="recipient-name" class="col-form-label">Descuento</label>
								<input
									type="number"
									class="form-control"
									id="descuento"
									value="0">
								</input>
							</div>
							<div class="">
								<label for="recipient-name" class="col-form-label">Otros</label>
									<input
										type="number"
										class="form-control"
										id="otros-costos"
										value="0">
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
						 	id="generar-pdf"
							type="button"
							class="btn btn-success"
							data-dismiss="modal">
							Generar
						</button>
						<button
						 	id="generar-listado"
							type="button"
							class="btn btn-primary"
							data-dismiss="modal">
							Generar modo listado
						</button>

					</div>
			</div>
		</div>
	</div>
</div>
