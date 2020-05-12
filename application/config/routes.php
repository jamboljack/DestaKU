<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller']           = 'login';
$route['lupa-password']                = 'lupa_password';
$route['lupa-password/reset/(:any)']   = 'lupa_password/reset/$1';
$route['lupa-password/updatepassword'] = 'lupa_password/updatepassword';
$route['404_override']                 = 'my_error';
$route['translate_uri_dashes']         = false;
