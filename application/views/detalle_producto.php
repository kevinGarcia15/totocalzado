<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.mlens-1.7.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
<!-- Agregamos la librería Simple Cart -->
<script src="<?=$base_url?>/recursos/js/carrito/simpleCart.min.js"></script>
<script src="<?=$base_url?>/recursos/js/carrito/app.js"></script>
<!--Firebase -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>
<script type="text/javascript" src="<?=$base_url?>/recursos/js/firebase/config/ConfigFirebase.js"></script>
<script type="text/javascript" src="<?=$base_url?>/recursos/js/firebase/general.js"></script>
<script type="text/javascript" src="<?=$base_url?>/recursos/js/firebase/auth/autenticacion.js"></script>
<script type="text/javascript" src="<?=$base_url?>/recursos/js/firebase/auth/authController.js"></script>
  <!-- Styles -->
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/footer.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/detalle.css" media="screen">

  <!-- Title -->
  <title>Detalle producto</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="header">
  </header>
<!--Informacion del producto--------------------------------------------------->
  <?php foreach ($detalle as $key): ?>
  <section class="detalle simpleCart_shelfItem">
    <div class="detalle-miniaturas">
      <?php $contImg = 0; foreach ($img as $img_min): ?>
        <a href="#img<?=$contImg?>"><img
        class="detalle-miniaturas__img"
        src="<?=$base_url?>/<?=$img_min['URL']?>"
        alt="min"/></a>
      <?php $contImg = $contImg + 1; endforeach; ?>
    </div>

    <div class="detalle-img">
      <img
        id="imagenPrincipal"
        class="detalle__img item_image"
        src="<?=$base_url?>/<?=$key['img_principal']?>"
        alt=""/>
    </div>

    <div class="detalle-description">
      <p> <?php echo $key['estilo']; ?></p>
      <div class="detalle__item-text">
        <ul>
          <li>
            <?php echo $key['descripcion'] ?>
          </li><br>
          <li>Código: <b class="item_codigo"><?php echo $key['codigo']; ?></b></li>
          <div class="item-pageLink"><a href="https//proventa"></a></div>
          <li>Departamento: <b><?php echo $key['genero']; ?></b></li>
<!--en caso que haya oferta--------------------------------------------------->
          <?php if ($key['oferta'] == '0'): ?>
            <li
              class="item_price">
              Precio:
              <b>Q<?=$key['compra']?></b>
            </li>
          <?php else: ?>
            <li>
            Precio:
            <b><strike>Q<?=$key['compra']?></strike></b>
          </li>
            <li
            class="item_price">
            <b>OFERTA: Q<?=$key['oferta']?></b>
          </li>
          <?php endif; ?>

          <input type="hidden" id="precio" name="precio" value="<?php echo $key['compra']; ?>">
          <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $key['id_producto']; ?>">
        </ul><br>
        <div class="detalle__text-content-select">
          <div class="title-select">Elija la talla</div>
          <select class="item_size" name="" required>
            <option value="0">seleccionar</option>
            <?php foreach ($tallas as $a): ?>
              <option value="<?php echo $a['id_stock']; ?>"><?php echo $a['numero']; ?></option><i></i>
            <?php endforeach; ?>
          </select>
        </div>
        <div id="numero" class="item_name">
        </div>
        <button class="btn btn-success" id="add" type="button" name="button">LO QUIERO</button>
      </div>
    </div>
  </section>
<?php endforeach; ?>

<!--Recmendaciones----------------------------------------------------------------------->
<h3 class="categories__title">También te recomendamos</h3>
<section class="carousel">
  <div class="carousel__container">

  <?php foreach ($recomendacion as $key): ?>
    <div class="carousel-item">
      <img
      class="carousel-item__img"
      src="<?=$base_url?>/<?=$key['img_carrusel']?>"
      alt=""/>
      <div class="carousel-item__details">
        <div>
          <a href="<?=$base_url?>/proventa/detalle?id=<?php echo $key['id_producto']; ?>&dep=<?=$key['dep']?>">
            <img
            class="carousel-item__details--img"
            src="<?=$base_url?>/recursos/img/plus-icon.png"
            alt="Plus Icon">
          </a>
        </div>
        <p class="carousel-item__details--title"><?php echo $key['marca'].' '.$key['estilo']; ?></p>
        <?php if ($key['oferta'] == '0'): ?>
          <p class="carousel-item__details--subtitle"><?php echo 'Q.'.$key['compra'];?></p>
        <?php else: ?>
          <p class="carousel-item__details--subtitle"><?php echo 'OFERTA Q.'.$key['oferta'];?></p>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</section>

  <?php //var_dump($this->session->userdata()); ?>
<?php echo $this->session->USUARIO; ?>
<?php $this->load->view('FloatingActionButton'); ?>
  <footer class="footer">
    <a href="/">Terminos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>

<!--Imagen modal------------------------------------------------------------->
<?php $Next = 0; $Prev = 2; foreach ($img as $imgModal): ?>
    <?php $contPrev = $Prev-$Next;
          ($Prev-$Next == -2) ? $contPrev = 1 : $contPrev;

          $contNext = $Next +1;
          ($contNext == 3) ? $contNext = 0 : $contNext;

    ?>
  <div class="img-modal" id="img<?=$Next?>">
    <h3>CATALOGO</h3>
    <div class="img-modal-princpal">
      <a onclick="clickpage()" href="#img<?=$contPrev?>"><</a>
      <a onclick="clickpage()" href="#img<?=$contNext?>"><img src="<?=$base_url?>/<?=$imgModal['URL']?>"></a>
      <a onclick="clickpage()" href="#img<?=$contNext?>">></a>
    </div>
    <a onclick="go()" class="img-cerrar" href="">X</a>
  </div>
  <?php $Next = $Next+1;  $Prev = $Prev - 1;?>
<?php endforeach; ?>
<!--Imagen modal------------------------------------------------------------->
</body>
<script type="text/javascript">
var contPageClickedModal = 0;
function clickpage(){
  contPageClickedModal = contPageClickedModal - 1
  console.log(contPageClickedModal);
}
function go(){
  window.history.go(contPageClickedModal-1);
  contPageClickedModal = 0;
}

function addCarrito(){
  var precio = $("#precio").val();
  var id_producto = $("#id_producto").val();
  var cantidad = 1;

  var request = $.ajax({
    method: "POST",
    url: "<?=$base_url?>/proventa/add",
    data: {
          id_producto: id_producto,
          precio_producto: precio,
          cantidad: cantidad
        }
  });
  request.done(function(respuesta){
    swal.fire('Agregado al carrito exitosamente')
    console.log(respuesta)
//    location.reload();
  });
}
//validado el select para los numeros
$('#add').on('click', function(){
  var numero = $('.item_size option:selected').text()
  if (numero == 'seleccionar') {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Debe seleccionar un número!',
      footer: '<a href></a>'
    })
  }else {
    Swal.fire(
      'Excelente!',
      'Producto agregado al carrito de compras',
      'success'
    )
  }
})

$('.item_size').on('change', function(){
  var numero = $('.item_size option:selected').text()
  if (numero == 'seleccionar') {
    $('#add').removeClass('item_add')
  }else {
    $('#add').addClass('item_add')
    $('#numero').text(numero)
    console.log(numero)
    console.log('clase agregada')
  }
})
</script>
</html>
