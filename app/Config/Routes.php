<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
// $routes->get('/pendaftaran', 'PagesController::pendaftaran');

$routes->get('/form-pengajuan', 'PagesController::form_pengajuan');
$routes->post('/form-pengajuan', 'PagesController::pengajuan');
$routes->get('/tracking-pengajuan', 'PagesController::tracking_pengajuan');
$routes->post('/tracking-pengajuan', 'PagesController::pengajuan_tracked');

$routes->get('/dashboard','AdminController::index',['filter' => 'authfilter']);
$routes->get('/profile', 'AdminController::profile/'.session()->get('id'),['filter' => 'authfilter']);
$routes->get('/profile/(:num)', 'AdminController::profile/$1',['filter' => 'authfilter']);
$routes->post('/profile/(:num)', 'AdminController::update_profile/$1',['filter' => 'authfilter']);
$routes->get('/ganti-password/(:num)', 'AdminController::ganti_password/$1',['filter' => 'authfilter']);
$routes->post('/ganti-password/(:num)', 'AdminController::update_password/$1',['filter' => 'authfilter']);
$routes->get('/kelola-pengajuan', 'AdminController::kelola_pengajuan',['filter' => 'authfilter']);
$routes->get('/kelola-penduduk', 'AdminController::kelola_penduduk',['filter' => 'authfilter']);
$routes->get('/kelola-user', 'AdminController::kelola_user',['filter' => 'authfilter']);
$routes->post('kelola-user/export', 'AdminController::export_user',['filter' => 'authfilter']);
$routes->post('kelola-pengajuan/export', 'AdminController::export_pengajuan',['filter' => 'authfilter']);
$routes->get('kelola-pengajuan/cetak', 'AdminController::cetak_pengajuan',['filter' => 'authfilter']);
$routes->post('kelola-masyarakat/export', 'AdminController::export_masyarakat',['filter' => 'authfilter']);
$routes->get('/kelola-user/tambah', 'AdminController::kelola_user_tambah',['filter' => 'authfilter']);
// $routes->get('/kelola-user/edit/(:any)', 'AdminController::kelola_user_update/$1',['filter' => 'authfilter']);
$routes->post('/kelola-user/tambah', 'AdminController::create_user',['filter' => 'authfilter']);
$routes->post('/pengajuan/update_status/(:any)', 'PagesController::update_status_pengajuan/$1',['filter' => 'authfilter']);
$routes->delete('/pengajuan/hapusPengajuan/(:any)', 'PagesController::hapus_pengajuan/$1',['filter' => 'authfilter']);
$routes->delete('/masyarakat/hapusMasyarakat/(:any)', 'AdminController::hapus_masyarakat/$1',['filter' => 'authfilter']);
$routes->delete('/user/hapusUser/(:any)', 'AdminController::hapus_user/$1',['filter' => 'authfilter']);

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
