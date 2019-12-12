<?php
defined('BASEPATH') or exit('No direct script access allowed');



//API_GET
$route['api/api_get/get_data_booking']['GET'] = '/api/Api_Get/get_data_booking_where_status_booking';
$route['api/api_get/get_data_barang']['POST'] = '/api/Api_Get/get_data_barang';

//API USER
$route['app/user/login']['POST'] = '/app/user/login';


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
