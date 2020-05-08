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
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/registro.css" media="screen">
  <link rel="stylesheet" href="<?=$base_url?>/recursos/css/header.css" media="screen">  <!-- Title -->
  <title>Registro</title>
</head>
<body>
  <header class="header">
    <img class="header__img" src="../assets/logo-platzi-video-BW2.png" alt="Totocalzado">
  </header>
  <section class="register">
    <section class="register__container">
      <h2 style="font-size:25px">Regístrate</h2>
      <div class="register__container--form">
        <input id="nombreContactoReg" class="input" type="text" placeholder="Nombre">
        <input id="emailContactoReg" class="input" type="text" placeholder="Correo">
        <input id="telefonoContactoReg" class="input" type="number" min="10000000" max="99999999" placeholder="Teléfono">
        <input id="passwordReg" class="input" type="password" placeholder="Contraseña">
        <button id="btnRegistroEmail" class="button">Registrarme</button>
      </div>
      <a href="<?=$base_url?>/loggin">Iniciar sesión</a>
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
<script type="text/javascript" src="../recursos/js/firebase/config/ConfigFirebase.js"></script>
<script type="text/javascript" src="../recursos/js/firebase/general.js"></script>
<script type="text/javascript" src="../recursos/js/firebase/auth/autenticacion.js"></script>
<script type="text/javascript" src="../recursos/js/firebase/auth/authController.js"></script>

</html>
