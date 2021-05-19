<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Informes_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	public function nuevaIncersion($id)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->Informes_model->mostrar($id);
		$data['mensaje'] = "Datos ingresados exitosamente";

		$this->load->view('nueva_incersion', $data);
	}

	public function mostrarinventario()
	{
		$data['base_url'] = $this->config->item('base_url');
		$data['prod'] = $this->Informes_model->listar_productos();
		$this->load->view('listar_productos', $data);
	}

	public function mostrarProducto($id=0)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->Informes_model->mostrarProducto($id);
		$data['numeros'] = $this->Informes_model->mostrarStock($id);

		$this->load->view('mostrar_producto', $data);
	}

	public function actualizar($id=0)
	{
		$data['base_url'] = $this->config->item('base_url');
		$id_stock = $_POST['id_stock'];
		$cantidad_actualizar = $_POST['cantidad_actualizar'];

		for ($i=0; $i < count($id_stock); $i++) {
			$this->Informes_model->actualizarStock($id_stock[$i],$cantidad_actualizar[$i]);
		}
		redirect("/informes/mostrarProducto/${id}");
	}

	public function mostrarPedidos(){
		$data['base_url'] = $this->config->item('base_url');
		$data['pedidos'] = $this->Informes_model->seleccionar_pedidos();
		$this->load->view('pedidosEnTransito', $data);
	}

	public function detallepedidos(){
		$data['base_url'] = $this->config->item('base_url');
		$id = $_GET['id'];
		$data['pedidos'] = $this->Informes_model->seleccionarLineaPedidos($id);
		$data['despachado'] = $this->Informes_model->seleccionarVentaPedidos($id);
		/*verifica si está trayendo algun dato en entre las dos consultas
		y si no, significa que no se ingresó ninguna venta y se eliminaron todos los pedidos
		*/
		if ((count($data['pedidos']) < 1) and (count($data['despachado']) > 0)) {
			$this->Informes_model->actalizarPedido($id);
		}
		if ((count($data['pedidos']) < 1) and (count($data['despachado']) < 1)) {
			$this->Informes_model->eliminarPedido($id);
			redirect("/Informes/mostrarPedidos");
		}
		$this->load->view('detallepedidos', $data);
	}

	public function etiqueta(){
		$data['base_url'] = $this->config->item('base_url');

		$data['etiqueta'] = $this->Informes_model->seleccionarEtiqueta();
		foreach ($data['etiqueta'] as $key) {
			echo '<a href="'.$data['base_url'].'/Departamento/tag?tag='.$key['nombre_etiqueta'].'">
						'.$key['nombre_etiqueta'].'</a>'."\n";
		}
	}
	public function buscar(){
		$data['base_url'] = $this->config->item('base_url');
		$argumentos = $_POST['busqueda'];
		$data['buscarProd'] = $this->Informes_model->Buscar($argumentos);
		$this->load->view('busqueda', $data);
	}

	public function add_Producto_A_pedido(){
		$data['base_url'] = $this->config->item('base_url');
		$id_pedido = $_POST['pedido_id_pedido'];
		$producto_id_producto = $_POST['producto_id_producto'];
		$unidades = $_POST['unidades'];
		$stock_id_stock = $_POST['stock_id_stock'];
		$this->Informes_model->add_prod_a_pedido(
			$id_pedido,$producto_id_producto,$unidades,$stock_id_stock
		);
		echo "producto ingresasdo exitosamente";
	}
}
