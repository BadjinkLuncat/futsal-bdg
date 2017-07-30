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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'home';
$route['auth/login'] = 'auth/login';
$route['auth/login/post'] = 'auth/postlogin';
$route['auth/logout'] = 'auth/logout';
$route['auth/register'] = 'auth/regsiter';
$route['auth/register/insert'] = 'auth/postregister';

$route['tentang-kami'] = 'tentang';
$route['kontak-kami'] = 'tentang/kontak';
$route['keranjang-booking'] = 'transaksi';
$route['cara-booking'] = 'transaksi/cara_booking';
$route['konfirmasi-pembayaran'] = 'transaksi/konfirmasi_pembayaran';
$route['konfirmasi-pembayaran/check-kode'] = 'transaksi/check_kode';
$route['konfirmasi-pembayaran/konfirmasi'] = 'transaksi/konfirmasi';
$route['lapang/(:num)'] = 'lapang';
$route['lapang/(:num)'] = 'lapang/detail/$1';
$route['cari-lapang'] = 'lapang/cari';
$route['booking'] = 'reservasi/booking';
$route['booking/checkout'] = 'reservasi/checkout';
$route['reservasi/register-checkout'] = 'reservasi/checkoutregister';

$route['artikel'] = 'artikel';
$route['artikel/(:num)'] = 'artikel/detail/$1';
$route['cari-artikel'] = 'artikel/cari';

$route['admin/auth/login'] = 'backend/auth';
$route['admin/auth/login/post'] = 'backend/auth/login';
$route['admin/auth/logout'] = 'backend/auth/logout';
$route['admin/auth/register'] = 'backend/auth/regsiter';
$route['admin/auth/register/insert'] = 'backend/auth/postregister';
$route['admin/dashboard'] = 'backend/dashboard';
$route['admin/user-trustee/admin'] = 'backend/user-trustee/admin';
$route['admin/user-trustee/admin/create'] = 'backend/user-trustee/admin/create';
$route['admin/user-trustee/admin/insert'] = 'backend/user-trustee/admin/insert';
$route['admin/user-trustee/admin/edit/(:num)'] = 'backend/user-trustee/admin/edit/$1';
$route['admin/user-trustee/admin/update/(:num)'] = 'backend/user-trustee/admin/update/$1';
$route['admin/user-trustee/admin/delete/(:num)'] = 'backend/user-trustee/admin/delete/$1';

$route['admin/user-trustee/owner'] = 'backend/user-trustee/owner';
$route['admin/user-trustee/owner/create'] = 'backend/user-trustee/owner/create';
$route['admin/user-trustee/owner/insert'] = 'backend/user-trustee/owner/insert';
$route['admin/user-trustee/owner/edit/(:num)'] = 'backend/user-trustee/owner/edit/$1';
$route['admin/user-trustee/owner/update/(:num)'] = 'backend/user-trustee/owner/update/$1';
$route['admin/user-trustee/owner/delete/(:num)'] = 'backend/user-trustee/owner/delete/$1';

$route['admin/user-trustee/member'] = 'backend/user-trustee/member';
$route['admin/user-trustee/member/delete/(:num)'] = 'backend/user-trustee/member/delete/$1';

$route['admin/lapang'] = 'backend/lapang';
$route['admin/lapang/edit'] = 'backend/lapang/edit';
$route['admin/lapang/update/(:num)'] = 'backend/lapang/update/$1';
$route['admin/lapang/detail/(:num)'] = 'backend/lapang/detail/$1';
$route['admin/lapang/detail/tambah/(:num)'] = 'backend/lapang/tambah_lapang/$1';
$route['admin/lapang/detail/insert/(:num)'] = 'backend/lapang/insert_lapang/$1';
$route['admin/lapang/detail/edit/(:num)'] = 'backend/lapang/edit_lapang/$1';
$route['admin/lapang/detail/update/(:num)'] = 'backend/lapang/update_lapang/$1';
$route['admin/lapang/detail/delete/(:num)'] = 'backend/lapang/delete_lapang/$1';
$route['admin/lapang/detail/jadwal/(:num)'] = 'backend/lapang/jadwal/$1';

$route['owner/register'] = 'backend/auth/register';
$route['owner/register/create'] = 'backend/auth/postregister';

$route['admin/artikel'] = 'backend/artikel';
$route['admin/artikel/create'] = 'backend/artikel/create';
$route['admin/artikel/insert'] = 'backend/artikel/insert';
$route['admin/artikel/edit/(:num)'] = 'backend/artikel/edit/$1';
$route['admin/artikel/update/(:num)'] = 'backend/artikel/update/$1';
$route['admin/artikel/delete/(:num)'] = 'backend/artikel/delete/$1';

$route['admin/reservasi'] = 'backend/reservasi';
$route['admin/reservasi/create'] = 'backend/reservasi/create';
$route['admin/reservasi/insert'] = 'backend/reservasi/insert';
$route['admin/reservasi/konfirmasi/(:num)'] = 'backend/reservasi/konfirmasi/$1';
$route['admin/reservasi/detail/(:num)'] = 'backend/reservasi/detail/$1';
$route['admin/reservasi/lunas/(:num)'] = 'backend/reservasi/lunas/$1';
