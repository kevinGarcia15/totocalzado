<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {
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


	public function dep(){
		$data['base_url'] = $this->config->item('base_url');
		$data['dep'] = $_GET['dep'];
		$data['num'] = $_GET['t'];
		$data['numeros'] = $this->Informes_model->seleccionarNumeroDepto($data['num']);
		if (isset($_GET['tall'])) {
			$data['num_elegido_id'] = $_GET['tallid'];
			$data['numero_elegido'] = $_GET['tall'];
			$data['departamentos'] = $this->Informes_model->seleccionarDepartamento($data['dep'],$data['num_elegido_id']);
		}else {
			$data['departamentos'] = $this->Informes_model->seleccionarDepartamento($data['dep'],null);
		}
		$this->load->view('departamento', $data);
	}

	public function tag(){
		$data['base_url'] = $this->config->item('base_url');
		$data['dep'] = $_GET['tag'];

		$data['departamentos'] = $this->Informes_model->seleccionarEtiquetas($data['dep']);
		$this->load->view('departamento', $data);
	}

	public function oferta(){
		$data['base_url'] = $this->config->item('base_url');

		$data['departamentos'] = $this->Informes_model->seleccionarOferta();
		$this->load->view('departamento', $data);
	}

}
