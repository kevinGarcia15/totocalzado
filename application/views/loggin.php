<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/loggin.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">

  <!-- Title -->
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
        <div class="login__container--register"><img src="./recursos/img/google-icon.png"> <a id="authGoogle" href="#">Inicia sesión con Google</a></div>
        <div class="login__container--register"><img src="./recursos/img/Facebook-icon.png"><a id="authFB" href="#">Inicia sesión con Facebook</a></div>
      </section>
      <p
        class="login__container--register">No tienes ninguna cuenta
        <a href="<?=$base_url?>/loggin/registro">Regístrate</a>
      </p>
    </section>
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
<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>


<!--build:js js/main.min.js -->
<script type="text/javascript" src="./recursos/js/firebase/config/ConfigFirebase.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/general.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/auth/autenticacion.js"></script>
<script type="text/javascript" src="./recursos/js/firebase/auth/authController.js"></script>

</html>
