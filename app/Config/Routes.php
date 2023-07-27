<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/dashboard/pembeli', 'Dashboard::pembeli', ['filter' => 'auth']);

// Data Akun 
// $routes->get('/data-akun', 'DataAkun::index', ['filter' => 'auth']);
// 

// $routes->get('/data-akun/edit/(:num)', 'DataAkun::edit/$1', ['filter' => 'auth']);
// $routes->post('/data-akun/update/(:num)', 'DataAkun::update/$1', ['filter' => 'auth']);
// $routes->get('/data-akun/detail/(:num)', 'DataAkun::detail/$1', ['filter' => 'auth']);

// Akun
$routes->get('/user', 'Akun::index', ['filter' => 'auth']);
$routes->post('/user/save', 'Akun::save', ['filter' => 'auth']);
$routes->post('/user/update/(:num)', 'Akun::update/$1', ['filter' => 'auth']);
$routes->get('/user/edit/(:num)', 'Akun::edit/$1', ['filter' => 'auth']);
$routes->delete('/user/(:num)', 'Akun::deleteAkun/$1', ['filter' => 'auth']);

//Laporan
$routes->get('/laporan', 'Laporan::index', ['filter' => 'auth']);
$routes->add('/laporan/print', 'Laporan::print_tanggal', ['filter' => 'auth']);
$routes->post('/user/update/(:num)', 'Akun::update/$1', ['filter' => 'auth']);
$routes->get('/user/edit/(:num)', 'Akun::edit/$1', ['filter' => 'auth']);
$routes->delete('/user/(:num)', 'Akun::deleteAkun/$1', ['filter' => 'auth']);

// Pembayaran
$routes->get('/pembayaran', 'Pembayaran::index', ['filter' => 'auth']);
$routes->post('/tambah/save', 'Pembayaran::save', ['filter' => 'auth']);
$routes->get('/edit/(:num)', 'Pembayaran::edit/$1', ['filter' => 'auth']);
$routes->post('/edit/update/(:num)', 'Pembayaran::update/$1', ['filter' => 'auth']);
$routes->delete('/pembayaran/(:num)', 'Pembayaran::delete/$1', ['filter' => 'auth']);

// Transaksi
$routes->get('/transaksi', 'Transaksi::index', ['filter' => 'auth']);
$routes->get('/transaksi/create', 'Transaksi::create', ['filter' => 'auth']);
$routes->post('/transaksi/save', 'Transaksi::save', ['filter' => 'auth']);
$routes->post('/transaksi/checkout', 'Transaksi::proses_order', ['filter' => 'auth']);
$routes->add('/transaksi/hapus/(:any)', 'Transaksi::hapus/$1', ['filter' => 'auth']);
$routes->add('/transaksi/ubah_cart', 'Transaksi::ubah_cart', ['filter' => 'auth']);
$routes->get('/transaksi/edit/(:num)', 'Transaksi::edit/$1', ['filter' => 'auth']);
$routes->get('/transaksi/detail/(:num)', 'Transaksi::detail/$1', ['filter' => 'auth']);
$routes->post('/transaksi/update/(:num)', 'Transaksi::update/$1', ['filter' => 'auth']);
$routes->delete('/transaksi/(:num)', 'Transaksi::delete/$1', ['filter' => 'auth']);


// Kategori
$routes->get('/kategori', 'Kategori::index', ['filter' => 'auth']);
$routes->post('/kategori/save', 'Kategori::save', ['filter' => 'auth']);
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1', ['filter' => 'auth']);
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1', ['filter' => 'auth']);
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1', ['filter' => 'auth']);

// Barang
$routes->get('/barang', 'Barang::index', ['filter' => 'auth']);
$routes->post('/barang/save', 'Barang::save', ['filter' => 'auth']);
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1', ['filter' => 'auth']);
$routes->post('/barang/update/(:num)', 'Barang::update/$1', ['filter' => 'auth']);
$routes->delete('/barang/(:num)', 'Barang::delete/$1', ['filter' => 'auth']);

$routes->get('/', 'Utama::index');
// Login Register
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');
$routes->post('/login/auth', 'Login::auth');


$routes->get('/setting/(:num)', 'Setting::edit/$1', ['filter' => 'auth']);
$routes->post('/setting/update/(:num)', 'Setting::update/$1', ['filter' => 'auth']);

// Menu

$routes->get('/menu', 'Menu::index', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
