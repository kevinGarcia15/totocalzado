<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="<?=$base_url?>/recursos/js/sweetalert.min.js"></script>
  <!-- Styles -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/footer.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/pagar.css" media="screen">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">

  <!-- Agregamos la librería jQuery (Importante)-->
  <script src="<?=$base_url?>/recursos/js/carrito/jquery.min.js"></script>
  <!-- Agregamos la librería Simple Cart -->
  <script src="<?=$base_url?>/recursos/js/carrito/simpleCart.min.js"></script>
  <!-- Código JS de inicialización  -->
  <script src="<?=$base_url?>/recursos/js/carrito/app.js"></script>
  <!-- Title -->
  <title>pagar</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <div class="main">
    <br>
    <div class="productos">
      <div class="table-container">
        <div class="table-body simpleCart_items table table-hover">
        </div>
        <div class="">
          <a class="btn btn-outline-light" href="<?=$base_url?>">Segir comprando</a>
          <a class="btn btn-success simpleCart_checkout" href="#">Actualizar carrito</a>
        </div>
        <input
          id="contItems"
          type="hidden"
          name="hidden"
          value="<?php echo $contItems; ?>">
      </div>
      <div class="total-items">
        <div class="total-items__detalles">
          <h4>Total del carrito</h4>
          <hr>
          <div class="total-carrito">
            <p>Total:</p>
            <b><div class="simpleCart_total"></div></b>
          </div>
          <button
            id="solicitarProducto"
            class="btn btn-success"
            data-toggle="modal"
						data-target="#datosChekout"
						data-whatever="@mdo">
            Solicitar producto
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('datosChekout'); ?>
  <?php $this->load->view('FloatingActionButton'); ?>

  <br><br><br><br><br>
  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">
$(function (){
  var numero = $('#cartItem_SCI-1 td').eq(3).html();
})

  $("#finalizar").on("click",function(){

    var contador = ($("table tr").length)- 1;
    var telefono = $('#num_telefono').val()
    var aldea = $('#aldea').val()
    var direccionExacta = $('#dirEspecifico').val()
    var id_persona = <?=$this->session->ID?>;

    var codigo = [];
    var numero = [];
    var cantidad= [];
    for (var i = 0; i < contador ; i++) {
      codigo[i] = $('.row-'+i+' td').eq(2).html();
      numero[i] = $('.row-'+i+' td').eq(3).html();
      cantidad[i] = $('.row-'+i+' td').eq(6).html();
    }
    console.log(codigo)
    console.log(numero)
    console.log(cantidad)
      var request = $.ajax({
        method: "POST",
        url: "<?=$base_url?>/Proventa/datosPedido",
        data: {
          contador : contador,
          id_persona: id_persona,
          id_aldea: aldea,
          direccionEnvio: direccionExacta,
          telefono: telefono,
          codigo: codigo,
          cantidad: cantidad,
          talla: numero,
        }
      });
      request.done(function(respuesta){
        if (respuesta == '1') {
          Swal.fire({
            title: 'Excelente!!',
            text: "Tu pedido fue enviado exitosamente, tardará de 1 a 3 días",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              window.location.href = "<?=$base_url?>";
            }else {
              window.location.href = "<?=$base_url?>";
            }
          })
        }else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debe llenar los campos obligatorios',
            footer: '<a href></a>'
          })
        }
      });
      request.fail(function() {
        console.log('error')
    });
  });

  $('#solicitarProducto').on('click', function(){
    $.post('<?=$base_url?>/proventa/aldea').done(function(respuesta){
      $('#aldea').html(respuesta);
    });
  })
</script>
</html>
