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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/footer.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/pagar.css" media="screen">
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
          <table>
              <?php $Total = 0; ?>
              <?php  for ($i=1; $i <= $contItems; $i++){ ?>
                <?php for ($j=1; $j <=1; $j++){ ?>
                  <?php $nomProd = 'producto'.$i; ?>
                <tr id="producto<?php echo $i; ?>">
                  <td><?php echo ${$nomProd}[$j-1];?></td><!--Imagen-->
                  <td><?php echo ${$nomProd}[$j+3];?></td><!--Código-->
                  <td><?php echo ${$nomProd}[$j+4];?></td><!--Imagen-->
                  <input
                    type="hidden" id="codigo<?php echo $i ?>"
                    value="<?php echo ${$nomProd}[$j+3];?>"><!--Código-->
                  <td><?php echo 'Q.'.${$nomProd}[$j+1].'.00';?></td><!--Precio-->
                  <td><?php echo ${$nomProd}[$j];  ?></td>
                  <td><?php
                      $subtot = 'subtotal'.$i;
                      ${$subtot}  = ${$nomProd}[$j] * ${$nomProd}[$j+1];
                    echo 'Q.'.${$subtot}.'.00' ;
                  ?></td>
                  <?php $Total = $Total + ${$subtot}?>
                </tr>
                <?php  }?>
              <?php  }?>
            </tbody>
          </table>
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

  <table class="datosTableHidden">
    <thead>
      <th scope="col">PRODUCTO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">CODIGO</th>
      <th scope="col">NUMERO</th>
      <th scope="col">PRECIO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">SUBTOTAL</th>
      <th scope="col">OPCIONES</th>
    </thead>
    <tbody>
      <?php $Total = 0; ?>
      <?php  for ($i=1; $i <= $contItems; $i++){ ?>
        <?php for ($j=1; $j <=1; $j++){ ?>
          <?php $nomProd = 'producto'.$i; ?>
        <tr id="producto<?php echo $i; ?>">
          <td><?php echo ${$nomProd}[$j-1];?></td><!--Imagen-->
          <td><?php echo ${$nomProd}[$j+3];?></td><!--Código-->
          <td><?php echo ${$nomProd}[$j+4];?></td><!--Imagen-->
          <input
            type="hidden" id="codigo<?php echo $i ?>"
            value="<?php echo ${$nomProd}[$j+3];?>"><!--Código-->
          <td><?php echo 'Q.'.${$nomProd}[$j+1].'.00';?></td><!--Precio-->
          <td><?php echo ${$nomProd}[$j];  ?></td>
          <td><?php
              $subtot = 'subtotal'.$i;
              ${$subtot}  = ${$nomProd}[$j] * ${$nomProd}[$j+1];
            echo 'Q.'.${$subtot}.'.00' ;
          ?></td>
          <?php $Total = $Total + ${$subtot}?>
        </tr>
        <?php  }?>
      <?php  }?>
    </tbody>
  </table>

  <?php $this->load->view('datosChekout'); ?>
  <br><br><br><br><br>
  <footer class="footer">
    <a href="/">Terminos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>
</body>
<script type="text/javascript">
$(function (){
  var numero = $('#cartItem_SCI-1 td').eq(3).html();
  console.log(numero)
})
  $("#finalizar").on("click",function(){
    var contador = $('#contItems').val()
    console.log(contador)

    for (var i = 0; i < contador ; i++) {
      var codigo = $('.row-'+i+' td').eq(2).html();
      var numero = $('.row-'+i+' td').eq(3).html();
      var cantidad = $('.row-'+i+' td').eq(6).html();
      console.log(codigo,numero,cantidad)
    }
    var telefono = $('#num_telefono').val()
    var direccion = $('#direccion').val()
    var direccionExacta = $('#dirEspecifico').val()
    console.log(telefono)
    console.log(direccion)
    console.log(direccionExacta)
  });
</script>
</html>
