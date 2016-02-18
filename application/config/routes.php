<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'redbelts';
$route['login'] = 'redbelts/login';
$route['registration'] = 'redbelts/registration';
$route['destroy'] = 'redbelts/destroy';
$route['friends'] = 'loggedin/friends';
$route['deletefriend/(:num)'] = 'loggedin/deletefriend/$1';
$route['profile/(:num)'] = 'loggedin/profile/$1';
$route['add/(:num)'] = 'loggedin/add/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
