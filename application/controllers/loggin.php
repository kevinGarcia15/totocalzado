<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loggin extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Loggin_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('Loggin', $data);
	}

	public function loggin() {

		$usuario = $_POST['usuario'];
		$rol = $_POST['rol'];
		$photo_url = $_POST['user_photo'];
		$uid = $_POST['uid'];

		$id = $this->Loggin_model->autenticarUsuario($uid,$usuario, $rol);

			//Establecer variables de sesion
			$this->session->USUARIO = $usuario;
			$this->session->ROL = $id[0]['rol'];
			$this->session->PHOTO_URL = $photo_url;
			$this->session->ID = $id[0]['id_persona'];
	}

	public function logout() {
		$this->session->sess_destroy(); // Destruir todas las variables de sesión
	}

	public function registro(){
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('Registro', $data);
	}
}
