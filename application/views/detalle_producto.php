<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <?php $this->load->view('header'); ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
  <!-- Styles -->
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
          <img
          id="myImg<?=$contImg?>"
          class="detalle-miniaturas__img"
          src="<?=$base_url?>/<?=$img_min['URL']?>"
          alt="CATALOGO"/>
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
      <p> <?php echo $key['marca'].' '.$key['estilo']; ?></p>
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
        <button
          class="btn btn-success"
          id="add"
          type="button"
          name="button">
          LO QUIERO
        </button>
        <div class="pedir_whatsapp">
          Ó
          <button
          id="btn_silicitar_whatsapp"
          class="btn"
          type="button">
          SOLICITAR POR whatsapp
          <img
          src="<?=$base_url?>/recursos/img/icon-whatsapp.png"
          alt="whatsapp"
          style="width:21px;margin-left: 8px;"
          >
        </button>
        </div>
      </div>
    </div>
  </section>
<?php endforeach; ?>

<!--Recmendaciones----------------------------------------------------------------------->
<h3 class="categories__title">También te recomendamos</h3>
<section class="carousel">
  <div class="carousel__container">

  <?php foreach ($recomendacion as $key): ?>
    <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
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
<?php $this->load->view('FloatingActionButton'); ?>
  <?php $this->load->view('footer'); ?>
<!--Imagen modal------------------------------------------------------------->
<!-- The Modal -->
<div id="myModal" class="modal">
  <img  class="modal-content" id="img01">
  <div class="modal-options">
    <div id="caption"></div>
    <span id="close" class="close">&times;</span>
  </div>
</div>
<!--Imagen modal------------------------------------------------------------->
</body>
<script type="text/javascript">
$( document ).ready(function() {


  //lightbox
  var modal = document.getElementById("myModal");
  var img0 = document.getElementById("myImg0");
  var img1 = document.getElementById("myImg1");
  var img2 = document.getElementById("myImg2");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  var x = 0;
  img0.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
  img1.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
  img2.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  var span = document.getElementById("close");
  span.onclick = function() {
    var myImg = document.getElementById("img01");
    var currWidth = myImg.clientWidth;
    if (currWidth >= 1190) {
      myImg.style.width = (700) + "px";
    }else if (currWidth >= 850) {
      myImg.style.width = (400) + "px";
    }
    modal.style.display = "none";
  }
  $('#img01').on('dblclick' ,function(){
    var myImg = document.getElementById("img01");
    var currWidth = myImg.clientWidth;

    if (currWidth >= 1190) {
      myImg.style.width = (700) + "px";
    }else if (currWidth >= 850) {
      myImg.style.width = (400) + "px";
    }else {
      myImg.style.width = (currWidth + 500) + "px";
    }
  })
  //fin lightbox

  //validado el select para los numeros
  $('#add').on('click', function(){
    var numero = $('.item_size option:selected').text()
    if (numero == 'seleccionar') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar una talla!',
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
    }
  })

  function detalle(id,dep){
    window.location.href = "<?=$base_url?>/proventa/detalle?id="+id+"&dep="+dep+"";
  }

  $("#btn_silicitar_whatsapp").on('click', function(){
    var numero = $('.item_size option:selected').text()
    var id_stock = $('.item_size option:selected').val()
    if (numero == 'seleccionar') {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debe seleccionar una talla!',
        footer: '<a href></a>'
      })
    }else {
      var txt = "https://wa.me/50259788865?text=Hola,%20me%20interesa%20el%20calzado:%20<?=$detalle[0]['marca']?>%20codigo:<?=$detalle[0]['codigo']?>%20y%20numero%20"+numero+".%20Gracias"
      location.href = txt;
    }
  })
});
</script>
</html>
