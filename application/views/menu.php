<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$Total = 0;
$cont = $this->session->userdata('cont');
for ($i=1; $i < $cont ; $i++) {
  $Total = $Total + $this->session->userdata('item'.$i)['precio'];
}
?>
<header class="header">
  <a href="<?=$base_url?>">
    <img
      class="header__img"
      src="<?=$base_url?>/recursos/img/logo.png"
      alt="Totocalzado">
  </a>
  <div class="rigth__menu">
    <div class="header__menu">
      <div class="header__menu--profile">
        <img id="avatar"<?php echo (isset($this->session->PHOTO_URL)) ?
        'src="'.$this->session->PHOTO_URL.'" alt="Avatar">'
        :'src="'.$base_url.'/recursos/img/user-icon.png" alt="Avatar">' ?>
        <p>Perfil</p>
      </div>
      <ul>
        <li><?php echo $this->session->USUARIO; ?></li>
        <li>
          <a id="btnInicioSesion" href="<?=$base_url?>/loggin">Iniciar sesión</a>
        </li>
        <li>
          <a href="<?=$base_url?>/producto/nuevo">Producto</a>
        </li>
        <li>
          <a href="<?=$base_url?>/venta/nuevaVenta">Venta</a>
        </li>
        <li>
          <a href="<?=$base_url?>/informes/mostrar">Inventario</a>
        </li>
        <li>
          <a href="<?=$base_url?>/venta/productosVendidosHoy">Productos vendidos</a>
        </li>
      </ul>
    </div>
    <?php if ($this->session->userdata('item1')): ?>
      <div class="carrito-total">
        <img src="<?=$base_url?>/recursos/img/carrito-compras.png" alt="">
        <a href="">2 (Q. <?php echo $Total; ?>)</a>
      </div>
    <?php endif; ?>
  </div>
</header>
