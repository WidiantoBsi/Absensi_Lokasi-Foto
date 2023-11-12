<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['Login'] = 'Auth/index';
$route['proses-login'] = 'Auth/proseslogin';
$route['logout'] = 'Auth/Logout';

//dashboar
$route['dashboard'] = 'Welcome/index';

//absen
$route['absen'] = 'Welcome/absen';

//riwayat
$route['riwayat'] = 'Riwayat/index';
$route['riwayat-'] = 'Riwayat/index2';
$route['hapus-absen/(:any)'] = 'Riwayat/hapus/$1';

//izin
$route['izin'] = 'Izin/index';
$route['tambah-izin'] = 'Izin/tambahizin';
$route['status-edit/(:any)'] = 'Izin/status/$1';

//rekap
$route['rekap'] = 'Rekap/index';
$route['print-rekap'] = 'Rekap/print';


//page user
$route['data-user'] = 'User/index';
$route['tambah-user'] = 'User/tambahUser';
$route['edit-user/(:any)'] = 'User/editprofile/$1';
$route['hapus-user/(:any)'] = 'User/hapus/$1';
$route['password-edit/(:any)'] = 'User/password/$1';
$route['user-active/(:any)'] = 'User/aktif/$1';

$route['password-edit-user/(:any)'] = 'User/passworduser/$1';

$route['foto-edit-user/(:any)'] = 'User/editfoto/$1';


//dapur
$route['dapur'] = 'dapur/index';
$route['tambah-dapur'] = 'dapur/tambah';
$route['edit-dapur/(:any)'] = 'dapur/edit/$1';
$route['hapus-dapur/(:any)'] = 'dapur/hapus/$1';
$route['active/(:any)'] = 'dapur/aktif/$1';


//profile
$route['profiles-user'] = 'Profiles/index';

//tidak ada akses
$route['noaccess'] = 'noaccess/index';

//tidak ada akses
$route['tutor'] = 'Tutor/index';