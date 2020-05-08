<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('producto_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	//Datos de registro del producto------------------------------------------------
	public function nuevo()
	{
		$data['base_url'] = $this->config->item('base_url');
	if ($this->input->post('continuar') == 'continuar') {
				$producto = array(
												'codigo'  => $_POST['codigo'],
												'marca'  => $_POST['marca'],
												'estilo' => $_POST['estilo'],
												'numeracion' => $_POST['numeracion'],
												'color' => $_POST['color'],
												'precio_compra' => $_POST['precio_compra'],
												'Precio_mayoreo' => $_POST['Precio_mayoreo'],
												'observaciones' => $_POST['observaciones'],
												'genero' => $_POST['genero'],
												'url_1' => $_POST['url_1'],
												'url_2' => $_POST['url_2'],
												'url_3' => $_POST['url_3'],
											 );
				$this->session->set_userdata($producto);
			 	redirect("/producto/ingresarStock");
		}
		$this->load->view('nuevo_producto', $data);
	}

	public function ingresarStock(){
		$data['base_url'] = $this->config->item('base_url');
		$data['marca'] = $this->producto_model->seleccionarMarcaId($this->session->userdata('marca'));
		$data['estilo'] = $this->producto_model->seleccionarEstiloId($this->session->userdata('estilo'));
		$data['numeracion'] = $this->producto_model->seleccionarNumeracionId($this->session->userdata('numeracion'));
		$data['color'] = $this->producto_model->seleccionarColorId($this->session->userdata('color'));
		$data['numeros'] = $this->producto_model->seleccionarNumeros($this->session->userdata('numeracion'));//selecciona los numeros dentro de categoria de numeros


			if (isset($_POST['Guardar'])) {
				$data['numeros'] = $this->producto_model->seleccionarNumeros($this->session->userdata('numeracion'));//selecciona los numeros dentro de categoria de numeros
				$numeros = $_POST['numeros'];//cantidad que hay que ingresasr al stock
				$this->producto_model->crearProducto(
				$this->session->userdata('codigo'),
				$this->session->userdata('precio_compra'),
				$this->session->userdata('Precio_mayoreo'),
				$this->session->userdata('url_1'),
				$this->session->userdata('numeracion'),
				$this->session->userdata('genero'),
				$this->session->userdata('marca'),
				$this->session->userdata('color'),
				$this->session->userdata('estilo'),
				$this->session->userdata('observaciones')
			);
		$id_producto = $this->producto_model->seleccionarIdProducto();
//ingresar url de las imagenes a la BD
			for ($i=1; $i < 4; $i++) {
				$this->producto_model->ingresarUrlImagenes(
					$this->session->userdata('url_'.$i.''),$id_producto);
			}
//ingresa los numeros del stok
			$bandera = 0;
				foreach ($data['numeros'] as $a ) {
						$this->producto_model->ingresarStock($numeros[$bandera], $id_producto, $a['id_numero_categoria']);
						$bandera = $bandera + 1;
				}
				$borrar = array('codigo',
											'precio_compra',
											'Precio_mayoreo',
											'numeracion',
											'proveedor',
											'marca',
											'color',
											'estilo',
											'observaciones'
										);
				$this->session->unset_userdata($borrar);//borra las variables de sesion

				redirect("/informes/nuevaIncersion/${id_producto}");
			}

		$this->load->view('ingresoStock', $data);
	}

	public function marca(){
		$data['base_url'] = $this->config->item('base_url');

		$data['marca'] = $this->producto_model->seleccionarMarca();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['marca'] as $key) {
			echo '<option value="'.$key['id_marca'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function numeracion(){
		$data['base_url'] = $this->config->item('base_url');

		$data['numeracion'] = $this->producto_model->seleccionarNumeracion();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['numeracion'] as $key) {
			echo '<option value="'.$key['id_categoria'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function color(){
		$data['base_url'] = $this->config->item('base_url');

		$data['color'] = $this->producto_model->seleccionarColor();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['color'] as $key) {
			echo '<option value="'.$key['id_color'].'">'.$key['nombre'].'</option>'."\n";
		}
	}
	public function genero(){
		$data['base_url'] = $this->config->item('base_url');

		$data['genero'] = $this->producto_model->seleccionargenero();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['genero'] as $key) {
			echo '<option value="'.$key['id_genero'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function estilo($id = 0){
		$data['base_url'] = $this->config->item('base_url');

		$id_marca = $_POST['marca'];
		$data['estilo'] = $this->producto_model->seleccionarEstilo($id_marca);
		echo '<option value="">Seleccionar</option>';
		foreach ($data['estilo'] as $key) {
			echo '<option value="'.$key['id_estilo'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function proveedor(){
		$data['base_url'] = $this->config->item('base_url');

		$data['proveedor'] = $this->producto_model->seleccionarProveedor();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['proveedor'] as $key) {
			echo '<option value="'.$key['id_proveedor'].'">'.$key['nombre_proveedor'].'</option>'."\n";
		}
	}

	public function nuevoColor() {
	$data['base_url'] = $this->config->item('base_url');

	$data['color'] ="";

	$data['color'] = str_replace(["<",">"], "", $_POST['color']);
	$this->producto_model->crearColor($data['color']);//ingresa datos en la tabla color
	redirect("/producto/nuevo");

}

	public function nuevaMarca() {
	$data['base_url'] = $this->config->item('base_url');

	$data['marca'] ="";

	if (isset($_POST['guardar'])) {
		$data['marca'] = str_replace(["<",">"], "", $_POST['marca']);

	$this->producto_model->crearMarca($data['marca']);//ingresa datos en la tabla ruta
	redirect("/producto/nuevo");
	}
}

	public function nuevoProveedor() {
	$data['base_url'] = $this->config->item('base_url');

	$data['proveedor'] ="";

	//	if (isset($_POST['guardar'])) {
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre_proveedor']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono_proveedor']);
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion_proveedor']);

		$this->producto_model->crearProveedor($data['nombre'],$data['telefono'],$data['direccion']);//ingresa datos en la tabla ruta
//		redirect("/producto/nuevo");
	//	}
	}

	public function nuevoEstilo() {
		$data['base_url'] = $this->config->item('base_url');

		$data['estilo'] ="";

		$data['estilo'] = str_replace(["<",">"], "", $_POST['nombre_estilo']);
		$data['id_marca'] = str_replace(["<",">"], "", $_POST['id_marca']);

		$this->producto_model->crearEstilo($data['estilo'],$data['id_marca']);//ingresa datos en la tabla ruta
	}
}
