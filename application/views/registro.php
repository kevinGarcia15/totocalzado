<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php $this->load->view('header'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/registro.css" media="screen">
  <title>Registro</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="header">
  </header>
  <section class="register">
    <section class="register__container">
      <h2 style="font-size:25px">Regístrate</h2>
      <div class="register__container--form">
        <input id="nombreContactoReg" class="input" type="text" placeholder="Nombre">
        <input id="emailContactoReg" class="input" type="text" placeholder="Correo">
        <input id="passwordReg" class="input" type="password" placeholder="Contraseña">
        <button id="btnRegistroEmail" class="button">Registrarme</button>
      </div>
      <a href="<?=$base_url?>/loggin">Iniciar sesión</a>
    </section>
  </section>
  <?php $this->load->view('footer'); ?>
</body>
</html>
