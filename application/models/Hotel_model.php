<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("mongodb");
        $this->db = $this->mongodb->db()->hoteles;
        $this->db->habitacion = $this->mongodb->db()->habitacion;
    }

    public function registrar_hotel($datos){
        $resultado = $this->db->insertOne($datos);

        if($resultado->getInsertedCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function registrar_habitacion($datos)
    {
        $resultado = $this->db->habitacion->insertOne($datos);

        if ($resultado->getInsertedCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function habitaciones($id){
        $result = $this->db->habitacion->find(['id_hotel' => $this->mongodb->getObjetId($id)]);

        return $result;
    }

    public function identificador_habitacion($id)
    {
        $result =$this->db->habitacion->findOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function editar_habitacion($datos, $habitacion)
    {
        $result = $this->db->habitacion->updateOne($habitacion, $datos);
        return $result;
    }

    public function eliminar_habitacion($id){
        $deleteResult = $this->db->habitacion->deleteOne(['_id' => $this->mongodb->getObjetId($id)]);

        if ($deleteResult != null) {
            return true;
        } else {
            return false;
        }
    }
}