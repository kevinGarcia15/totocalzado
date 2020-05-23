<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loggin_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function autenticarUsuario($uid,$usuario,$rol) {
		$sql = "SELECT 	id_persona, UID, rol
				FROM 	persona
				WHERE 	UID = ?
				LIMIT 	1;";

		$dbres = $this->db->query($sql, $uid);
		$rows = $dbres->result_array();

		if (count($rows) < 1){
					$sql = "INSERT INTO persona(usuario,rol, UID)
				VALUES (?, ?, ?)";

				$valores = array($usuario, $rol,$uid);
				$dbres = $this->db->query($sql, $valores);

				$sql = "SELECT MAX(id_persona) as id_persona,rol FROM persona
					LIMIT 	1";
					$dbres = $this->db->query($sql);
					$rows = $dbres->result_array();
			return $rows;
		}else {
			return  $rows;
		}
	}
}
