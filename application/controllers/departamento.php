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

		$data['departamentos'] = $this->Informes_model->seleccionarDepartamento($data['dep']);
		$this->load->view('departamento', $data);
	}

}
