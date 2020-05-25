<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->load->view('header'); ?>
	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/home.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/carouselInicio.css" media="screen">

  <title>Totocalzado</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <section class="main">
    <?php $this->load->view('carusel'); ?>

  </section>
<!--Ofertas------------------------------------------------------------------->
  <h3 class="categories__title">OFERTAS</h3>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($Ofertas as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt="">
        <div class="carousel-item__details">
          <div>
            <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
              <img
              class="carousel-item__details--img"
              src="<?=$base_url?>/recursos/img/plus-icon.png"
              alt="Plus Icon">
            </a>
          </div>
          <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
          <p class="carousel-item__details--title"><?php echo $key['marca'].' '.$key['estilo']; ?></p>
          <?php if ($key['oferta'] == '0'): ?>
            <p class="carousel-item__details--subtitle"><?php echo 'Q.'.$key['compra'];?></p>
          <?php else: ?>
            <p class="carousel-item__details--subtitle"><?php echo 'OFERTA Q.'.$key['oferta'];?></p>
          <?php endif; ?>
        </div>
      </a>
      </div>
    <?php endforeach; ?>
    </div>
  </section>
  <!--caballeros------------------------------------------------------------------->

  <h3 class="categories__title">Caballeros</h3>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($caballeros as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt=""/>
        <div class="carousel-item__details">
          <div>
            <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
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

  <!--Daams------------------------------------------------------------------->
  <h3 class="categories__title">Damas</h3>
  <section class="carousel">
    <div class="carousel__container">

    <?php foreach ($Damas as $key): ?>
      <div onclick="detalle(<?=$key['id_producto'];?>,'<?=$key['dep']?>')" class="carousel-item">
        <img
        class="carousel-item__img"
        src="<?=$base_url?>/<?=$key['img_carrusel']?>"
        alt=""/>
        <div class="carousel-item__details">
          <div>
            <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto'];?>&dep=<?=$key['dep']?>">
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
    </div>
  </section>
  <?php $this->load->view('FloatingActionButton'); ?>

  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">
  function detalle(id,dep){
    window.location.href = "<?=$base_url?>/proventa/detalle?id="+id+"&dep="+dep+"";
  }
</script>
</html>
