<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Styles -->
  <script src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/footer.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/detallePedido.css" media="screen">
  <!--glip icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- PDFjs -->
<script src="<?=$base_url?>/recursos/js/pdfjs/jspdf.min.js"></script>
<script src="<?=$base_url?>/recursos/js/pdfjs/jspdf.plugin.autotable.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">

  <title>Detalle del pedido</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <br><br><br>
  <div class="main">
    <div class="envio">
      <p>DATOS DE ENVIO</p>
      <form class="" action="<?=$base_url?>/venta/ingresarventa/" method="post">
        <div class="envio-datos">
          <ul>
<!--si no exite pedidos porque ya se han despachado, trae los dastos de ventas y no de pedidos-->
            <?php if (!empty($pedidos)): ?>
              <li>Generado por: <?=$pedidos[0]['usuario']?></li>
              <li>Teléfono: <?=$pedidos[0]['tel']?></li>
              <li>Aldea: <?=$pedidos[0]['aldea']?></li>
              <li>Dirección exacta: <?=$pedidos[0]['dirEnv']?></li>
              <li>fecha de solicitud: <?=$pedidos[0]['fecha']?></li>

            <?php else: ?>
              <li>Generado por: <?=$despachado[0]['usuario']?></li>
              <li>Teléfono: <?=$despachado[0]['tel']?></li>
              <li>Aldea: <?=$despachado[0]['aldea']?></li>
              <li>fecha de solicitud: <?=$despachado[0]['fecha']?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="productos">

        <?php if(!empty($pedidos)): ?>
        <h4>Solicitudes sin confirmar</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Img</th>
                <th>Codigo</th>
                <th>Estilo</th>
                <th>Color</th>
                <th>Número</th>
                <th><div class="headTable_m">Precio</div></th>
                <th>unidades</th>
                <th><div class="headTable_m">Opciones</div></th>
              </tr>
            </thead>
            <tbody>
                <input id="id_pedido" type="hidden" name="id_pedido" value="<?=$pedidos[0]['id_pedidos']?>">
                <?php $sumaTotal = 0;?>
                <?php foreach ($pedidos as $key): ?>
                    <?php $precio = ($key['oferta'] > 0) ? $key['oferta'] : $key['precio_compra']; ?>
                    <?php $sumaTotal = $sumaTotal + ($precio * $key['unidades']) ?>
                    <td><img src="<?=$base_url?>/<?=$key['img']?>"></img></td>
                    <td><?=$key['codigo']?>
                      <!--la variable $key['id_stock'] concatenado genera un id unico entre los inputs-->
                      <input
                        id="id_linea_<?=$key['id_stock']?>"
                        type="hidden"
                        name="id_linea[]"
                        value="<?=$key['id_linea']?>"
                      >
                      <input
                        id="id_producto_<?=$key['id_stock']?>"
                        type="hidden"
                        name="id_producto[]"
                        value="<?=$key['id_producto']?>"
                      >
                      <input
                        id="codigo_<?=$key['id_stock']?>"
                        type="hidden"
                        name="codigo[]"
                        value="<?=$key['codigo']?>"
                      >
                      <input
                        id="cantidad_<?=$key['id_stock']?>"
                        type="hidden"
                        name="cantidad[]"
                        value="<?=$key['unidades']?>"
                        >
                      <input
                        id="numero_<?=$key['id_stock']?>"
                        type="hidden"
                        name="numero[]"
                        value="<?=$key['id_stock']?>"
                      >
                    </td>

                    <td><?=$key['marca'].' '.$key['estilo']?></td>
                    <td><?=$key['color']?></td>
                    <td><?=$key['numero']?></td>
                    <td>
                      <input
                      id="precioUnidad_<?=$key['id_stock']?>"
                      type="number"
                      name="precioUnidad[]"
                      value="<?=$precio?>"
                      class="form-control"
                      >
                    </td>
                    <td><?=$key['unidades']?></td>
                    <td>
                      <a
                        onclick="eliminarProducto('<?=$key['id_linea']?>','<?=$pedidos[0]['id_pedidos']?>','<?=$key['id_stock']?>','<?=$key['unidades']?>')"
                        class="btn btn-danger"
                        href="#">
                        <i class="fas fa-trash-alt" style="margin-left: 0px;"></i>
                      </a>
                      <a
                        onclick="ingresarAVenta(<?=$key['id_stock']?>)"
                        class="btn btn-success">
                        <i class="far fa-check-circle"></i>
                      </a>
                    </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </form>
    <?php endif; ?>

    <?php if(!empty($despachado)): ?>
        <h4 style="margin-top: 30px;">Solicitudes aceptadas</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Img</th>
                <th>Codigo</th>
                <th>Estilo</th>
                <th>Color</th>
                <th>Número</th>
                <th>Precio</th>
                <th>unidades</th>
                <th>Fecha despachado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($despachado as $key): ?>
                <td><img src="<?=$base_url?>/<?=$key['img']?>"></img></td>
                  <td><?=$key['codigo']?></td>
                  <td><?=$key['marca']?></td>
                  <td><?=$key['color']?></td>
                  <td><?=$key['numero']?></td>
                  <td>Q.<?=$key['precio_unidad']?></td>
                  <td><?=$key['unidades']?></td>
                  <td><?=$key['fecha']?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
      <div class="accion">
        <button
          id="ModalGenPDF"
          class="btn btn-warning"
          data-toggle="modal"
          data-target="#generarPDF"
          data-whatever="@mdo">
          Generar PDF
        </button>
        <button
          id="agregar_producto"
          class="btn btn-success"
          data-toggle="modal"
          data-target="#AddProducto"
          data-whatever="@mdo">
          Agregar producto
        </button>
        <?php $this->load->view('detallePedidoModalGenPDF'); ?>
        <?php $this->load->view('detallePedidoModalAddProd'); ?>
      </div>
      </div>
    </div><br><br>
  <?php $this->load->view('footer'); ?>
