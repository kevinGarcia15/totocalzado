<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
    <?php $this->load->view('header'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/loggin.css" media="screen">

  <title>Inicia Sesión</title>
</head>
<body>
  <?php $this->load->view('menu'); ?>
  <header class="header">
  </header>
  <section class="login">
    <section class="login__container">
      <h2 style="font-size: 25px">Inicia sesión</h2>
      <div class="login__container--form">
        <input id="emailSesion" class="input" type="email" placeholder="Correo">
        <input id="passwordSesion" class="input" type="password" placeholder="Contraseña">
        <button id="btnInicioEmail" class="button">Iniciar sesión</button>
        <div class="login__container--remember-me">
          <a href="/">Olvidé mi contraseña</a>
        </div>
      </div>
      <section class="login__container--social-media">
        <div class="login__container--register"><img src="<?=$base_url?>/recursos/img/google-icon.png"> <a id="authGoogle" href="#">Inicia sesión con Google</a></div>
        <div class="login__container--register"><img src="<?=$base_url?>/recursos/img/facebook-icon.png"><a id="authFB" href="#">Inicia sesión con Facebook</a></div>
      </section>
      <p
        class="login__container--register">No tienes ninguna cuenta
        <a href="<?=$base_url?>/loggin/registro">Regístrate</a>
      </p>
    </section>
  </section>

  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    Swal.fire(
  '',
  'Debes iniciar sesión para poder solicitar un producto',
  'warning'
  )
});
</script>
</html>
