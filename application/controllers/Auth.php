<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Auth_model");
		$this->load->library('session');
	}

	public function iniciar_sesion()
	{
		$this->load->view('principal/head_iniciar_sesion');
		$this->load->view('principal/header');
		$this->load->view('principal/content-front');


		$btn_iniciar = $this->input->post('iniciar');

		$mensaje = array(
			'msg' => ''
		);

		if (isset($btn_iniciar)) {
			if (empty($this->input->post('correo')) || empty($this->input->post('clave'))) {
				$mensaje['msg'] = 'No pueden haber campos vacios';
				$this->load->view('principal/form/iniciar-sesion', $mensaje);
				$this->load->view('principal/content-end');
				$this->load->view('principal/footer');
			} else {
				$user = $this->Auth_model->iniciarSesion_usuario($this->input->post('correo'));
				$hotel = $this->Auth_model->iniciarSesion_hotel($this->input->post('correo'));
				$admin = $this->Auth_model->iniciarSesion_admin($this->input->post('correo'));

				if ($user || $hotel || $admin) {
					
					if (password_verify($this->input->post('clave'), @$hotel->clave) || password_verify($this->input->post('clave'), @$user->clave) || $this->input->post('clave') == @$admin->clave) {

						if ($user->actor == "usuario") {
							$sesion = array(
								'usuario' => $user->nombre,
								'id' => $user->_id,
								'actor' => $user->actor
							);
							$this->session->set_userdata($sesion);
							redirect(base_url());
						} else if ($hotel->actor == "hotel") {
							$sesion = array(
								'usuario' => $hotel->nombre,
								'id' => $hotel->_id,
								'actor' => $hotel->actor
							);
							$this->session->set_userdata($sesion);
							redirect(base_url() . 'ver-habitaciones');
						} else if ($admin->actor == "admin") {
							$sesion = array(
								'usuario' => $admin->nombre,
								'id' => $admin->_id,
								'actor' => $admin->actor
							);
							$this->session->set_userdata($sesion);
							redirect(base_url() . 'panel-admin');
						}
					} else {

						$mensaje['msg'] = 'Contraseña incorrecta';
						$this->load->view('principal/form/iniciar-sesion', $mensaje);
						$this->load->view('principal/content-end');
						$this->load->view('principal/footer');
					}
				} else {
					$mensaje['msg'] = 'Este usuario no existe';
					$this->load->view('principal/form/iniciar-sesion', $mensaje);
					$this->load->view('principal/content-end');
					$this->load->view('principal/footer');
				}
			}
		} else {
			$this->load->view('principal/form/iniciar-sesion', $mensaje);
			$this->load->view('principal/content-end');
			$this->load->view('principal/footer');
		}
	}

	public function cerrar_sesion()
	{
		session_destroy();
		redirect(base_url());
	}
}
