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
		$dep = $_GET['dep'];

		$data['tallas'] = $this->Informes_model->mostrarStockDetalle($id);
		$data['img'] = $this->Informes_model->mostrarImg($id);
		$data['detalle'] = $this->Informes_model->mostrarProducto($id);
		$data['recomendacion'] = $this->Informes_model->mostrarRecomendacion($dep);

		$this->load->view('detalle_producto', $data);
	}

	public function pagar(){
		$data['base_url'] = $this->config->item('base_url');
  	$this->restringirAcceso();
			$cont = $_POST['itemCount'];
			if ($cont < 1) {
				redirect("/inicio");
			}
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
//		$this->restringirAcceso();
			$contador = $_POST['contador'];//numero de productos
			$codigo= $_POST['codigo'];//ARRAY
			$numero= $_POST['talla'];//ARRAY
			$cantidad= $_POST['cantidad'];//ARRAY
			$id_persona = $_POST['id_persona'];
			$id_aldea = $_POST['id_aldea'];
			$direccionEnvio = $_POST['direccionEnvio'];
			$telefono = $_POST['telefono'];
			if ($id_aldea == '' || $direccionEnvio ==  '' || $telefono =='') {
				echo "0";
			}else {
				$id_pedido = $this->Informes_model->crearPedido(
					$id_persona,$id_aldea,$direccionEnvio,$telefono);

					for ($i=0; $i <$contador ; $i++) {
						$this->Informes_model->ingresarProductos(
							$id_pedido,$codigo[$i],$cantidad[$i],$numero[$i]);
						}
						echo "1";
					}
		}

	public function pedido_espera_whatsapp(){
		$data['base_url'] = $this->config->item('base_url');
		$codigo= $_POST['codigo'];
		$numero= $_POST['talla'];
		$cantidad= 1;
		$id_persona = $_POST['id_persona'];
		$id_aldea = 1;
		$direccionEnvio = 'N/A';
		$telefono = '00000000';

		$id_pedido = $this->Informes_model->crearPedido(
			$id_persona,$id_aldea,$direccionEnvio,$telefono);
		$this->Informes_model->ingresarProductos(
			$id_pedido,$codigo,$cantidad,$numero);
	}
}
