<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary horizontal-nav">
  <a class="navbar-brand" href="<?=$base_url?>">TOTOCALZADO</a>
  <!-- Toggle button -->
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=$base_url?>">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$base_url?>/producto/nuevo">Producto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$base_url?>/venta/nuevaVenta">Venta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$base_url?>/informes/mostrar">Inventario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$base_url?>/venta/productosVendidosHoy">Productos vendidos</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="ingresa código">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
<!-- Vertical navbar -->

<!-- End vertical navbar -->
