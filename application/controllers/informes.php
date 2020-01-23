<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('informes_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	public function nuevaIncersion($id)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->mostrar($id);
		$data['mensaje'] = "Datos ingresados exitosamente";

		$this->load->view('nueva_incersion', $data);
	}

	public function mostrar()
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->listarMarcas();

		$this->load->view('listar_marca', $data);
	}

	public function mostrarEstilo($id=0)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->listarEstilo($id);

		$this->load->view('listar_estilo', $data);
	}

	public function mostrarCategoria($id=0)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->listarCategoria($id);

		$this->load->view('listar_categoria', $data);
	}

	public function mostrarProducto($id=0)
	{
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->informes_model->mostrarProducto($id);
		$data['numeros'] = $this->informes_model->mostrarStock($id);

		$this->load->view('mostrar_producto', $data);
	}

}
