<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("mongodb");
        $this->db = $this->mongodb->db()->usuarios;
        $this->hoteles = $this->mongodb->db()->hoteles;
        $this->admin = $this->mongodb->db()->admin;

    }

    public function iniciarSesion_usuario($correo){
		$resultado = $this->db->findOne(['correo' => $correo]);

        return $resultado;
    }

    public function iniciarSesion_hotel($correo){
		$resultado = $this->hoteles->findOne(['correo' => $correo]);

        return $resultado;
    }

    public function iniciarSesion_admin($correo){
		$resultado = $this->admin->findOne(['correo' => $correo]);

        return $resultado;
    }
}