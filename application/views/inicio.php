<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <!-- Styles -->
	<link rel="stylesheet" href="<?=$base_url?>/recursos/css/home.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">
  <!-- Title -->
  <title>Totocalzado</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <section class="main">
    <h2 class="main__title">¿Qué quieres ver hoy?</h2>
    <input type="text" class="input" placeholder="Buscar...">
  </section>
  <h3 class="categories__title">Caballeros</h3>
  <section class="carousel">
    <div class="carousel__container">
<?php foreach ($caballeros as $key): ?>
  <div class="carousel-item">
    <img
    class="carousel-item__img"
    src="<?php echo $key['img_carrusel'] ?>"
    alt=""/>
    <div class="carousel-item__details">
      <div>
        <a href="<?=$base_url?>/proventa/detalle?id=<?php echo $key['id_producto']; ?>">
          <img
          class="carousel-item__details--img"
          src="./recursos/img/plus-icon.png"
          alt="Plus Icon">
        </a>
      </div>
      <p class="carousel-item__details--title"><?php echo $key['marca'].' '.$key['estilo']; ?></p>
      <p class="carousel-item__details--subtitle"><?php echo 'GTQ.'.$key['compra'];?></p>
    </div>
  </div>
<?php endforeach; ?>

    </div>
  </section>

  <h3 class="categories__title">Damas</h3>

  <section class="carousel">
    <div class="carousel__container">

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/789822/pexels-photo-789822.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""  />
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
        <img class="carousel-item__img" src="https://images.pexels.com/photos/705792/pexels-photo-705792.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt=""  />
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

  <h3 class="categories__title">Niños</h3>

  <section class="carousel">
    <div class="carousel__container">

      <div class="carousel-item">
        <img class="carousel-item__img" src="https://images.pexels.com/photos/789822/pexels-photo-789822.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""  />
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
        <img class="carousel-item__img" src="https://images.pexels.com/photos/705792/pexels-photo-705792.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt=""  />
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

  <footer class="footer">
    <a href="/">Terminos de uso</a>
    <a href="/">Declaración de privacidad</a>
    <a href="/">Centro de ayuda</a>
  </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>


<!--build:js js/main.min.js -->
<script type="text/javascript" src="./recursos/js/firebase/config/ConfigFirebase.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/general.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/auth/autenticacion.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/auth/authController.js"></script>

</html>
