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
          <?php if ($this->session->USUARIO){?>
            <a id="salir" href="#">Salir</a>
          <?php }else {?>
            <a id="btnInicioSesion" href="<?=$base_url?>/loggin">Iniciar sesión</a>
            <?php } ?>
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
<!--carrito de detalles-------------------------------------------------------->
    <div class="carrito">
      <div class="carrito-total">
        <img src="<?=$base_url?>/recursos/img/carrito-compras.png" alt="">
        <span class="simpleCart_quantity">0</span>Producto(s)
        <span class="simpleCart_total">Q. 0.00</span>
      </div>
      <div class="bolsa">
        <div class="simpleCart_items"></div>
        <div class="opciones">
          <a class="boton simpleCart_empty btn btn-danger" href="javascript:void(0)">Vaciar carrito</a>
          <a class="boton simpleCart_checkout btn btn-success" href="#">Pagar</a>
        </div>
      </div>
    </div>
  </div>
</header>
