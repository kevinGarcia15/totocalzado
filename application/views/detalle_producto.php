<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.mlens-1.7.min.js"></script>
  <script src="<?=$base_url?>/recursos/js/sweetalert.min.js"></script>



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
  <section class="detalle">
    <div class="detalle-miniaturas">
      <?php $contImg = 0; foreach ($img as $img_min): ?>
        <img
        onclick="cambiarImagen(<?php echo $contImg; ?>)"
        class="detalle-miniaturas__img"
        src="<?php echo $img_min['URL']; ?>"
        alt="min"/>
      <?php $contImg = $contImg + 1; endforeach; ?>
    </div>
    <div class="detalle-img">
      <img
        id="imagenPrincipal"
        class="detalle__img"
        src="<?php echo $key['img_principal']?>"
        alt=""/>
    </div>

    <div class="detalle-description">
      <h4><?php echo $key['estilo']; ?></h4>
      <div class="detalle__item-text">
        <ul>
          <li>
            <?php echo $key['descripcion'] ?>
          </li><br>
          <li>Código: <b><?php echo $key['codigo']; ?></b></li>
          <li>Departamento: <b><?php echo $key['genero']; ?></b></li>
          <li>Precio: <b>GTQ.<?php echo $key['compra']; ?></b></li>
          <input type="hidden" id="precio" name="precio" value="<?php echo $key['compra']; ?>">
          <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $key['id_producto']; ?>">
        </ul><br>
        <div class="detalle__text-content-select">
          <h3>Elija la talla</h3>
          <select class="" name="">
            <?php foreach ($tallas as $a): ?>
              <option value="<?php echo $a['id_stock']; ?>"><?php echo $a['numero']; ?></option><i></i>
            <?php endforeach; ?>
          </select>
        </div>
        <button onclick="addCarrito()" type="button" name="button">Lo Quiero</button>
      </div>
    </div>
  </section>
<?php endforeach; ?>
<!--Recmendaciones----------------------------------------------------------------------->
  <h1 class="categories__title">Tambien te recomendamos</h1>
  <section class="carousel">
    <div class="carousel__container">

      <div class="carousel-item">
        <img
          class="carousel-item__img"
          src="https://www.podoactiva.com/sites/default/files/blog_35.jpg"
          alt=""/>
        <div class="carousel-item__details">
          <div>
            <a href="<?=$base_url?>/proventa/detalle">
              <img
                class="carousel-item__details--img"
                src="./recursos/img/plus-icon.png"
                alt="Plus Icon">
              </a>
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/1427741/pexels-photo-1427741.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img
          class="carousel-item__img"
          src="https://lh3.googleusercontent.com/J8eBNM7g5XpzQD7ik5zrIGGrxrwIe3_VZnKD0SkmCMq8hnRdqAorJNqZeWmkgBBr3yWEUS44f6sPoWrrZZ7Iirg5Gs-8CiWU_X_mE3klRqRua6hgDcsr2r8Pf5jBftDpYxgkf2EP1gSDhOhqUm-4VhiATmWutqwWj5qGxr-MfwX9EgkWMwc-r9hzjJsTzRhGVEHeg4Li3KYp_CUnf4no0T1xqKfh_j-eTaYyD8XftR3DAHycgzuOGn6lXTmCckzsQA_WVkqdjLq3PdfsmmLLi6vHED4VtV_0sOzm91gpjQ_QVLR7otutXVOXqeV1r5HvCkbH-oHhG_RNnD8i7KtijO9_WCKZZyJUh62kNk1NybFGM1TyyJSqE1xYEupw8Pxd7i1f4s_kWiUoR2lf7f6SlOWbnbWeoNZ4ipSbQqfMuwQo5yOtWxw3QPkVW29NmbOLOcBaJ80Gg9FXKWsKHwr78K31mZT9wm0PwyfymnRa7M_lfUtsy90B4fsGHWtXIuLC1iqLGCVHu8us7HQInqTghRWaWdHKcX3h__NQBds8-rgN_cTn7Ud8LbDYuGDnncpmHYNV2Mz3dGqWXNnsUDNhSZX99_C8XzFo-XnWYNhAXG7s1M1diTriNnIDwxAmOAd_NxElbfP6Ma1zwzNc8-Yr322chk5XrEAOXpq2IqSS1C6OUpXZXdeiliL9MdRUvYpLivXxKrmIvLE5TiOm-Dl3TvXxDWAHLsUGW9TBWDLOMg249_A_ADVViH4=w704-h939-no" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/904276/pexels-photo-904276.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/1172207/pexels-photo-1172207.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&w=500" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/233129/pexels-photo-233129.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/1666779/pexels-photo-1666779.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/413879/pexels-photo-413879.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""  />
        <div class="carousel-item__details">
          <div>
            <img
              class="carousel-item__details--img"
              src="./recursos/img/plus-icon.png"
              alt="Plus Icon">
          </div>
          <p class="carousel-item__details--title">Título descriptivo</p>
          <p class="carousel-item__details--subtitle">2019 16+ 114 minutos</p>
        </div>
      </div>

    </div>
  </section>
  <?php var_dump($this->session->userdata()); ?>

  <footer class="footer">
    <a href="/">Terminos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>
</body>
<!-- Agregamos la librería jQuery (Importante)-->
<script src="<?=$base_url?>/recursos/js/carrito/jquery.min.js"></script>
<!-- Agregamos la librería Simple Cart -->
<script src="<?=$base_url?>/recursos/js/carrito/simpleCart.min.js"></script>
<!-- Código JS de inicialización  -->
<script src="<?=$base_url?>/recursos/js/carrito/app.js"></script>
<script type="text/javascript">
  function cambiarImagen(i){
    var img_min = $(".detalle-miniaturas").children().eq(i).attr("src")
    console.log(img_min)
    $("#imagenPrincipal").attr("src",img_min)
    mlens()
  }

function mlens(){
    $("#imagenPrincipal").mlens(
    {
        imgSrc: $("#imagenPrincipal").attr("data-big"),   // path of the hi-res version of the image
        lensShape: "square",                // shape of the lens (circle/square)
        lensSize: 180,                  // size of the lens (in px)
        borderSize: 4,                  // size of the lens border (in px)
        borderColor: "#fff",                // color of the lens border (#hex)
        borderRadius: 0,                // border radius (optional, only if the shape is square)
        imgOverlay: $("#imagenPrincipal").attr("data-overlay"), // path of the overlay image (optional)
        overlayAdapt: true // true if the overlay image has to adapt to the lens size (true/false)
    });
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
    swal('Agregado al carrito exitosamente')
    console.log(respuesta)
//    location.reload();
  });
}
</script>
</html>