<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Habitacion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("mongodb");
        // $this->db = $this->mongodb->db()->usuarios;
        // $this->hoteles = $this->mongodb->db()->hoteles;
        $this->habitacion = $this->mongodb->db()->habitacion;
    }
    public function buscar_habitacion($caracteres, $caracteresM)
    {
        $result = $this->habitacion->find([
            '$or' => [
                ['ciudad' => ['$regex' => $caracteres]],
                ['ciudad' => ['$regex' => $caracteresM]],
            ]
        ]);
        
        return $result;
    }

    public function identificador_habitacion($id)
    {
        $result = $this->habitacion->findOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($result) {
            return true;
        } else {
            return false;
        }

    }
    
    public function estado_habitacion($datos, $id)
    {
        $result = $this->habitacion->updateOne($id, $datos);
        
        return $result;
    }
}
