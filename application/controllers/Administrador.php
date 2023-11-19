<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrador extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Administrador_model");
		$this->load->library('session');
	}
	public function panel_admin()
	{
		$this->load->view('panel/header');
		$this->load->view('panel/sidebar');
		$this->load->view('panel/navbar');

		$datos = array(
			'usuarios' => $this->Administrador_model->total_usuarios(),
			'hoteles' => $this->Administrador_model->total_hoteles()
		);

		$this->load->view('panel/content',$datos);
		$this->load->view('panel/footer');
	}
	public function ver_usuarios()
	{
		$this->load->view('panel/header');
		$this->load->view('panel/sidebar');
		$this->load->view('panel/navbar');
		$usuarios = array(
			'usuario' => $this->Administrador_model->usuarios()
		);

		$this->load->view('panel/content-usuario', $usuarios);
		$this->load->view('panel/footer');
	}

	public function ver_hoteles()
	{
		$this->load->view('panel/header');
		$this->load->view('panel/sidebar');
		$this->load->view('panel/navbar');
		$hoteles = array(
			'hotel' => $this->Administrador_model->hoteles()
		);
		$this->load->view('panel/content-hotel', $hoteles);
		$this->load->view('panel/footer');
	}

	public function registrar_hotel()
	{
		$this->load->view('panel/header');
		$this->load->view('panel/sidebar');
		$this->load->view('panel/navbar');
		$this->load->view('panel/content-registrar-hotel');
		$this->load->view('panel/footer');

		$btn_registrar = $this->input->post("registrar");

		if (isset($btn_registrar)) {

			if (
				empty($this->input->post("nombre")) || empty($this->input->post("encargado")) || empty($this->input->post("cc")) ||
				empty($this->input->post("telefono")) || empty($this->input->post("correo"))
				|| empty($this->input->post("clave")) || empty($this->input->post("c_clave"))
			) {
				echo "No pueden haber campos vacios";
			} else {
				if ($this->input->post("clave") == $this->input->post("c_clave")) {
					
					$datos = array(
						"nombre" => $this->input->post("nombre"),
						"encargado" => $this->input->post("encargado"),
						"cedula" => $this->input->post("cc"),
						"telefono" => $this->input->post("telefono"),
						"correo" => $this->input->post("correo"),
						"clave" => $this->input->post("clave"),
						"actor" => "hotel"
					);
					$resultado = $this->Administrador_model->registrar_hotel($datos);

					if($resultado)
					{
						echo "Guardado con exito";
					}else{
						echo "No se pudo guardar";
					}
				} else {
					echo "La contraseña no coincide";
				}
			}
		}

	}
	
	public function editar_usuario($id)
	{
		$user = array(
			'_id' => $this->mongodb->getObjetId($id)
		);

		$mensajes = array(
			'msg' => ''
		);

		$btn_modificar = $this->input->post('modificar');

		if (isset($btn_modificar)) {
			if (
				empty($this->input->post('nombre')) || empty($this->input->post('apellido'))
				|| empty($this->input->post('f_nacimiento')) || empty($this->input->post('telefono'))
			) {
				$mensajes['msg'] = 'No deben haber campos vacios';
			} else {

				$datos = array(
					[
						'$set' => [

							'nombre' => $this->input->post('nombre'),
							'apellido' => $this->input->post('apellido'),
							'nacimiento' => $this->input->post('f_nacimiento'),
							'telefono' => $this->input->post('telefono'),

						]
					]
				);

				if ($resultado = $this->Administrador_model->identificador_usuario($id)) {
					$this->Administrador_model->editar_usuario($datos, $user);
					redirect(base_url() . 'ver-usuarios');
				} else {
					echo 'error';
				}
			}
		}
	}

	public function editar_hotel($id)
	{
		$hotel = array(
			'_id' => $this->mongodb->getObjetId($id)
		);

		$mensajes = array(
			'msg' => ''
		);

		$btn_modificar = $this->input->post('modificar');

		if (isset($btn_modificar)) {
			if (
				empty($this->input->post('nombre')) || empty($this->input->post('encargado'))
				|| empty($this->input->post('telefono'))
			) {
				$mensajes['msg'] = 'No deben haber campos vacios';
			} else {

				$datos = array(
					[
						'$set' => [

							'nombre' => $this->input->post('nombre'),
							'encargado' => $this->input->post('encargado'),
							'telefono' => $this->input->post('telefono'),
						]
					]
				);

				if ($resultado = $this->Administrador_model->identificador_hotel($id)) {
					$this->Administrador_model->editar_hotel($datos, $hotel);
					redirect(base_url() . 'ver-hoteles');
				} else {
					echo 'error';
				}
			}
		}
	}

	public function eliminar_usuario($id)
	{
		$resultado = $this->Administrador_model->eliminar_usuario($id);

		if($resultado){
			redirect(base_url() . 'ver-usuarios');
		}{
			echo 'error al eliminar';
		}
	}

	public function eliminar_hotel($id)
	{
		$resultado = $this->Administrador_model->eliminar_hotel($id);

		if($resultado){
			redirect(base_url() . 'ver-hoteles');
		}{
			echo 'error al eliminar';
		}
	}
}
