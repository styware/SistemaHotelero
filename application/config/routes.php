<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Habitacion/';
$route['buscar-habitacion'] = 'Habitacion/habitaciones/';
$route['iniciar-sesion'] = 'Auth/iniciar_sesion';
$route['registrar-usuario'] = 'Usuarios/registrar_usuario';
$route['cerrar-sesion'] = 'Auth/cerrar_sesion';
$route['mis-Reservas'] = 'Usuarios/mis_reservas';
$route['detalles/(:any)'] = 'Habitacion/detalles/$1';
$route['eliminar-reserva/(:any)'] = 'Usuarios/eliminar_reserva/$1';
$route['reservar/(:any)/(:any)/(:any)'] = 'Usuarios/reservar/$1/$2/$3';
$route['panel-admin'] = 'Administrador/panel_admin';
$route['registrar-hotel-admin'] = 'Administrador/registrar_hotel';
$route['ver-usuarios'] = 'Administrador/ver_usuarios';
$route['ver-hoteles'] = 'Administrador/ver_hoteles';
$route['editar-usuario/(:any)'] = 'Administrador/editar_usuario/$1';
$route['editar-hotel/(:any)'] = 'Administrador/editar_hotel/$1';
$route['eliminar-usuario/(:any)'] = 'Administrador/eliminar_usuario/$1';
$route['eliminar-hotel/(:any)'] = 'Administrador/eliminar_hotel/$1';
$route['registrar-habitacion'] = 'Hoteles/registrar_habitacion';
$route['panel-hotel'] = 'Hoteles/panel_hotel';
$route['ver-habitaciones'] = 'Hoteles/ver_habitaciones';
$route['registrar-habitacion'] = 'Hoteles/registrar_habitacion';
$route['registrar-hotel'] = 'Hoteles/registrar_hotel';
$route['editar-habitacion/(:any)'] = 'Hoteles/editar_habitacion/$1';
$route['eliminar-habitacion/(:any)'] = 'Hoteles/eliminar_habitacion/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
