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
<!-- Title -->
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
              <li>Nombre: <?=$pedidos[0]['usuario']?></li>
              <li>Teléfono: <?=$pedidos[0]['tel']?></li>
              <li>Aldea: <?=$pedidos[0]['aldea']?></li>
              <li>Dirección exacta: <?=$pedidos[0]['dirEnv']?></li>
              <li>fecha de solicitud: <?=$pedidos[0]['fecha']?></li>

            <?php else: ?>
              <li>Nombre: <?=$despachado[0]['usuario']?></li>
              <li>Teléfono: <?=$despachado[0]['tel']?></li>
              <li>Aldea: <?=$despachado[0]['aldea']?></li>
              <li>fecha de solicitud: <?=$despachado[0]['fecha']?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="productos">

        <?php if(!empty($pedidos)): ?>
        <h4>Solicitudes sin despachar</h4>
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
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
                <input id="id_pedido" type="hidden" name="id_pedido" value="<?=$pedidos[0]['id_pedidos']?>">
                <?php foreach ($pedidos as $key): ?>
                  <!--valida si hay en existencia dicho producto--------------------------------->
                  <tr id="fileProducto"><?php if ($key['cant_stock'] < 1): ?>
                    <input type="hidden" name="flag" value="0"><!--nos ayuda a saber cuantos productos hay disponibles-->
                    <td><img src="<?=$base_url?>/<?=$key['img']?>"></img></td>
                    <td><?=$key['codigo']?></td>
                    <td><?=$key['marca']?></td>
                    <td><?=$key['color']?></td>
                    <td><?=$key['numero']?></td>
                    <td>Q.<?=$key['precio_compra']?></td>
                    <td>
                      <?=$key['unidades']?>
                      <i title="Sin existencia" class="fas fa-exclamation-circle"></i>
                    </td>
                    <td>
                      <a
                        class="btn btn-danger"
                        href="<?=$base_url?>/venta/eliminarProductoDeLinea?lin_ped=<?=$key['id_linea']?>&id_ped=<?=$pedidos[0]['id_pedidos']?>">
                        <i class="fas fa-trash-alt" style="margin-left: 0px;"></i>
                      </a>
                    </td>
                  <?php else: ?>
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
                    <td><?=$key['marca']?></td>
                    <td><?=$key['color']?></td>
                    <td><?=$key['numero']?></td>
                    <td>
                      <input
                      id="precioUnidad_<?=$key['id_stock']?>"
                      type="number"
                      name="precioUnidad[]"
                      value="<?=$key['precio_compra']?>"
                      class="form-control"
                      >
                    </td>
                    <td><?=$key['unidades']?></td>
                    <td>
                      <a
                        class="btn btn-danger"
                        href="<?=$base_url?>/venta/eliminarProductoDeLinea?lin_ped=<?=$key['id_linea']?>&id_ped=<?=$pedidos[0]['id_pedidos']?>">
                        <i class="fas fa-trash-alt" style="margin-left: 0px;"></i>
                      </a>
                      <a
                        onclick="ingresarAVenta(<?=$key['id_stock']?>)"
                        class="btn btn-success">
                        <i class="far fa-check-circle"></i>
                      </a>
                    </td>
                  <?php endif; ?>
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

      </div>
    </div><br><br>
  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">
  function ingresarAVenta(stock){
    var id_pedido = $('#id_pedido').val()
    var id_linea = $('#id_linea_'+stock).val()
    var id_producto = $('#id_producto_'+stock).val()
    var cantidad = $('#cantidad_'+stock).val()
    var numero = $('#numero_'+stock).val()
    var precioUnidad = $('#precioUnidad_'+stock).val()

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

  }

</script>
</html>
