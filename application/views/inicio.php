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
    <!--Ver mas-->
      <div class="carousel-item">
        <a href="<?=$base_url?>/Departamento/dep?dep=Caballero&t=7">
          <img
          class="carousel-item__img"
          src="<?=$base_url?>/recursos/img/ver-mas.jpg"
          alt=""/>
        </a>
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
    <!--Ver mas-->
      <div class="carousel-item">
        <a href="<?=$base_url?>/Departamento/dep?dep=Dama&t=8">
          <img
          class="carousel-item__img"
          src="<?=$base_url?>/recursos/img/ver-mas.jpg"
          alt=""/>
        </a>
      </div>
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

  $('#arrow-left').hide()
</script>
</html>