</tr>
<!--tabla oculta para implementar en pdf-->
      <table id="tableForPdf">
        <thead>
          <tr>
            <th></th>
            <th>DESCIPCION</th>
            <th>PRECIO</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $key): ?>
            <tr>
              <?php $precio = ($key['oferta'] > 0) ? $key['oferta'] : $key['precio_compra']; ?><!--verifica si existe alguna oferta-->
              <td><?=$key['unidades']?></td>
              <td><?=$key['codigo']?> <?=$key['marca'].' '.$key['estilo']?> <?=$key['color']?> #<?=$key['numero']?> Q.<?=$precio?>uni.</td>
              <td>Q.<?=$precio * $key['unidades']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
</body>
<script type="text/javascript">
  function ingresarAVenta(stock){
    var id_pedido = $('#id_pedido').val()
    var id_linea = $('#id_linea_'+stock).val()
    var id_producto = $('#id_producto_'+stock).val()
    var cantidad = $('#cantidad_'+stock).val()
    var numero = $('#numero_'+stock).val()
    var precioUnidad = $('#precioUnidad_'+stock).val()

    Swal.fire({
    title: 'Confirmar producto?',
    text: "El producto se guardará",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Confirmar!'
  }).then((result) => {
    if (result.value) {
      var request = $.ajax({
        method: "POST",
        url: "<?=$base_url?>/venta/ingresarventaPorUnidad",
        data: {
          id_pedido: id_pedido,
          numero: numero,
          precioUnidad: precioUnidad,
          id_producto: id_producto,
          id_linea: id_linea,
          cantidad: cantidad
        }
      });
      request.done(function(resultado) {
        location. reload();
      });
      Swal.fire(
        'Guardado!',
        'El producto se despachó exitosamente.',
        'success'
      )
    }
  })
}

$('#generar-listado').on('click', function(){
  var f = new Date();
  var fechaActual = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
  var nombre_cliente = $('#nombre-cliente').val()

  const doc = new jsPDF();
  doc.autoTable({
    html: '#tableForPdf',
    theme: 'plain',
    margin: { top: 5},
})
  doc.save(nombre_cliente+fechaActual+'.pdf');
})

