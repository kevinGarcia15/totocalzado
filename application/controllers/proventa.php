<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proventa extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Informes_model');
	}

	private function restringirAcceso() {
	if (!isset($this->session->ROL)) {
		redirect("/loggin");
	}
}
	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	public function detalle(){
		$data['base_url'] = $this->config->item('base_url');
		$id = $_GET['id'];

		$data['tallas'] = $this->Informes_model->mostrarStock($id);
		$data['img'] = $this->Informes_model->mostrarImg($id);
		$data['detalle'] = $this->Informes_model->mostrarProducto($id);
		$this->load->view('detalle_producto', $data);
	}

	public function pagar(){
		$data['base_url'] = $this->config->item('base_url');
  	//$this->restringirAcceso();

			$cont = $_POST['itemCount'];
			$data['contItems'] = $cont;
		$this->load->view('pagar_carrito', $data);
	}

	public function aldea(){
		$data['base_url'] = $this->config->item('base_url');

		$data['aldea'] = $this->Informes_model->seleccionarAldea();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['aldea'] as $key) {
			echo '<option value="'.$key['id_aldea'].'">'.$key['nombre'].'</option>'."\n";
		}
	}
	public function datosPedido(){
		$data['base_url'] = $this->config->item('base_url');
	//	$this->restringirAcceso();

		$id_persona = $_POST['id_persona'];
		$id_aldea = $_POST['id_aldea'];
		$direccionEnvio = $_POST['direccionEnvio'];
		$telefono = $_POST['telefono'];

		$id_pedido = $this->Informes_model->crearPedido(
			$id_persona,$id_aldea,$direccionEnvio,$telefono);

		echo $id_pedido;
	}
	public function ingresoProductos(){
		$data['base_url'] = $this->config->item('base_url');
//		$this->restringirAcceso();

		$id_pedido = $_POST['id_pedido'];
		$codigo = $_POST['codigo'];
		$cantidad = $_POST['cantidad'];
		$talla = $_POST['talla'];

		$this->Informes_model->ingresarProductos(
			$id_pedido,$codigo,$cantidad,$talla);

		echo 'pedido ingresado exitosamente';
	}
}
