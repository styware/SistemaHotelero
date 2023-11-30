<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hoteles extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Hotel_model");
		$this->load->model("Auth_model");
		$this->load->library('session');
	}

	public function panel_hotel()
	{
		$this->load->view('hotel/header');
		$this->load->view('hotel/sidebar');
		$this->load->view('hotel/navbar');
		$this->load->view('hotel/footer');
	}

	public function registrar_hotel()
	{
		$this->load->view('hotel/head');
		$this->load->view('principal/header');
		$this->load->view('principal/content-front');


		$btn_registrar = $this->input->post("registrar");
		$mensaje = array(
			'msg' => ''
		);

		if (isset($btn_registrar)) {

			if (
				empty($this->input->post("nombre")) || empty($this->input->post("encargado")) || empty($this->input->post("cc")) ||
				empty($this->input->post("telefono")) || empty($this->input->post("correo"))
				|| empty($this->input->post("clave")) || empty($this->input->post("c_clave"))
			) {
				$mensaje['msg'] = 'No pueden haber campos vacios';
				$this->load->view('principal/form/registrarse-hotel', $mensaje);
				$this->load->view('principal/content-end');
				$this->load->view('principal/footer');
			} else {
				if ($this->input->post("clave") == $this->input->post("c_clave")) {

					$datos = array(
						"nombre" => $this->input->post("nombre"),
						"encargado" => $this->input->post("encargado"),
						"cedula" => $this->input->post("cc"),
						"telefono" => $this->input->post("telefono"),
						"correo" => $this->input->post("correo"),
						"clave" => password_hash($this->input->post("clave"), PASSWORD_DEFAULT),
						"actor" => "hotel"
					);
					$resultado = $this->Hotel_model->registrar_hotel($datos);

					if ($resultado) {

						if ($hotel = $this->Auth_model->iniciarSesion_hotel($this->input->post('correo'),)) {
							if ($this->input->post('clave') == @$hotel->clave) {
								$sesion = array(
									'usuario' => $hotel->nombre,
									'id' => $hotel->_id,
									'actor' => $hotel->actor
								);
								$this->session->set_userdata($sesion);
								redirect(base_url() . 'panel-hotel');
							} else {
								$this->load->view('principal/form/registrarse-hotel', $mensaje);
								$this->load->view('principal/content-end');
								$this->load->view('principal/footer');;
							}
						} else {
							$this->load->view('principal/form/registrarse-hotel', $mensaje);
							$this->load->view('principal/content-end');
							$this->load->view('principal/footer');;
						}
					} else {
						$mensaje['msg'] = 'No se pudo guardar';
						$this->load->view('principal/form/registrarse-hotel', $mensaje);
						$this->load->view('principal/content-end');
						$this->load->view('principal/footer');;
					}
				} else {
					$mensaje['msg'] = 'La contraseña no coincide';
					$this->load->view('principal/form/registrarse-hotel', $mensaje);
					$this->load->view('principal/content-end');
					$this->load->view('principal/footer');
				}
			}
		} else {
			$this->load->view('principal/form/registrarse-hotel');
			$this->load->view('principal/content-end');
			$this->load->view('principal/footer');
		}
	}

	public function registrar_habitacion()
	{
		$this->load->library('image_lib');

		$this->load->view('hotel/header');
		$this->load->view('hotel/sidebar');
		$this->load->view('hotel/navbar');
		$this->load->view('hotel/content-registrar-habitacion');
		$this->load->view('hotel/footer');


		$button = $this->input->post("registrar");
		$alertas = array('msg' => '');
		$imagen = @$_FILES['imagen']['name'];
		$id_hotel = $_SESSION['id'];
		$comida = $this->input->post("comida") == 'on' ? true : false;
		$aire = $this->input->post("aire") == 'on' ? true : false;
		$wifi = $this->input->post("wifi") == 'on' ? true : false;
		$television = $this->input->post("tv") == 'on' ? true : false;

		if (
			empty($this->input->post("n_camas")) || empty($this->input->post("n_personas")) ||
			empty($this->input->post("precio")) || empty($this->input->post("n_habitacion"))
			|| empty($this->input->post("ciudad"))
		) {

			if (isset($button)) {
				// $alertas['msg'] = 'Porfavor Complete todos los campos';
				echo 'Porfavor Complete todos los campos';
			}
		} else {

			$config['upload_path'] = './asset/habitaciones_registradas';
			$config['allowed_types'] = 'png|jpg';
			$config['file_name'] = @$_FILES['imagen']['name'];
			$config['max_size'] = 1024 * 2;
			//tamaño maximo en kilobytes
			$config['max_width'] = '800';
			$config['max_height'] = '800';
			// $config['image_library'] = 'gd2';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('imagen')) {
				//redireccionar a otra vista 
				// if(isset($button)){
				// 	$alertas['msg'] = $this->upload->display_errors() ;
				// }
				echo $this->upload->display_errors();
			} else {
				$datos = array(
					'n_camas' => $this->input->post("n_camas"),
					'n_personas' => $this->input->post("n_personas"),
					'precio' => $this->input->post("precio"),
					'categoria' => $this->input->post("categoria"),
					'n_habitacion' => $this->input->post("n_habitacion"),
					'ciudad' => strtoupper($this->input->post("ciudad")),
					'imagen' => $imagen,
					'disponible' => true,
					'id_hotel' => $id_hotel,
					'hotel' => $_SESSION['usuario'],
					'comida' => $comida,
					'aire' => $aire,
					'wifi' => $wifi,
					'television' => $television
				);
				if ($this->Hotel_model->registrar_habitacion($datos)) {
					if (isset($button)) {
						// $alertas['msg'] = 'Habitacion registrada';
						echo 'habitacion registrada';
					}
				} else {
					if (isset($button)) {
						// $alertas['msg'] = 'Error al registrar la habitacion';
						echo 'Error al registrar la habitacion';
					}
				}
			}
		}
	}

	public function ver_habitaciones()
	{
		$id = ($_SESSION['id']);

		$this->load->view('hotel/header');
		$this->load->view('hotel/sidebar');
		$this->load->view('hotel/navbar');
		$habitaciones = array(
			'habitacion' => $this->Hotel_model->habitaciones($id)
		);
		$this->load->view('hotel/content-habitacion', $habitaciones);
		$this->load->view('hotel/footer');
	}

	public function editar_habitacion($id)
	{
		$habitacion = array(
			'_id' => $this->mongodb->getObjetId($id)
		);
		
		$mensajes = array(
			'msg' => ''
		);

		$btn_modificar = $this->input->post('modificar');

		if (isset($btn_modificar)) {
			if (
				empty($this->input->post('ciudad')) || empty($this->input->post('n_camas'))
				|| empty($this->input->post('n_personas')) || empty($this->input->post('precio'))
				|| empty($this->input->post('n_habitacion')) 
				
			) {
				$mensajes['msg'] = 'No deben haber campos vacios';
			} else {

				$datos = array(
					[
						'$set' => [

							'ciudad' => strtoupper($this->input->post('ciudad')),
							'n_camas' => $this->input->post('n_camas'),
							'n_personas' => $this->input->post('n_personas'),
							'n_habitacion' => $this->input->post('n_habitacion'),
							'precio' => $this->input->post('precio'),
						]
					]
				);

				if ($resultado = $this->Hotel_model->identificador_habitacion($id)) {
					$this->Hotel_model->editar_habitacion($datos, $habitacion);
					redirect(base_url() . 'ver-habitaciones');
				} else {
					echo 'error';
				}
			}
		}
	}

	public function eliminar_habitacion($id)
	{
		$resultado = $this->Hotel_model->eliminar_habitacion($id);

		if($resultado){
			redirect(base_url() . 'ver-habitaciones');
		}{
			echo 'error al eliminar';
		}
	}

	public function filtrar_habitacion(){
		
	}
}
