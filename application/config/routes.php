<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['pengguna_co'] = 'pengguna';
$route['login'] = 'auth/index';
$route['daftar'] = 'auth/daftar';
$route['pengguna/index'] = 'pengguna_con/index';
$route['pengguna/index/(:any)'] = 'pengguna_con/index/(:any)';
$route['pengguna/profile'] = 'pengguna_con/viewProfile';

// Petugas
$route['loginpetugas'] = 'auth/loginpetugaspkt';
$route['petugas'] = 'petugas_con/index';
$route['petugas/balasan'] = 'petugas_con/balasanSurat';
$route['petugas/pelapor'] = 'petugas_con/pelaporView';
$route['petugas/petugasakun'] = 'petugas_con/petugasView';
// $route['asu/jancok/(:num)'] = 'petugas_con/pesanBalasan/(:num)';
// $route['pengguna/viewLaporan/(:any)'] = 'pengguna_con/viewLaporan/(:any)';
