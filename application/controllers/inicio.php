<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Informes_model');

	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$data['caballeros'] = $this->Informes_model->mostrarProductoCaballeros();
		$data['Damas'] = $this->Informes_model->mostrarProductoDamas();
		$data['Ofertas'] = $this->Informes_model->mostrarProductoOfertas();
		$data['niños'] = $this->Informes_model->mostrarProductoNiños();
		$this->load->view('inicio', $data);
	}

	public function politicaprivacidad()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('politicaPrivacidad', $data);
	}
}
