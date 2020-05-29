<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<header class="header">
  <a href="<?=$base_url?>">
    <img
      class="header__img"
      src="<?=$base_url?>/recursos/img/logo.png"
      alt="Totocalzado">
  </a>

  <div class="rigth__menu">
<!--carrito de detalles-------------------------------------------------------->
    <div class="carrito">
      <div class="carrito-total">
        <img src="<?=$base_url?>/recursos/img/carrito-compras-white.png" alt="shop">
        <div class="css-901oao r-1awozwy r-urgr8i r-f6ebdl r-sdzlij r-1phboty
        r-rs99b7 r-1tjplnt r-jwli3a r-6koalj r-1q142lx r-1qd0xha r-1gkfh8e
        r-16dba41 r-50lct3 r-1777fci r-ad9z0x r-1b8eohn r-u8s1d r-kquydp r-1m4drjs
        r-3s2u2q r-qvutc0 simpleCart_quantity">
        </div>
      </div>
      <div class="bolsa">
        <div class="simpleCart_items"></div>
        <div class="opciones">
          <a class="boton simpleCart_empty btn btn-danger" href="javascript:void(0)">Vaciar carrito</a>
          <a class="boton simpleCart_checkout btn btn-success" href="#">Pagar</a>
        </div>
      </div>
    </div>
<!--menu perfil---------------------------------------------------------------->
    <div class="header__menu">
      <div class="header__menu--profile">
        <img id="avatar"<?php echo (isset($this->session->PHOTO_URL)) ?
        'src="'.$this->session->PHOTO_URL.'" alt="Avatar">'
        :'src="'.$base_url.'/recursos/img/user-icon.png" alt="Avatar">' ?>
      </div>
      <ul>
        <li><?php echo $this->session->USUARIO; ?></li>
        <li>
        <?php if ($this->session->USUARIO){?>
          <a id="salir" href="#">Salir</a>
        <?php }else {?>
          <a id="btnInicioSesion" href="<?=$base_url?>/Loggin">Iniciar sesión</a>
          <a id="btnInicioSesion" href="<?=$base_url?>/loggin/registro">Registrate</a>
          <?php } ?>
      </ul>
    </div>
  </div>
</header>
<br id="space">
<!--Admin----------------------------------------------------------------->
<div class="menu-secundario">
  <div class="topnav" id="myTopnav">
   <a  id="textMenuHover" href="<?=$base_url?>" class="active">Menú</a>

  <?php if ($this->session->ROL == "Admin"): ?>
    <div class="dropdown-second">
      <button class="dropbtn">Administrador
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="<?=$base_url?>/Producto/nuevo">Producto</a>
        <a href="<?=$base_url?>/Venta/nuevaVenta">Venta</a>
        <a href="<?=$base_url?>/Informes/mostrar">Inventario</a>
        <a href="<?=$base_url?>/Venta/productosVendidosHoy">Productos vendidos</a>
        <a href="<?=$base_url?>/Informes/mostrarPedidos">pedidos</a>
      </div>
    </div>
  <?php endif; ?>

   <div class="dropdown-second">
     <button class="dropbtn">Categorías
       <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-content">
       <a href="<?=$base_url?>/Departamento/dep?dep=Caballero">Caballero</a>
       <a href="<?=$base_url?>/Departamento/dep?dep=Dama">Dama</a>
       <a href="<?=$base_url?>/Departamento/dep?dep=Niño">Niño</a>
       <a href="<?=$base_url?>/Departamento/dep?dep=Niña">Niña</a>
     </div>
   </div>

   <div class="dropdown-second">
     <button class="dropbtn">Nuestros productos
       <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-content" id="etiqueta">
     </div>
   </div>
   <a class="dropbtn" href="<?=$base_url?>/Departamento/oferta">OFERTAS</a>
   <a
     id="btnModal"
     type="button"
     class="trigger"
     data-toggle="modal"
     data-target="#contacto"
     data-whatever="@mdo"
     href="#"
    >
     Contacto
   </a>
   <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
 </div>
</div>
<?php $this->load->view('modalContacto'); ?>


<script type="text/javascript">
//funcion Ajax para buscar en base de datos a los proveedores
  $(function(){
    $.post('<?=$base_url?>/Informes/etiqueta').done(function(respuesta){
      $('#etiqueta').html(respuesta);
    });
  })

  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
