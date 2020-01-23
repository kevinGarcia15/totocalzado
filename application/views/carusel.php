<!--carrusel-->
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="efecto">
  <!-- Indicators -->
    <ul class="carousel-indicators ">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
    </ul>

  <!-- The slideshow -->
    <div class="carousel-inner ">
      <div class="carousel-item active">
        <img src="<?=$base_url?>/recursos/img/slide_1.png"  style="width: 100%;">
      </div>
      <div class="carousel-item">
        <img src="<?=$base_url?>/recursos/img/slide_2.png" style="width: 100%;">
      </div>
    </div>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</div>
