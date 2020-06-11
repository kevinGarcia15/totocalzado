<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Font -->
    <?php $this->load->view('header'); ?>
  <!-- Data tables------------------------------------------------------------>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  <!--glip icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- Title -->
  <title>Pedidos en transito</title>
</head>
<style media="screen">
  body{
    background: #1976D2;

  }
  .main{
    display: flex;
    justify-content: center;
    width: 100%;
  }
  .table{
    width: 90%;
  }
  .pagination{display: flex !important;}
</style>
<body>
  <?php $this->load->view('menu'); ?>
  <br><br><br>
  <div class="main">
    <div class="table table-responsive">
      <table id="example" class="table table-striped" style="width: 100%;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha de pedido</th>
            <th scope="col">Aldea</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php  if(!empty($pedidos)):?>
            <?php  foreach($pedidos as $xRenglon):?>
              <?php //controla el estado de los botones
              $classButton = "";
              $classIcon = "";
              $buttonsStatus = "";
              $textState = "";
              $textClassState = "";

                if ($xRenglon['estado'] == 'A') {
                  $textState = 'Espera';
                  $textClassState = '#ffc107';
              }else {
                $textState = 'Despachado';
                $textClassState = '#28a745';
              }//----------------------
              ?>

              <tr>
                <td><?php echo $xRenglon['id_pedidos']; ?></td>
                <td><?php echo $xRenglon['usuario']; ?></td>
                <td><?php echo $xRenglon['fecha']?></td>
                <td><?php echo $xRenglon['aldea'];?></td>
                <td><?php echo $xRenglon['dirEnv'];?></td>
                <td><?php echo $xRenglon['tel'];?></td>
                <td style="background: <?=$textClassState?>">
                  <?php echo $textState;?>
                </td>
                <td>
                  <a
                    href="<?=$base_url?>/informes/detallepedidos?id=<?=$xRenglon['id_pedidos']?>"
                    title="Ver más"
                    type="button" class="btn btn-warning">
                    <i class="fas fa-info"></i>
                  </a>
                </td>
              </tr>
            <?php  endforeach;?>
          <?php  endif;?>
        </tbody>
      </table>
    </div>
    </div>
  <?php $this->load->view('footer'); ?>
</body>
<script type="text/javascript">
$(document).ready(function() {
  var groupColumn = 2;
  var table = $('#example').DataTable({
    "language": {
          "lengthMenu": "_MENU_",
          "zeroRecords": "Ningún registro",
          "searchPlaceholder": "Buscar",
          "info": "_TOTAL_ registro(s)",
          "infoEmpty": "Ningun registro",
          "infoFiltered": "(Busqueda en _MAX_ registros)",
          "search": "",
          "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
          },
      },
      "columnDefs": [
          { "visible": false, "targets": groupColumn }
      ],
      "order": [[ groupColumn, 'desc' ]],
      "displayLength": 10,
      "drawCallback": function ( settings ) {
          var api = this.api();
          var rows = api.rows( {page:'current'} ).nodes();
          var last=null;

          api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                  $(rows).eq( i ).before(
                      '<tr class="group" style="font-weight: bold;"><td colspan="6">'+group+'</td></tr>'
                  );

                  last = group;
              }
          } );
      }
  } );

  // Order by the grouping
  $('#example tbody').on( 'click', 'tr.group', function () {
      var currentOrder = table.order()[3];
      if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
          table.order( [ groupColumn, 'desc' ] ).draw();
      }
      else {
          table.order( [ groupColumn, 'asc' ] ).draw();
      }
  } );
} );
</script>
</html>
