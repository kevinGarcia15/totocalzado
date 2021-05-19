<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informes_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

		function mostrar($id) {
		$sql = "SELECT p.id_producto id_producto, p.codigo codigo,
							p.codigo_proveedor codigo_proveedor,cat.nombre categoria,
							e.nombre nombre_prod, m.nombre marca, c.nombre color
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

	function Buscar($argumentos) {
	$sql = "SELECT p.id_producto id_producto, p.codigo codigo,p.img_carrusel img,
						p.codigo_proveedor codigo_proveedor,cat.nombre categoria,
						e.nombre nombre_prod, m.nombre marca, c.nombre color,gen.nombre depto
			FROM 	producto p
			join marca m on p.marca_id_marca = m.id_marca
			join estilo e on p.estilo_id_estilo = e.id_estilo
			join color c on p.color_id_color = c.id_color
			join categoria cat on p.categoria_id_categoria = cat.id_categoria
			join genero gen on p.genero_id_genero = gen.id_genero

			Where m.nombre like ?
			LIMIT 	15";

	$findArgument = $argumentos.'%';
	$dbres = $this->db->query($sql, $findArgument);
	$rows = $dbres->result_array();
	return $rows;
}

	function listar_productos() {
		$sql = "SELECT prod.id_producto id_producto, prod.codigo codigo,
						prod.precio_compra compra,prod.oferta oferta,prod.img_carrusel img,
						m.nombre marca, col.nombre color, es.nombre estilo,
						gen.nombre genero

						FROM producto prod
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						join genero gen on prod.genero_id_genero = gen.id_genero
						";

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
	function 	seleccionarAldea() {
		$sql = "SELECT id_aldea, nombre
				FROM 	aldea
				order by nombre ASC
				LIMIT 	100";

		$dbres = $this->db->query($sql);
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
		$sql = "SELECT prod.id_producto id_producto, prod.codigo codigo,
						prod.codigo_proveedor cod_prov, prod.precio_compra compra,
						prod.oferta oferta, cat.nombre categoria,
						m.nombre marca, col.nombre color, es.nombre estilo,
						prod.observacion descripcion, prod.img_carrusel img_principal,
						gen.nombre genero

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						join genero gen on prod.genero_id_genero = gen.id_genero
						where prod.id_producto = ?
						limit 1";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	mostrarProductoCaballeros() {
		$sql = "SELECT prod.id_producto id_producto, prod.precio_compra compra,
									cat.nombre categoria,m.nombre marca, es.nombre estilo,
									prod.img_carrusel img_carrusel,prod.oferta oferta, gen.nombre dep

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join genero gen on prod.genero_id_genero = gen.id_genero
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						where gen.nombre = 'Caballero'
						limit 5";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}	function 	mostrarProductoNiños() {
			$sql = "SELECT prod.id_producto id_producto, prod.precio_compra compra,
										cat.nombre categoria,m.nombre marca, es.nombre estilo,
										prod.img_carrusel img_carrusel,prod.oferta oferta, gen.nombre dep

							FROM producto prod
							join categoria cat on prod.categoria_id_categoria = cat.id_categoria
							join marca m on prod.marca_id_marca = m.id_marca
							join genero gen on prod.genero_id_genero = gen.id_genero
							join estilo es on prod.estilo_id_estilo = es.id_estilo
							where gen.nombre = 'Niño'
							limit 5";

			$dbres = $this->db->query($sql);
			$rows = $dbres->result_array();
			return $rows;
		}

	function 	mostrarProductoDamas() {
		$sql = "SELECT prod.id_producto id_producto, prod.precio_compra compra,
									cat.nombre categoria,m.nombre marca, es.nombre estilo,
									prod.img_carrusel img_carrusel,prod.oferta oferta, gen.nombre dep

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join genero gen on prod.genero_id_genero = gen.id_genero
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						where gen.nombre = 'Dama'
						limit 5";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function 	mostrarProductoOfertas() {
		$sql = "SELECT prod.id_producto id_producto, prod.precio_compra compra,
									cat.nombre categoria,m.nombre marca, es.nombre estilo,
									prod.img_carrusel img_carrusel,prod.oferta oferta, gen.nombre dep

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join genero gen on prod.genero_id_genero = gen.id_genero
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						where prod.oferta > 0
						limit 5";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function 	mostrarRecomendacion($dep) {
		$sql = "SELECT prod.id_producto id_producto, prod.precio_compra compra,
									cat.nombre categoria,m.nombre marca, es.nombre estilo,
									prod.img_carrusel img_carrusel,prod.oferta oferta, gen.nombre dep

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join genero gen on prod.genero_id_genero = gen.id_genero
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						where gen.nombre = ?
						limit 10";

		$dbres = $this->db->query($sql,$dep);

		$rows = $dbres->result_array();

		return $rows;
	}

	function 	mostrarImg($id) {
		$sql = "SELECT id_img, URL
						FROM img
						where producto_id_producto = ?";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}
	function 	mostrarStock($id) {
		$sql = "SELECT s.id_stock id_stock, s.cantidad cantidad, num.numero numero
						FROM stock s
						join numero_categoria ncat on s.numero_categoria_id = ncat.id
						join numero_calzado num on ncat.id_numero = num.id_numero
						where s.producto_id_producto = ?";

		$dbres = $this->db->query($sql,$id);
		$rows = $dbres->result_array();
		return $rows;
	}

//muietra el stok eseptuando los que no tengamos en existencia
	function 	mostrarStockDetalle($id) {
		$sql = "SELECT s.id_stock id_stock, s.cantidad cantidad, num.numero numero
						FROM stock s
						join numero_categoria ncat on s.numero_categoria_id = ncat.id
						join numero_calzado num on ncat.id_numero = num.id_numero
						where s.producto_id_producto = ? and s.cantidad > 0";

		$dbres = $this->db->query($sql,$id);

		$rows = $dbres->result_array();

		return $rows;
	}


	function actualizarStock($id_stock,$cantidad) {
		$sql = "UPDATE stock
					SET cantidad = ?
					WHERE id_stock = ?
					";
		$valores = array($cantidad,$id_stock);
		$dbres = $this->db->query($sql,$valores);
		return $dbres;
	}

	function crearPedido($id_persona,$id_aldea,$direccionEnvio,$telefono){
		$sql = "INSERT INTO pedidos(persona_id_persona, aldea_id_aldea, direccionEnvio,
							telefono)
						VALUES (?, ?, ?, ?)";

	$valores = array($id_persona,$id_aldea,$direccionEnvio,$telefono);
	$dbres = $this->db->query($sql, $valores);

	$sql = "SELECT MAX(id_pedidos) as id_pedido FROM pedidos
		LIMIT 	1";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows[0]['id_pedido'];
	}

	function ingresarProductos($id_pedido,$codigo,$cantidad,$talla){
		$sql = "SELECT id_producto FROM producto
						where codigo = ?
						LIMIT 	1";

			$dbres = $this->db->query($sql,$codigo);
			$rows = $dbres->result_array();

		$sql = "INSERT INTO lineapedido(pedido_id_pedido, producto_id_producto,
			 				unidades,stock_id_stock)
						VALUES (?, ?, ?, ?)";

	$valores = array($id_pedido,$rows[0]['id_producto'],$cantidad,$talla);
	$dbres = $this->db->query($sql, $valores);

	$sql2="UPDATE stock SET cantidad = cantidad - ? WHERE stock.id_stock = ?;";
		$valores_update = array($cantidad,$talla);
		$this->db->query($sql2, $valores_update);

	return $rows;
	}

	function selecIdPedido(){
	$sql = "SELECT MAX(id_pedidos) as id_pedido FROM pedidos
		LIMIT 	1";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows[0]['id_pedido'];
	}

	function seleccionar_pedidos(){
	$sql = "SELECT ped.id_pedidos id_pedidos, per.usuario usuario,
					DATE_FORMAT(ped.fecha, '%d/%m/%Y') fecha,ped.estado estado,
					ald.nombre aldea, ped.direccionEnvio dirEnv, ped.telefono tel
					FROM pedidos ped
					JOIN persona per on ped.persona_id_persona = per.id_persona
					JOIN aldea ald on ped.aldea_id_aldea = ald.id_aldea
					";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarLineaPedidos($id){
	$sql = "SELECT linped.unidades unidades, linped.id_lineaPedido id_linea,

									ped.id_pedidos id_pedidos,DATE_FORMAT(ped.fecha, '%d/%m/%Y') fecha,
									ped.estado estado,ped.direccionEnvio dirEnv,ped.telefono tel,

									per.usuario usuario,ald.nombre aldea,

									prod.codigo codigo, prod.precio_compra precio_compra,
									prod.oferta oferta,
									prod.img_carrusel img, prod.id_producto id_producto,

									marc.nombre marca, col.nombre color, ncalz.numero numero,
									stk.id_stock id_stock,stk.cantidad cant_stock,es.nombre estilo


					FROM lineapedido linped
					JOIN pedidos ped on ped.id_pedidos = linped.pedido_id_pedido
					JOIN producto prod on prod.id_producto = linped.producto_id_producto
					JOIN persona per on ped.persona_id_persona = per.id_persona
					JOIN aldea ald on ped.aldea_id_aldea = ald.id_aldea
					JOIN marca marc on prod.marca_id_marca = marc.id_marca
					JOIN color col on prod.color_id_color = col.id_color
					JOIN stock stk on stk.id_stock = linped.stock_id_stock
					join estilo es on prod.estilo_id_estilo = es.id_estilo
					JOIN numero_categoria ncat on stk.numero_categoria_id = ncat.id
					JOIN numero_calzado ncalz on ncalz.id_numero = ncat.id_numero
					WHERE linped.pedido_id_pedido = ?
					order by numero ASC";

		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarDepartamento($depto,$filtro) {
		(isset($filtro))? $where = 'join stock on stock.producto_id_producto = prod.id_producto
																where gen.nombre = ? and stock.cantidad > 0 and
																stock.numero_categoria_id ='.$filtro.''
										: $where = 'where gen.nombre = ?';

		$sql = "SELECT prod.id_producto id_producto, prod.codigo codigo,
						prod.codigo_proveedor cod_prov, prod.precio_compra precio,
						prod.oferta oferta,
						UPPER(m.nombre) as marca, UPPER(col.nombre) as color, UPPER(es.nombre) as estilo,
						prod.observacion descripcion, prod.img_carrusel img_principal,
						gen.nombre genero

						FROM producto prod
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						join genero gen on prod.genero_id_genero = gen.id_genero
						".$where."";

		$valores = array($depto);
		$dbres = $this->db->query($sql,$valores);
		$rows = $dbres->result_array();

		return $rows;
	}


	function seleccionarOferta() {
		$sql = "SELECT prod.id_producto id_producto, prod.codigo codigo,
						prod.codigo_proveedor cod_prov, prod.precio_compra precio,
						prod.oferta oferta,
						UPPER(m.nombre) as marca, UPPER(col.nombre) as color, UPPER(es.nombre) as estilo,
						prod.observacion descripcion, prod.img_carrusel img_principal,
						gen.nombre genero

						FROM producto prod
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						join genero gen on prod.genero_id_genero = gen.id_genero
						where prod.oferta > '0'";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarEtiquetas($tag) {
		$sql = "SELECT prod.id_producto id_producto, prod.codigo codigo,
						prod.codigo_proveedor cod_prov, prod.precio_compra precio,
						prod.oferta oferta, cat.nombre categoria,
						UPPER(m.nombre) as marca, UPPER(col.nombre) as color, UPPER(es.nombre) as estilo,
						prod.observacion descripcion, prod.img_carrusel img_principal,
						gen.nombre genero

						FROM producto prod
						join categoria cat on prod.categoria_id_categoria = cat.id_categoria
						join marca m on prod.marca_id_marca = m.id_marca
						join color col on prod.color_id_color = col.id_color
						join estilo es on prod.estilo_id_estilo = es.id_estilo
						join genero gen on prod.genero_id_genero = gen.id_genero
						join tieneetiqueta tEtiqu on tEtiqu.producto_id_producto = prod.id_producto
						join etiqueta et on et.id_etiqueta = tEtiqu.etiqueta_id_etiqueta
						where et.nombre_etiqueta = ?";

		$dbres = $this->db->query($sql,$tag);
		$rows = $dbres->result_array();
		return $rows;
	}
	function seleccionarVentaPedidos($id){
	$sql = "SELECT ven.cantidad unidades, ven.monto_unidad precio_unidad,
								 DATE_FORMAT(ven.fecha_venta, '%d/%m/%Y') fecha,

								 ped.id_pedidos id_pedidos,DATE_FORMAT(ped.fecha, '%d/%m/%Y') fecha,
								 ped.estado estado,ped.telefono tel,

								 per.usuario usuario,ald.nombre aldea,

								 prod.img_carrusel img, prod.codigo codigo, 

								 marc.nombre marca,ncalz.numero numero,col.nombre color

					FROM venta ven
					JOIN pedidos ped on ped.id_pedidos = ven.pedidos_id_pedidos
					JOIN persona per on ped.persona_id_persona = per.id_persona
					JOIN aldea ald on ped.aldea_id_aldea = ald.id_aldea
					JOIN producto prod on prod.id_producto = ven.producto_id_producto
					JOIN marca marc on prod.marca_id_marca = marc.id_marca
					JOIN color col on prod.color_id_color = col.id_color
					JOIN stock stk on stk.id_stock = ven.numero_categoria_id
					JOIN numero_categoria ncat on stk.numero_categoria_id = ncat.id
					JOIN numero_calzado ncalz on ncalz.id_numero = ncat.id_numero
					WHERE ven.pedidos_id_pedidos = ?";

		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
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

	function 	seleccionarNumeroDepto($num) {
		$sql = "SELECT num.numero numero, ncat.id id_ncategoria
						from numero_categoria ncat
						join numero_calzado num on ncat.id_numero = num.id_numero
						where ncat.id_categoria = ?";
		$dbres = $this->db->query($sql,$num);
		$rows = $dbres->result_array();
		return $rows;
	}

	function eliminarPedido($id_pedido) {
		$sql = "DELETE FROM `pedidos` WHERE `pedidos`.`id_pedidos` = ?";
		$valores = array($id_pedido);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function actalizarPedido($id_pedido) {
		$sql = "UPDATE pedidos
					SET estado = ?
					WHERE id_pedidos = ?
					";
		$estado = 'B';
		$valores = array($estado,$id_pedido);
		$dbres = $this->db->query($sql,$valores);
		return $dbres;
	}

	function add_prod_a_pedido($id_pedido,$producto_id_producto,$unidades,$stock_id_stock){
		$sql = "INSERT INTO lineapedido(pedido_id_pedido, producto_id_producto,
							unidades,stock_id_stock)
						VALUES (?, ?, ?, ?)";

	$valores = array($id_pedido,$producto_id_producto,$unidades,$stock_id_stock);
	$dbres = $this->db->query($sql, $valores);

	$sql2="UPDATE stock SET cantidad = cantidad - ? WHERE stock.id_stock = ?;";
		$valores_update = array($unidades,$stock_id_stock);
		$this->db->query($sql2, $valores_update);
	return $dbres;
	}
}
