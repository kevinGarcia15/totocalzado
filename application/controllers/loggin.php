<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loggin extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('loggin', $data);
	}

	public function loggin() {
		$usuario = $_POST['usuario'];
		$rol = $_POST['rol'];
		$photo_url = $_POST['user_photo'];
		//Establecer variables de sesion
		$this->session->USUARIO = $usuario;
		$this->session->ROL = $rol;
		$this->session->PHOTO_URL = $photo_url;

	}
	public function logout() {
		$this->session->sess_destroy(); // Destruir todas las variables de sesión
	}

	public function registro(){
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('registro', $data);
	}
}
