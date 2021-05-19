<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Venta_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	public function nuevaVenta(){
		$data['base_url'] = $this->config->item('base_url');

		if (isset($_POST['guardar'])) {
			$elementos = count($_POST['id_producto']);

			for ($i=0; $i < $elementos; $i++) {
				$numero = $_POST['numero'];
				$cantidad = $_POST['cantidad'];
				$precioUnidad = $_POST['precioUnidad'];
				$id_producto = $_POST['id_producto'];
				$montoTotal = $cantidad[$i] * $precioUnidad[$i];
			$this->Venta_model->ingresarVenta($cantidad[$i],$precioUnidad[$i],
																				$montoTotal,$id_producto[$i],
																				1,$numero[$i],null);

			}
		}
		$this->load->view('nueva_venta', $data);
	}

	//ingreso a venta desde pedidos de whatsapp uno por uno
	public function ingresarventaPorUnidad(){
		$data['base_url'] = $this->config->item('base_url');

			$id_pedido = $_POST['id_pedido'];
			$numero = $_POST['numero'];
			$cantidad = $_POST['cantidad'];
			$precioUnidad = $_POST['precioUnidad'];
			$id_producto = $_POST['id_producto'];
			$montoTotal = $cantidad * $precioUnidad;
			$this->Venta_model->ingresarVenta(
				$cantidad,$precioUnidad,
				$montoTotal,$id_producto,
				1,$numero,$id_pedido
			);
			$id_linea = $_POST['id_linea'];
			$this->Venta_model->borrarLineaPedido($id_linea);
		redirect("/informes/detallepedidos?id=${id_pedido}");
	}

	public function eliminarProductoDeLinea(){
		$data['base_url'] = $this->config->item('base_url');

		$id_pedido = $_GET['id_ped'];
		$id_linea = $_GET['lin_ped'];
		$id_Stock = $_GET['num'];
		$cantidad = $_GET['cant'];
		$this->Venta_model->borrarLineaPedidoYaumStock($id_linea,$id_Stock,$cantidad);
		redirect("/informes/detallepedidos?id=${id_pedido}");
	}


	public function buscar_codigo(){
		$data['base_url'] = $this->config->item('base_url');

		$codigo = $_POST['codigo_producto'];
		$data['codigo'] = $this->Venta_model->seleccionarCodigo($codigo);

		if (count($data['codigo']) < 1) {
			echo "Producto inexistente";
		}else {
			foreach ($data['codigo'] as $key) {
				echo '<strong> Marca: </strong>'.$key['marca'].'<strong> estilo: </strong>'
							.$key['nombre_prod'].'<strong> Color: </strong>'.$key['color']
							.'<strong> Numeración: </strong>'.$key['categoria']
							.'<strong> precio: </strong>'.$key['precio']
							.'<strong> Oferta: </strong>'.$key['oferta'];
				echo '<input id="id_producto_addProd" type="hidden" name="id_producto[]" value="'.$key['id_producto'].'"></>';
			}
		}
	}

	public function numeros($codigo = 0){
		$data['base_url'] = $this->config->item('base_url');

		$codigo_prod = $_POST['codigo'];
		$data['numeros'] = $this->Venta_model->seleccionarNumeros($codigo_prod);
		echo '<option value="">Seleccionar</option>';
		foreach ($data['numeros'] as $key) {
			echo '<option value="'.$key['id_stock'].'">'.$key['numero'].'</option>'."\n";
		}
	}

	public function buscarProducto(){
		$data['base_url'] = $this->config->item('base_url');

		$arg = $_POST['buscar_prod'];
		$data['res'] = $this->Venta_model->seleccionarProducto($arg);

		if ($arg == "") {
			echo "ingresa la marca a buscar";
		}else {
			foreach ($data['res'] as $key) {
				$codigo = "'".$key['codigo']."'";
				echo '<a href="#" onclick="setCodigo('
							.$codigo.')">
								<div>'.$key['marca'].' '.$key['nombre_prod'].' '.$key['color'].' '.$key['categoria'].' '.'
									<strong> Código: '.$key['codigo'].'</strong>
								</div>
							</a><br>';
			}
		}
	}

	public function productosVendidosHoy(){
		$data['base_url'] = $this->config->item('base_url');

			$dia = date("d");
			$mes = date("m");
			$año = date("Y");
			$ajaxFecha = $dia."/".$mes."/".$año;
			$data['ventas'] = $this->Venta_model->seleccionarTodasLasVenta();
		$this->load->view('productos_vendidos', $data);
	}

	public function productosVendidosFecha(){
		$data['base_url'] = $this->config->item('base_url');
		$totalDia = 0;
		if (isset($_POST['fechaPeticion'])) {
			$ajaxFecha = $_POST['fechaPeticion'];
			$data['ventas'] = $this->Venta_model->seleccionarVenta($ajaxFecha);
			foreach ($data['ventas'] as $key) {
				$totalDia = $totalDia + $key['total'];
				echo '<tr>
								<td>'.$key['codigo'].'</td>
								<td>'.$key['talla'].'</td>
								<td>'.$key['marca'].' '.$key['estilo'].' '.$key['color'].' '.$key['categoria'].'</td>
								<td>Q. '.$key['unidad'].'</td>
								<td>'.$key['cantidad'].'</td>
								<td>Q. '.$key['total'].'</td>';
			}
			echo '<td><b>Q. '.$totalDia.'</b></td></tr>';
		}
	}

	public function seleccionarFechas(){
		$data['base_url'] = $this->config->item('base_url');
		$data['fechas'] = $this->Venta_model->seleccionarFechas();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['fechas'] as $key) {
			echo '<option value="'.$key['fecha'].'">'.$key['fecha'].'</option>'."\n";
		}
	}
}
