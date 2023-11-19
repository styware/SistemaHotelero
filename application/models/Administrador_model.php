<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrador_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("mongodb");
        $this->db = $this->mongodb->db()->usuarios;
        $this->hoteles = $this->mongodb->db()->hoteles;
    }

    public function usuarios()
    {
        $result = $this->db->find();

        return $result;
    }

    public function hoteles()
    {
        $result = $this->hoteles->find();

        return $result;
    }

    public function editar_usuario($datos, $user)
    {
        $result = $this->db->updateOne($user, $datos);
        return $result;
    }

    public function identificador_usuario($id)
    {
        $result = $this->db->findOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function editar_hotel($datos, $hotel)
    {
        $result = $this->hoteles->updateOne($hotel, $datos);
        return $result;
    }

    public function identificador_hotel($id)
    {
        $result = $this->hoteles->findOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar_usuario($id)
    {
        $deleteResult = $this->db->deleteOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($deleteResult != null) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar_hotel($id)
    {
        $deleteResult = $this->hoteles->deleteOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($deleteResult != null) {
            return true;
        } else {
            return false;
        }
    }

    public function registrar_hotel($datos)
    {
        $resultado = $this->hoteles->insertOne($datos);

        if ($resultado->getInsertedCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function total_usuarios()
    {
        $result = $this->db->count();
        return $result;
    }

    public function total_hoteles()
    {
        $resultado = $this->hoteles->count();
        return $resultado;
    }
}
