<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('Producto_model');
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
	}

	//Datos de registro del producto------------------------------------------------
	public function nuevo(){
		$data['base_url'] = $this->config->item('base_url');
		$data['etiqueta'] = $this->Producto_model->seleccionarEtiqueta();
//crea un directorio para guardar las imagenes
	if ($this->input->post('continuar') == 'continuar') {
		$nuevo_producto = "./recursos/productos/".$_POST['codigo']."";
		if (!file_exists($nuevo_producto)) {
		    mkdir($nuevo_producto, 0777, true);
		}

		//para subir las imagenes
		$img_1 = $_FILES['url_1']['tmp_name'];
		$destino1 = "./recursos/productos/".$_POST['codigo']."/".$_FILES['url_1']['name'];
		move_uploaded_file($img_1, $destino1);
		$img_2 = $_FILES['url_2']['tmp_name'];
		$destino2 = "./recursos/productos/".$_POST['codigo']."/".$_FILES['url_2']['name'];
		move_uploaded_file($img_2, $destino2);
		$img_3 = $_FILES['url_3']['tmp_name'];
		$destino3 = "./recursos/productos/".$_POST['codigo']."/".$_FILES['url_3']['name'];
		move_uploaded_file($img_3, $destino3);

				$producto = array(
												'codigo'  => $_POST['codigo'],
												'marca'  => $_POST['marca'],
												'estilo' => $_POST['estilo'],
												'numeracion' => $_POST['numeracion'],
												'color' => $_POST['color'],
												'precio_compra' => $_POST['precio_compra'],
												'oferta' => $_POST['oferta'],
												'observaciones' => $_POST['observaciones'],
												'genero' => $_POST['genero'],
												'url_1' => $destino1,
												'url_2' => $destino2,
												'url_3' => $destino3,
												'etiqueta'=>$_POST['etiqueta'],
											 );
				$this->session->set_userdata($producto);
		 	 	redirect("/producto/ingresarStock/");
			}
		$this->load->view('nuevo_producto', $data);
	}

	public function ingresarStock(){
		$data['base_url'] = $this->config->item('base_url');
		$data['marca'] = $this->Producto_model->seleccionarMarcaId($this->session->userdata('marca'));
		$data['estilo'] = $this->Producto_model->seleccionarEstiloId($this->session->userdata('estilo'));
		$data['numeracion'] = $this->Producto_model->seleccionarNumeracionId($this->session->userdata('numeracion'));
		$data['color'] = $this->Producto_model->seleccionarColorId($this->session->userdata('color'));
		$data['numeros'] = $this->Producto_model->seleccionarNumeros($this->session->userdata('numeracion'));//selecciona los numeros dentro de categoria de numeros

			if (isset($_POST['Guardar'])) {
				$data['numeros'] = $this->Producto_model->seleccionarNumeros($this->session->userdata('numeracion'));//selecciona los numeros dentro de categoria de numeros
				$numeros = $_POST['numeros'];//cantidad que hay que ingresasr al stock
				$this->Producto_model->crearProducto(
				$this->session->userdata('codigo'),
				$this->session->userdata('precio_compra'),
				$this->session->userdata('oferta'),
				$this->session->userdata('url_1'),
				$this->session->userdata('numeracion'),
				$this->session->userdata('genero'),
				$this->session->userdata('marca'),
				$this->session->userdata('color'),
				$this->session->userdata('estilo'),
				$this->session->userdata('observaciones')
			);
		$id_producto = $this->Producto_model->seleccionarIdProducto();
//ingresar url de las imagenes a la BD
			for ($i=1; $i < 4; $i++) {
				$this->Producto_model->ingresarUrlImagenes(
					$this->session->userdata('url_'.$i.''),$id_producto);
			}
// //ingresar las etiquetas a la BD
$num =	count($this->session->userdata('etiqueta'));

	for ($i=0; $i < $num; $i++) {
		$this->Producto_model->ingresarTag(
		$id_producto,$this->session->userdata('etiqueta')[$i]);
	}
//ingresa los numeros del stok
			$bandera = 0;
				foreach ($data['numeros'] as $a ) {
						$this->Producto_model->ingresarStock($numeros[$bandera], $id_producto, $a['id_numero_categoria']);
						$bandera = $bandera + 1;
				}
				$this->borrarVariablesSesion();
				redirect("/informes/nuevaIncersion/${id_producto}");
			}

		$this->load->view('ingresoStock', $data);
	}

	public function borrarVariablesSesion(){
		$borrar = array('codigo',
		'marca',
		'estilo',
		'numeracion',
		'color',
		'precio_compra',
		'oferta',
		'observaciones',
		'genero',
		'url_1',
		'url_2',
		'url_3',
		'etiqueta',
	);
	$this->session->unset_userdata($borrar);//borra las variables de sesion
		if (isset($_GET['f'])) {
			redirect("/");
		}
	}

	public function marca(){
		$data['base_url'] = $this->config->item('base_url');

		$data['marca'] = $this->Producto_model->seleccionarMarca();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['marca'] as $key) {
			echo '<option value="'.$key['id_marca'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function numeracion(){
		$data['base_url'] = $this->config->item('base_url');

		$data['numeracion'] = $this->Producto_model->seleccionarNumeracion();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['numeracion'] as $key) {
			echo '<option value="'.$key['id_categoria'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function color(){
		$data['base_url'] = $this->config->item('base_url');

		$data['color'] = $this->Producto_model->seleccionarColor();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['color'] as $key) {
			echo '<option value="'.$key['id_color'].'">'.$key['nombre'].'</option>'."\n";
		}
	}
	public function genero(){
		$data['base_url'] = $this->config->item('base_url');

		$data['genero'] = $this->Producto_model->seleccionargenero();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['genero'] as $key) {
			echo '<option value="'.$key['id_genero'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function estilo($id = 0){
		$data['base_url'] = $this->config->item('base_url');

		$id_marca = $_POST['marca'];
		$data['estilo'] = $this->Producto_model->seleccionarEstilo($id_marca);
		echo '<option value="">Seleccionar</option>';
		foreach ($data['estilo'] as $key) {
			echo '<option value="'.$key['id_estilo'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

	public function proveedor(){
		$data['base_url'] = $this->config->item('base_url');

		$data['proveedor'] = $this->Producto_model->seleccionarProveedor();
		echo '<option value="">Seleccionar</option>';
		foreach ($data['proveedor'] as $key) {
			echo '<option value="'.$key['id_proveedor'].'">'.$key['nombre_proveedor'].'</option>'."\n";
		}
	}

	public function nuevoColor() {
	$data['base_url'] = $this->config->item('base_url');

	$data['color'] ="";

	$data['color'] = str_replace(["<",">"], "", $_POST['color']);
	$this->Producto_model->crearColor($data['color']);//ingresa datos en la tabla color
	redirect("/producto/nuevo");

}

	public function nuevaMarca() {
	$data['base_url'] = $this->config->item('base_url');

	$data['marca'] ="";

	if (isset($_POST['guardar'])) {
		$data['marca'] = str_replace(["<",">"], "", $_POST['marca']);

	$this->Producto_model->crearMarca($data['marca']);//ingresa datos en la tabla ruta
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

		$this->Producto_model->crearProveedor($data['nombre'],$data['telefono'],$data['direccion']);//ingresa datos en la tabla ruta
//		redirect("/producto/nuevo");
	//	}
	}

	public function nuevoEstilo() {
		$data['base_url'] = $this->config->item('base_url');

		$data['estilo'] ="";

		$data['estilo'] = str_replace(["<",">"], "", $_POST['nombre_estilo']);
		$data['id_marca'] = str_replace(["<",">"], "", $_POST['id_marca']);

		$this->Producto_model->crearEstilo($data['estilo'],$data['id_marca']);//ingresa datos en la tabla ruta
	}
}
