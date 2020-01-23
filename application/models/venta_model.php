<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venta_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

		function seleccionarCodigo($id) {
		$sql = "SELECT p.id_producto id_producto, p.codigo codigo, cat.nombre categoria, e.nombre nombre_prod, m.nombre marca, c.nombre color
				FROM 	producto p
				join marca m on p.marca_id_marca = m.id_marca
				join estilo e on p.estilo_id_estilo = e.id_estilo
				join color c on p.color_id_color = c.id_color
				join categoria cat on p.categoria_id_categoria = cat.id_categoria
				Where p.codigo = ?
				LIMIT 	1";

		$dbres = $this->db->query($sql, $id);

		$rows = $dbres->result_array();

		return $rows;
	}
		function seleccionarNumeros($codigo) {
			$sql = "SELECT s.id_stock id_stock, n.numero numero
							from stock s
							join numero_categoria ncat on ncat.id = s.numero_categoria_id
              join numero_calzado n on ncat.id_numero = n.id_numero
							WHERE s.producto_id_producto = (SELECT p.id_producto
		    			FROM producto p WHERE p.codigo = ?)";

			$dbres = $this->db->query($sql, $codigo);

			$rows = $dbres->result_array();

			return $rows;
	}

	function ingresarVenta($cantidad, $precioUnidad, $montoTotal, $id_producto, $id_vendedor, $id_numero_categoria) {
	$sql = "INSERT INTO venta(cantidad, monto_unidad, monto_total, producto_id_producto, vendedor_id_vendedor,numero_categoria_id)
			VALUES (?,?,?,?,?,?)";

	$valores = array($cantidad, $precioUnidad, $montoTotal, $id_producto, $id_vendedor, $id_numero_categoria);

	$dbres = $this->db->query($sql, $valores);

	return $dbres;
	}

		function seleccionarProducto($arg) {
		$sql = "SELECT p.id_producto id_producto, p.codigo codigo, cat.nombre categoria,
										e.nombre nombre_prod, m.nombre marca, c.nombre color
				FROM 	producto p
				join marca m on p.marca_id_marca = m.id_marca
				join estilo e on p.estilo_id_estilo = e.id_estilo
				join color c on p.color_id_color = c.id_color
				join categoria cat on p.categoria_id_categoria = cat.id_categoria
				Where m.nombre like '%$arg%'";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}

		function seleccionarVenta($fechaBuscar) {
		$sql = "SELECT DATE_FORMAT(v.fecha_venta,'%d/%m/%Y') as fecha, v.cantidad cantidad, v.monto_unidad unidad,p.codigo codigo,
									 v.monto_total total,m.nombre marca, e.nombre estilo, c.nombre color, cat.nombre categoria
				FROM 	venta v
				join producto p on p.id_producto = v.producto_id_producto
				join marca m on p.marca_id_marca = m.id_marca
				join estilo e on p.estilo_id_estilo = e.id_estilo
				join color c on p.color_id_color = c.id_color
				join categoria cat on p.categoria_id_categoria = cat.id_categoria
				Where DATE_FORMAT(v.fecha_venta,'%m/%d/%Y') = ?
				ORDER BY v.fecha_venta ASC";

		$dbres = $this->db->query($sql,$fechaBuscar);

		$rows = $dbres->result_array();

		return $rows;
	}
		function seleccionarFechas() {
		$sql = "SELECT DISTINCT DATE_FORMAT(v.fecha_venta,'%m/%d/%Y') as fecha
				FROM 	venta v
				ORDER BY v.fecha_venta DESC";

		$dbres = $this->db->query($sql);

		$rows = $dbres->result_array();

		return $rows;
	}
}
