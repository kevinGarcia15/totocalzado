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
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/departamento.css" media="screen">

  <!-- Title -->
  <title><?=$dep?></title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="header">
  </header>
  <div class="container">
    <div class="">
      <h2><b><?=$dep?> (<?=count($departamentos)?>)</b></h2>
    </div>
    <div class="row">

<?php foreach ($departamentos as $key): ?>
  <div class="col-lg-4 col-sm-12">
    <div class="item">
      <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto']?>&dep=<?=$key['genero']?>">
        <div class="item-img">
          <img src="<?=$base_url?>/<?=$key['img_principal']?>" alt="">
        </div>
      </a>
      <a href="<?=$base_url?>/proventa/detalle?id=<?=$key['id_producto']?>&dep=<?=$key['genero']?>">
        <div class="detalle">
          <h5><?=$key['marca'].' '.$key['estilo'].' '.$key['color']?></h5>
          <span>Cod. <?=$key['codigo']?></span>
            <?php if ($key['oferta'] == '0'): ?>
              <span>Precio <strong>Q. <?=$key['precio']?></strong></span>
            <?php else: ?>
              <strike  style="color: #a00c2f ">Q. <?=$key['precio']?></strike><br>
              <span>Oferta <strong>Q. <?=$key['oferta']?></strong></span>
            <?php endif; ?>

        </div>
      </a>
    </div>
  </div>
<?php endforeach; ?>

    </div>
  </div>
  <?php $this->load->view('FloatingActionButton'); ?>

  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">

</script>
</html>
