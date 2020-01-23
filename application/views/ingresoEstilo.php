<!-- inicio del formulario emergente para ingresar proveedor nuevo-->
<div class="modal fade" id="IngresoEstilo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nuevo Estilo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Ingrese el estilo</label>
						<input type="text" required class="form-control" id="nombre_estilo" name="nombre_estilo" value="">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
						<button  onclick="nuevoEstilo()" data-dismiss="modal" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- Fin ventana emergente-->
<script>
/*
  $('#marca').change(function(){
    $("#exampleModalLabel").text("");
    var nombre_marca = $("#marca").val();
    $("#exampleModalLabel").append(" para la marca" + nombre_marca);
  });
*/

function nuevoEstilo(){
  var nombre = $("#nombre_estilo").val();
  var marca = $("#marca").val();

  if (nombre == "" || marca =="") {
    $("#mensaje").addClass("alert alert-danger");
    $("#mensaje").text("No se pudo insertar los elementos");
  }else {
    var request = $.ajax({
      method: "POST",
      url: "<?=$base_url?>/producto/nuevoEstilo",
      data: {
            nombre_estilo: nombre,
            id_marca: marca
          }
    });
    request.done(function(){
      $(function(){
        $("#nombre_estilo").val("");
      });
      var id_marca = $("#marca").val();
      $.post('<?=$base_url?>/producto/estilo',{marca: id_marca}).done(function(respuesta){
        $('#estilo').html(respuesta);
      });
    });
  }
}
</script>
