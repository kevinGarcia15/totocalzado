<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

  function seleccionarMarca() {
  	$sql = "SELECT id_marca, nombre
  			FROM 	marca
  			order by nombre ASC
  			LIMIT 	100";

  	$dbres = $this->db->query($sql);

  	$rows = $dbres->result_array();

  	return $rows;
  }

	function seleccionarMarcaId($id) {
		$sql = "SELECT id_marca, nombre
				FROM 	marca
				where id_marca = $id
				LIMIT 	1";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows[0]['nombre'];
	}

	function seleccionarEstiloId($id) {
		$sql = "SELECT id_estilo, nombre
				FROM 	estilo
				where id_estilo = $id
				LIMIT 	1";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows[0]['nombre'];
	}

  function crearMarca($marca) {
	$sql = "INSERT INTO marca(nombre)
			VALUES (?)";

	$valores = array($marca);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
}

function crearProveedor($nombre, $telefono, $direccion) {
$sql = "INSERT INTO proveedor(nombre_proveedor, telefono, direccion)
		VALUES (?,?,?)";

$valores = array($nombre, $telefono, $direccion);

$dbres = $this->db->query($sql, $valores);

return $dbres;
}

function seleccionarNumeracion() {
	$sql = "SELECT id_categoria, nombre
			FROM 	categoria
			order by nombre ASC
			LIMIT 	10";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}

function seleccionarNumeracionId($id) {
	$sql = "SELECT id_categoria, nombre
			FROM 	categoria
			where id_categoria = $id
			LIMIT 	1";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows[0]['nombre'];
}

	function seleccionarColor() {
		$sql = "SELECT id_color, nombre
				FROM 	color
				order by nombre ASC
				LIMIT 	20";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionargenero() {
		$sql = "SELECT id_genero, nombre
				FROM 	genero
				order by nombre ASC
				LIMIT 	7";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarColorId($id) {
		$sql = "SELECT id_color, nombre
				FROM 	color
				where id_color = $id
				LIMIT 	1";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows[0]['nombre'];
	}

	function seleccionarProveedor() {
		$sql = "SELECT id_proveedor, nombre_proveedor
				FROM 	proveedor
				order by nombre_proveedor ASC
				LIMIT 	50";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarProveedorId($id) {
		$sql = "SELECT nombre_proveedor
				FROM 	proveedor
				where id_proveedor = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows[0]['nombre_proveedor'];
	}

	function 	seleccionarEstilo($id) {
		$sql = "SELECT id_estilo, nombre
				FROM 	estilo
				where marca_id_marca = $id
				order by nombre ASC
				LIMIT 	50";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}


	function crearColor($color) {
	$sql = "INSERT INTO color(nombre)
			VALUES (?)";

	$valores = array($color);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}

	function crearEstilo($estilo,$id_marca) {
	$sql = "INSERT INTO estilo(nombre,marca_id_marca)
			VALUES (?,?)";

	$valores = array($estilo,$id_marca);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}

	function seleccionarNumeros($idCategoria) {
		$sql = "SELECT ncat.id id_numero_categoria, n.numero numero
				FROM 	numero_categoria ncat
				join numero_calzado n on ncat.id_numero = n.id_numero
				join categoria c on ncat.id_categoria = c.id_categoria
				where c.id_categoria = $idCategoria
				LIMIT 	20";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarProductoCodigo($codigo){
		$sql = "SELECT codigo
				FROM 	producto
				where codigo = ?
				LIMIT 1";

		$dbres = $this->db->query($sql,$codigo);

		$rows = $dbres->result_array();

		return $rows;
	}

	function seleccionarIdProducto() {
		$sql = "SELECT MAX(id_producto) as id_producto FROM producto
						LIMIT 	1";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows[0]['id_producto'];
	}

	function ingresarStock($cantidad, $id_producto, $id_numero_categoria) {
	$sql = "INSERT INTO stock(cantidad, producto_id_producto, numero_categoria_id)
			VALUES (?,?,?)";

	$valores = array($cantidad, $id_producto, $id_numero_categoria);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}

	function crearProducto($codigo,$precio_compra, $oferta,$img_carusel,
												$categoria,$genero, $marca, $color, $estilo, $observacion) {
	$sql = "INSERT INTO producto(codigo, precio_compra, oferta,img_carrusel,
																categoria_id_categoria,genero_id_genero,
																marca_id_marca, color_id_color,estilo_id_estilo,
																observacion)
			VALUES (?,?,?,?,?,?,?,?,?,?)";

	$valores = array($codigo, $precio_compra, $oferta,$img_carusel, $categoria,$genero, $marca, $color,$estilo, $observacion);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}
	function ingresarUrlImagenes($url_img,$id_producto) {
	$sql = "INSERT INTO img(URL,producto_id_producto)
			VALUES (?,?)";

	$valores = array($url_img, $id_producto);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}

	function 	seleccionarEtiqueta() {
		$sql = "SELECT  id_etiqueta, nombre_etiqueta
				FROM 	etiqueta
				order by nombre_etiqueta ASC
				LIMIT 20";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function ingresarTag($id_producto,$id_etiqueta) {
	$sql = "INSERT INTO tieneetiqueta(producto_id_producto, etiqueta_id_etiqueta)
			VALUES (?,?)";

	$valores = array($id_producto, $id_etiqueta);
	$dbres = $this->db->query($sql, $valores);
	return $dbres;
	}
}
