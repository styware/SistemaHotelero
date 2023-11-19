<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Habitacion/';
$route['buscar-habitacion'] = 'Habitacion/habitaciones/';
$route['iniciar-sesion'] = 'Auth/iniciar_sesion';
$route['registrar-usuario'] = 'Usuarios/registrar_usuario';
$route['cerrar-sesion'] = 'Auth/cerrar_sesion';
$route['mis-Reservas'] = 'Usuarios/mis_reservas';
$route['ver-Ubicacion'] = 'Usuarios/ubicacion';
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
// $route['sitio-de-reservas'] = 'Habitacion/sitio_de_reservas/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
