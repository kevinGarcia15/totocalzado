<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->load->view('header'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/home.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/carouselInicio.css" media="screen">
<?php $inicio = true; ?>
  <title>Totocalzado</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <section class="main">
    <?php $this->load->view('carusel'); ?>
  </section>
<!--Ofertas------------------------------------------------------------------->
<?php if (!empty($Ofertas)): ?>
  <div class="title-carousel">
    <a href="<?=$base_url?>/Departamento/oferta">
      <h3 class="categories__title">OFERTAS</h3></a>
    </div><br><br><br>
    <section class="carousel">
      <div class="carousel__container">

        <?php foreach ($Ofertas as $key): ?>
          <div
          onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')"
          class="carousel-item">
          <img
          class="carousel-item__img"
          src="<?=$base_url?>/<?=$key['img_carrusel']?>"
          alt="">
          <div class="item">
            <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
              <div class="detalle">
                <h5><?=$key['marca'].' '.$key['estilo']?></h5>
                <?php if ($key['oferta'] == '0'): ?>
                  <span>Precio <strong>Q. <?=$key['compra']?></strong>+ Envio gratis</span>
                <?php else: ?>
                  <strike  style="color: #a00c2f ">Q. <?=$key['compra']?></strike><br>
                  <span>Oferta <strong>Q. <?=$key['oferta']?></strong>+ Envio gratis</span>
                <?php endif; ?>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>

  <!--caballeros------------------------------------------------------------------->
<div class="title-carousel">
<a href="<?=$base_url?>/Departamento/dep?dep=Caballero&t=7">
  <h3 class="categories__title">Caballeros</h3>
</a><br><br><br>
</div>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($caballeros as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt=""/>
        <div class="item">
          <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
            <div class="detalle">
              <h5><?=$key['marca'].' '.$key['estilo']?></h5>
              <?php if ($key['oferta'] == '0'): ?>
                <span>Precio <strong>Q. <?=$key['compra']?></strong>+ Envio gratis</span>
              <?php else: ?>
                <strike  style="color: #a00c2f ">Q. <?=$key['compra']?></strike><br>
                <span>Oferta <strong>Q. <?=$key['oferta']?></strong>+ Envio gratis</span>
              <?php endif; ?>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <!--Ver mas-->
      <div class="carousel-item">
        <div class="carousel-item-verMas">
        <a href="<?=$base_url?>/Departamento/dep?dep=Caballero&t=7">
          <h1>VER MAS</h1>
        </a>
        </div>
      </div>
    </div>
  </section>

  <!--Daams------------------------------------------------------------------->
  <a href="<?=$base_url?>/Departamento/dep?dep=Dama&t=8">
    <h3 class="categories__title">Damas</h3>
  </a><br><br><br>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($Damas as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt=""/>
        <div class="item">
          <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
            <div class="detalle">
              <h5><?=$key['marca'].' '.$key['estilo']?></h5>
              <?php if ($key['oferta'] == '0'): ?>
                <span>Precio <strong>Q. <?=$key['compra']?></strong>+ Envio gratis</span>
              <?php else: ?>
                <strike  style="color: #a00c2f ">Q. <?=$key['compra']?></strike><br>
                <span>Oferta <strong>Q. <?=$key['oferta']?></strong>+ Envio gratis</span>
              <?php endif; ?>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <!--Ver mas-->
      <div class="carousel-item">
        <div class="carousel-item-verMas">
          <a href="<?=$base_url?>/Departamento/dep?dep=Dama&t=8">
            <h1>VER MAS</h1>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!--caballeros------------------------------------------------------------------->
<div class="title-carousel">
<a href="<?=$base_url?>/Departamento/dep?dep=Niño&t=2">
  <h3 class="categories__title">Niños</h3>
</a><br><br><br>
</div>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($niños as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt=""/>
        <div class="item">
          <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
            <div class="detalle">
              <h5><?=$key['marca'].' '.$key['estilo']?></h5>
              <?php if ($key['oferta'] == '0'): ?>
                <span>Precio <strong>Q. <?=$key['compra']?></strong>+ Envio gratis</span>
              <?php else: ?>
                <strike  style="color: #a00c2f ">Q. <?=$key['compra']?></strike><br>
                <span>Oferta <strong>Q. <?=$key['oferta']?></strong>+ Envio gratis</span>
              <?php endif; ?>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <!--Ver mas-->
      <div class="carousel-item">
        <div class="carousel-item-verMas">
        <a href="<?=$base_url?>/Departamento/dep?dep=Niño&t=2">
          <h1>VER MAS</h1>
        </a>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('FloatingActionButton'); ?>
  <?php $this->load->view('footer'); ?>
</body>

<script type="text/javascript">
	$(document).ready(function(){
    var screenWidth = 0;
    screen.width > 600 ? screenWidth = 472 : screenWidth = 311
    /*Swal para promocion especial*/
      // Swal.fire({
      //   imageUrl: '<?=$base_url?>/recursos/img/anuncio-fb-liviano.jpg',
      //   imageHeight: screenWidth,
      //   imageAlt: 'A tall image',
      //   showCancelButton: true,
      //   cancelButtonText: 'Cerrar',
      //   cancelButtonColor: '#d33',
      //   confirmButtonText: 'Ir',
      // }).then((result) => {
      //   if (result.value) {
      //     window.location.href = "<?=$base_url?>/Departamento/tag?tag=Para trabajo";
      //   }
      // })
});
  function detalle(id,dep){
    window.location.href = "<?=$base_url?>/proventa/detalle?id="+id+"&dep="+dep+"";
  }

  $('#arrow-left').hide()
</script>
</html>
