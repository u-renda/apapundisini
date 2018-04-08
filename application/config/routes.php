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
$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* MAIN */
$route['index'] = 'beranda/index';
$route['produk/(:any)'] = 'produk/index/$1';

/* ADMIN */
$route['admin'] = 'admin/login/index';
$route['admin/logout'] = 'admin/login/logout';
$route['admin/produk'] = 'admin/produk/produk_lists';
$route['admin/produk_kategori'] = 'admin/produk/produk_kategori_lists';
$route['admin/produk_kategori_create'] = 'admin/produk/produk_kategori_create';
$route['admin/produk_kategori_delete'] = 'admin/produk/produk_kategori_delete';
$route['admin/produk_kategori_get'] = 'admin/produk/produk_kategori_get';
$route['admin/produk_kategori_update'] = 'admin/produk/produk_kategori_update';
$route['admin/produk_create'] = 'admin/produk/produk_create';
$route['admin/produk_delete'] = 'admin/produk/produk_delete';
$route['admin/produk_get'] = 'admin/produk/produk_get';
$route['admin/produk_update'] = 'admin/produk/produk_update';
$route['admin/slider'] = 'admin/slider/slider_lists';
$route['admin/slider_create'] = 'admin/slider/slider_create';
$route['admin/slider_delete'] = 'admin/slider/slider_delete';
$route['admin/slider_get'] = 'admin/slider/slider_get';
