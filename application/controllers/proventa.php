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

	public function add(){
		$data['base_url'] = $this->config->item('base_url');
			if (!isset($cont) && $this->session->userdata('cont') == NULL) {
					$cont = 1;
				}else {
					$cont = $this->session->userdata('cont'); //contador para saber cuantos items hay en el carrito
				}
		$carrito = array(
								'cont'=>$cont + 1,
								'item'.$cont =>array('id'=>$_POST['id_producto'],
																'precio'=>$_POST['precio_producto'],
																'cantidad'=>$_POST['cantidad'])
							 );
				$Total = 0;
				$this->session->set_userdata($carrito);
				for ($i=1; $i <= $cont ; $i++) {
					echo $this->session->userdata('item'.$i)['id'].'<br>';
					$Total = $Total + $this->session->userdata('item'.$i)['precio'];
				}
				echo $this->session->userdata('cont').'<br>';
				echo $Total;
	}

	public function pagar(){
		$data['base_url'] = $this->config->item('base_url');
//  	$this->restringirAcceso();

			$cont = $_POST['itemCount'];
			$data['contItems'] = $cont;
			$productos = array();
		for ($i=1; $i <= $cont; $i++) {
			for ($j=1; $j <= 1 ; $j++) {
				$data['producto'.$i][$j-1] = $_POST['item_name_'.$i];
				$data['producto'.$i][$j] = $_POST['item_quantity_'.$i];
				$data['producto'.$i][$j+1] = $_POST['item_price_'.$i];
				$data['producto'.$i][$j+2] = $_POST['item_options_'.$i];
				$data['producto'.$i][$j+3] = $_POST['item_codigo_'.$i];
				$data['producto'.$i][$j+4] = $_POST['item_size_'.$i];
				$data['producto'.$i][$j+5] = $_POST['item_options_'.$i];
			}
		}
		$this->load->view('pagar_carrito', $data);
	}
}
