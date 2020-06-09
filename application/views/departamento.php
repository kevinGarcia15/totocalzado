<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <?php $this->load->view('header'); ?>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/departamento.css" media="screen">

  <!-- Title -->
  <title><?php echo (isset($dep))? $dep: 'Oferta' ?></title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="header">
  </header>
  <div class="container">
    <div class="row">
      <?php if (!empty($numeros)): ?>
        <div class="col-xl-2">
          <h5 style="color: white">Tallas</h5>
          <div class="row">
            <?php foreach ($numeros as $key): ?>
              <div class="col-2 col-lg-4 col-sm-3">
                <div class="tallas">
                  <a
                  href="<?=$base_url?>/Departamento/dep?dep=<?=$dep?>&t=<?=$num?>&tallid=<?=$key['id_ncategoria']?>&tall=<?=$key['numero']?>">
                  <?=$key['numero']?>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <?php endif; ?>
      <div class="col-xl-10">
        <div>
          <h2>
            <b>
            <?php echo (isset($dep)) ? $dep.' ('.count($departamentos).')':
            'Ofertas ('.count($departamentos).')';
            ?>
          </b>
        </h2>
        <h5 style="color: white">
          <?php if (isset($numero_elegido)) {echo "Estilos disponibles en talla ".$numero_elegido."";} ?>
        </h5>
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
                    <span>Precio <strong>Q. <?=$key['precio']?></strong>+ Envio gratis</span>
                  <?php else: ?>
                    <strike  style="color: #a00c2f ">Q. <?=$key['precio']?></strike><br>
                    <span>Oferta <strong>Q. <?=$key['oferta']?></strong>+ Envio gratis</span>
                  <?php endif; ?>
                </div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    </div>
  </div>
  <?php $this->load->view('FloatingActionButton'); ?>

  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">

</script>
</html>
