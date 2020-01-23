<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informes_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

		function mostrar($id) {
		$sql = "SELECT p.id_producto id_producto, p.codigo codigo, p.codigo_proveedor codigo_proveedor,cat.nombre categoria, e.nombre nombre_prod, m.nombre marca, c.nombre color
				FROM 	producto p
				join marca m on p.marca_id_marca = m.id_marca
				join estilo e on p.estilo_id_estilo = e.id_estilo
				join color c on p.color_id_color = c.id_color
				join categoria cat on p.categoria_id_categoria = cat.id_categoria
				Where p.id_producto = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function listarMarcas() {
		$sql = "SELECT id_marca, nombre
				FROM 	marca
				order by nombre ASC
				LIMIT 	100";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	listarEstilo($id) {
		$sql = "SELECT id_estilo, nombre
				FROM 	estilo
				Where marca_id_marca = ?
				order by nombre ASC
				LIMIT 	100";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	listarCategoria($id) {
		$sql = "SELECT c.nombre nombre, col.nombre color, p.id_producto id_producto
						FROM producto p
						join color col on p.color_id_color = col.id_color
						join categoria c on p.categoria_id_categoria = c.id_categoria
						where p.estilo_id_estilo = ?";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	mostrarProducto($id) {
		$sql = "SELECT prod.codigo codigo, prod.codigo_proveedor cod_prov, prod.precio_compra compra, prod.precio_mayoreo precio_mayoreo,
									 cat.nombre categoria, p.nombre_proveedor proveedor, m.nombre marca, col.nombre color, es.nombre estilo, prod.observacion observacion
						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join proveedor p on prod.proveedor_id_proveedor = p.id_proveedor
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						where prod.id_producto = ?
						limit 1";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	mostrarStock($id) {
		$sql = "SELECT s.cantidad cantidad, num.numero numero
						FROM stock s
						join numero_categoria ncat on s.numero_categoria_id = ncat.id
						join numero_calzado num on ncat.id_numero = num.id_numero
						where s.producto_id_producto = ?";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}
}