$('#generar-pdf').on('click', function(){
  var f = new Date();
  var fechaActual = f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();
  var nombre_cliente = $('#nombre-cliente').val()
  var ciudad = $('#ciudad').val()
  var referencia = $('#referencia').val()
  var fecha_entrega = $('#fecha-entrega').val()
  var subtotal = parseInt(<?=$sumaTotal?>);
  var costo_Envio = parseInt($('#costo-Envio').val())
  var descuento = parseInt($('#descuento').val())
  var otros_costos = parseInt($('#otros-costos').val())
  var Total = (subtotal + costo_Envio + otros_costos)-descuento

  const doc = new jsPDF();
  var x1 = 10
  var x2 = 200
  var y1 = 10
  var y2 = 10
  doc.setLineWidth(0.5);
  //header------------------
  doc.line(x1, y1, x2, y2);//linea horizontal arriba
  doc.line(x1, y1, 10, y2+80);//linea vertical izquierta
  doc.text(15,17,'TOTOCALZADO');
  doc.setFontSize(10);
  doc.text(15,23,'Economía y Durabilidad');
  doc.setFontSize(20);
  doc.text(120,17,'ORDEN DE COMPRA');
  doc.line(x1+190, y1, x2, y2+80);//linea vertical derecha
  doc.line(x1, y1+20, x2, y2+20);//linea horizontal abajo
//Datos de ENVIO---------------------------------------------------------------
  doc.setFontSize(10);
  doc.text(15,35,'Dirección: Ciudad de Totonicapán');
  doc.text(15,40,'Código postal: 08001');
  doc.text(15,45,'Teléfono: 5978 8865');
  doc.text(15,60,'Emitido para:');
  doc.text(15,65,'A nombre de: '+nombre_cliente);
  doc.text(15,70,'Dirección:<?=$pedidos[0]['dirEnv']?>');
  doc.text(15,75,'Ciudad: '+ciudad);
  doc.text(15,80,'Referencia: '+referencia);
  doc.text(15,85,'Teléfono: <?=$pedidos[0]['tel']?>');

  doc.line(x1+130, y1+20, 140 , y2+80);//linea vertical de enmedio
  doc.setFontType("bold");
  doc.text(142,35,'Fecha:');
  doc.text(142,40,fechaActual);
  doc.line(140, 42, 200, 42);//linea horizontal entre datos
  doc.text(142,45,'Autorizado por:');
  doc.text(142,50, '<?=$this->session->USUARIO ?>');
  doc.line(140, 52, 200, 52);//linea horizontal entre datos
  doc.text(142,55,'Transporte:');
  doc.text(142,60,'Entrega a domicilio');
  doc.line(140, 62, 200, 62);//linea horizontal entre datos
  doc.text(142,65,'A la atención de:');
  doc.text(142,70,'');
  doc.line(140, 72, 200, 72);//linea horizontal entre datos
  doc.text(142,75,'Enviar el:');
  doc.text(142,80, fecha_entrega);
  doc.line(140, 82, 200, 82);//linea horizontal entre datos
  doc.line(x1, y1+80, x2, y2+80);//linea horizontal abajo
//Descripcion de productos despachados------------------------------------------------------
  doc.line(x1, y1+85, x2, y2+85);//linea horizontal Arriba
  doc.line(x1, 95, 10, 150);//linea vertical izquierta
  doc.line(x1+130, 95, 140 , 180);//linea vertical de enmedio
  doc.line(200,95, 200, 180);//linea vertical derecha
  doc.line(x1, 150, x2, 150);//linea horizontal Abajo

  doc.setFontSize(8);
  doc.text(122,153,'Sub-total')
  doc.text(147,153,'Q.'+subtotal+'.00')
  doc.line(140, 156, 200, 156);//linea horizontal entre datos
  doc.text(114,159,'Costo de envio')
  doc.text(147,159,'Q.'+costo_Envio+'.00')
  doc.line(140, 162, 200, 162);//linea horizontal entre datos
  doc.text(108,165,'Descuento especial')
  doc.text(147,165,'<Q.'+descuento+'.00>')
  doc.line(140, 168, 200, 168);//linea horizontal entre datos
  doc.text(127,171,'Otros')
  doc.text(147,171,'Q.'+otros_costos+'.00')
  doc.line(140, 174, 200, 174);//linea horizontal entre datos
  doc.text(127,177,'Total')
  doc.text(147,177,'Q.'+Total+'.00')
  doc.line(140, 180, 200, 180);//linea horizontal entre datos

  doc.autoTable({
    html: '#tableForPdf',
    theme: 'plain',
    margin: { top: 95},
})
  doc.save(nombre_cliente+'_'+fechaActual+'.pdf');
})

function eliminarProducto(id_linea,id_pedido,id_stock,unidades){
  Swal.fire({
  title: 'Esta seguro?',
  text: "El producto se eliminará del pedido!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!'
}).then((result) => {
  if (result.value) {
    window.location.href = "<?=$base_url?>/venta/eliminarProductoDeLinea?lin_ped="+id_linea+"&id_ped="+id_pedido+"&num="+id_stock+"&cant="+unidades+""
    Swal.fire(
      'Eliminado!',
      'El producto ha sido eliminado.',
      'success'
    )
  }
})
}
</script>
</html>
