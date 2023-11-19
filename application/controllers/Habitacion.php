<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Habitacion extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Habitacion_model");

		if ($this->session->userdata('actor') == 'usuario') {
			// redirect(base_url());
		} else if ($this->session->userdata('actor') == 'hotel') {
			redirect(base_url() . 'ver-habitaciones');
		} else if ($this->session->userdata('actor') == 'admin') {
			redirect(base_url() . 'panel-admin');
		}else if(!isset($_SESSION['usuario'])){
			// redirect(base_url());
		}
	}
	public function index()
	{
		$this->load->view('principal/head');
		$this->load->view('principal/header');
		$this->load->view('principal/content-front');
		$this->load->view('principal/form/buscar-habitacion');
		$this->load->view('principal/content-end');
		$this->load->view('principal/footer');
	}

	public function habitaciones()
	{
		$lugar = $this->input->post('lugar');
		$entrada =  $this->input->post('f_entrada');
		$salida = $this->input->post('f_salida');
		$verificar = $this->input->post('verificar');
		$mensaje = array(
			'msg' => ''
		);

		if (isset($verificar)) {

			if (!empty($this->input->post('f_entrada')) || !empty($this->input->post('f_salida'))) {

				$datetime1 = new DateTime($entrada, new DateTimeZone('America/Bogota'));
				$datetime2 = new DateTime($salida , new DateTimeZone('America/Bogota'));
				$interval = $datetime1->diff($datetime2);
				$dias = (int) $interval->format('%R%a');

				if ($dias > 0) {
					$buscar = array(
						'entrada' => $entrada,
						'salida' => $salida,
						'dias' => $dias
					);
				
					$this->session->set_userdata($buscar);

					$caracteres = substr($lugar, 0, 3);
					$caracteresM = strtoupper($caracteres);

					$habitaciones = array(
						'habitacion' => $this->Habitacion_model->buscar_habitacion($caracteres, $caracteresM)
					);
					$this->load->view('habitacion/habitaciones.php', $habitaciones);

				} else {
					$mensaje['msg'] = 'Por favor introduzca una fechas valida';
					$this->load->view('principal/head');
					$this->load->view('principal/header');
					$this->load->view('principal/content-front');
					$this->load->view('principal/form/buscar-habitacion', $mensaje);
					$this->load->view('principal/content-end');
					$this->load->view('principal/footer');
				}
			} else {
				$mensaje['msg'] = 'Por favor introduzca las fechas';
				$this->load->view('principal/head');
				$this->load->view('principal/header');
				$this->load->view('principal/content-front');
				$this->load->view('principal/form/buscar-habitacion', $mensaje);
				$this->load->view('principal/content-end');
				$this->load->view('principal/footer');
			}
		} else {
			echo 'Algo a salido mal :(';
		}
	}
}
