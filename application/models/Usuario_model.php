<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library("mongodb");
		$this->db = $this->mongodb->db()->usuarios;
		$this->db->reservar = $this->mongodb->db()->reservas;
		$this->load->library('session');
	}

	public function registrar_usuario($datos)
	{
		$resultado = $this->db->insertOne($datos);

		if ($resultado->getInsertedCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function usuario_existe($correo)
	{
		$resultado = $this->db->findone(['correo' => $correo]);

		if ($resultado != null) {
			return true;
		} else {
			return false;
		}
	}

	public function reservar($datos)
	{
		$resultado = $this->db->reservar->insertOne($datos);

		if ($resultado->getInsertedCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function misReservas()
	{
		$id = $this->mongodb->getObjetId($_SESSION['id']);

		$result = $this->db->reservar->find(['id_usuario' => $id]);

		if ($result != null) {
			$estado = true;
		} else {
			$estado = false;
		}

		$obj = array('reserva' => $result, 'estado' => $estado);

		return $obj;
	}

	public function eliminarReserva($id)
	{
		$resul = $this->db->reservar->deleteOne(['_id' => $this->mongodb->getObjetId($id)]);

		return $resul;
	}

	public function verificar_fecha($id, $entrada, $salida)
	{
		$result = $this->db->reservar->findOne([

			'$and' => [
				[
					'id_habitacion' => $this->mongodb->getObjetId($id),

					'entrada' => [
						'$gte' => $this->mongodb->UTCDatetime($entrada),
					],

					'salida' => [
						'$lte' => $this->mongodb->UTCDatetime($salida),
					],
				]
			]

		]);
		return $result;

		if ($result != NULL) {
			return true;
		} else {
			return false;
		}
	}
}
