<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Fonts -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/home.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <!-- Title -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
      <div class="carousel-item">
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
      <div class="carousel-item">
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
      <div class="carousel-item">
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

  <footer class="footer">
    <a href="/">Terminos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>
</body>
</html>
