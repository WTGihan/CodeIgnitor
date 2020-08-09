<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['assignments/index'] = 'assignments/index';
$route['assignments/create'] = 'assignments/create';
$route['assignments/update'] = 'assignments/update';
$route['assignments/(:any)']='assignments/view/$1';
$route['assignments'] = 'assignments/index';

$route['default_controller'] = 'pages/view';

$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
