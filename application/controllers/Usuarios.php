<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("Usuario_model");
		$this->load->model("Habitacion_model");
		$this->load->model("Auth_model");
		$this->load->library('session');
	}

	public function index()
	{
	}

	public function registrar_usuario()
	{
		$this->load->view('principal/head_registro_usuario');
		$this->load->view('principal/header');
		$this->load->view('principal/content-front');


		$btn_registrar = $this->input->post("registrar");
		$mensaje = array(
			'msg' => ''
		);

		if (isset($btn_registrar)) {

			if (
				empty($this->input->post("nombre")) || empty($this->input->post("apellido")) || empty($this->input->post("cc")) ||
				empty($this->input->post("telefono")) || empty($this->input->post("f_nacimiento")) || empty($this->input->post("correo"))
				|| empty($this->input->post("clave")) || empty($this->input->post("c_clave"))
			) {
				$mensaje['msg'] = 'No pueden haber campos vacios';
				$this->load->view('principal/form/registrar-usuario', $mensaje);
				$this->load->view('principal/content-end');
				$this->load->view('principal/footer');
			} else {
				if ($this->input->post("clave") == $this->input->post("c_clave")) {

					if ($result = $this->Usuario_model->usuario_existe($this->input->post("correo"))) {
						$mensaje['msg'] = 'Este correo ya esta asociado a una cuenta';
						$this->load->view('principal/form/registrar-usuario', $mensaje);
						$this->load->view('principal/content-end');
						$this->load->view('principal/footer');
					} else {
						$datos = array(
							"nombre" => $this->input->post("nombre"),
							"apellido" => $this->input->post("apellido"),
							"cedula" => $this->input->post("cc"),
							"telefono" => $this->input->post("telefono"),
							"nacimiento" => $this->input->post("f_nacimiento"),
							"correo" => $this->input->post("correo"),
							"clave" => $this->input->post("clave"),
							"actor" => "usuario"
						);
						$resultado = $this->Usuario_model->registrar_usuario($datos);

						if ($resultado) {
							if ($user = $this->Auth_model->iniciarSesion_usuario($this->input->post('correo'),)) {
								if ($this->input->post('clave') == @$user->clave) {
									$sesion = array(
										'usuario' => $user->nombre,
										'id' => $user->_id,
										'actor' => $user->actor
									);
									$this->session->set_userdata($sesion);
									redirect(base_url());
								}
							}
						} else {
							$mensaje['msg'] = 'No se pudo guardar';
							$this->load->view('principal/form/registrar-usuario', $mensaje);
							$this->load->view('principal/content-end');
							$this->load->view('principal/footer');
						}
					}
				} else {
					$mensaje['msg'] = 'La contraseña no coincide';
					$this->load->view('principal/form/registrar-usuario', $mensaje);
					$this->load->view('principal/content-end');
					$this->load->view('principal/footer');
				}
			}
		} else {

			$this->load->view('principal/form/registrar-usuario');
			$this->load->view('principal/content-end');
			$this->load->view('principal/footer');
		}
	}

	// public function sitio_de_reservas()
	// {
	// 	$this->load->view('principal/head');
	// 	$this->load->view('principal/header_sesion');
	// 	$this->load->view('principal/content-front');
	// 	$this->load->view('principal/form/buscar-habitacion');
	// 	$this->load->view('principal/content-end');
	// 	$this->load->view('principal/footer');
	// }

	public function reservar($id_habitaccion, $precio, $n_habitacion)
	{
		$entrada = $_SESSION['entrada'];
		$salida = $_SESSION['salida'];

		

		$reserva = array(
			'id_usuario' => $_SESSION['id'],
			'id_habitacion' => $this->mongodb->getObjetId($id_habitaccion),
			'n_habitacion' => $n_habitacion,
			'entrada' => $this->mongodb->UTCDatetime($entrada),
			'salida' => $this->mongodb->UTCDatetime($salida),
			'dias_estadia' => $_SESSION['dias'],
			'precio_total' => $precio * $_SESSION['dias'],
		);

		$verificar = $this->Usuario_model->verificar_fecha($id_habitaccion, $entrada, $salida);

		if ($verificar) {
		
			$this->session->set_userdata('error_habitacion', true);
			redirect(base_url());
		} else {
			$resultado = $this->Usuario_model->reservar($reserva);

			if ($resultado) {

				// $habitacion = array(
				// 	'_id' => $this->mongodb->getObjetId($id_habitaccion)
				// );

				// $datos = array(
				// 	[
				// 		'$set' => [
				// 			'disponible' => false,
				// 		]
				// 	]
				// );

				// if ($result = $this->Habitacion_model->identificador_habitacion($id_habitaccion)) {
				// 	$this->Habitacion_model->estado_habitacion($datos, $habitacion);
				// }

				echo '<script>
				alert("Reserva exitosa");
				</script>';

				echo '<script>window.location.href="http://localhost/sistemaHotelero/"</script>';
			} else {
				echo '<script>
				alert("No se pudo realizar la reserva");
				</script>';

				echo '<script>window.location.href="http://localhost/sistemaHotelero/"</script>';
			}
		}
	}

	public function mis_reservas()
	{
		$reservas = array(
			'reserva' => $this->Usuario_model->misReservas()['reserva'],
			'estado' => $this->Usuario_model->misReservas()['estado']
		);

		$this->load->view('principal/miReservaView', $reservas);
	}

	public function eliminar_reserva($id)
	{
		$resultado = $this->Usuario_model->eliminarReserva($id);

		redirect(base_url() . 'mis-Reservas');
	}

	function ubicacion(){
		$this->load->view('habitacion/ubicacion.html');
	}
}
