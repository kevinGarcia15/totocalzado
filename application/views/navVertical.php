
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="<?=$base_url?>/recursos/img/juanita.jpg" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">TOTOCALZADO</h4>
        <p class="font-weight-light text-muted mb-0"></p>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Atajos</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="<?=$base_url?>/inicio" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-home mr-3"></i>
                Inicio
            </a>
    </li>
    <li class="nav-item">
      <a href="<?=$base_url?>/venta/nuevaVenta" class="nav-link text-dark font-italic">
                <i class="fa fa-plus mr-3"></i>
                Nueva venta
            </a>
    </li>
    <li class="nav-item">
      <a href="<?=$base_url?>/producto/nuevo" class="nav-link text-dark font-italic">
                <i class="fa fa-plus mr-3"></i>
                Nuevo poroducto
            </a>
    </li>
    <li class="nav-item">
      <a href="<?=$base_url?>/informes/mostrar" class="nav-link text-dark font-italic">
                <i class="fa fa-list mr-3"></i>
                Inventaio
            </a>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->
<script>
$(function() {
// Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
  	$('#sidebar, #content').toggleClass('active');
  });
});
</script>
<!-- End demo content -->
