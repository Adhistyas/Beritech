<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// -----------------------------------------------------------------
// FRONTEND (Pengunjung)
// -----------------------------------------------------------------
$routes->get('/', 'Frontend\BerandaController::index');
$routes->get('artikel', 'Frontend\BerandaController::articles');
$routes->get('artikel/(:segment)', 'Frontend\ArtikelController::detail/$1');
$routes->get('tentang', 'Frontend\BerandaController::about');

// -----------------------------------------------------------------
// ADMIN (Backend)
// -----------------------------------------------------------------
$routes->group('admin', static function (RouteCollection $routes) {
    // Auth (tidak perlu login)
    $routes->get('login', 'Admin\AutentikasiController::login');
    $routes->post('login', 'Admin\AutentikasiController::attemptLogin');
    $routes->get('logout', 'Admin\AutentikasiController::logout');

    // Area yang wajib login, dilindungi oleh filter 'adminauth'
    $routes->group('', ['filter' => 'adminauth'], static function (RouteCollection $routes) {
        $routes->get('/', 'Admin\DashboardController::index');
        $routes->get('dashboard', 'Admin\DashboardController::index');

        // Manajemen Artikel
        $routes->get('articles', 'Admin\ArtikelController::index');
        $routes->get('articles/create', 'Admin\ArtikelController::create');
        $routes->post('articles/store', 'Admin\ArtikelController::store');
        $routes->get('articles/edit/(:num)', 'Admin\ArtikelController::edit/$1');
        $routes->post('articles/update/(:num)', 'Admin\ArtikelController::update/$1');
        $routes->get('articles/delete/(:num)', 'Admin\ArtikelController::delete/$1');

        // Manajemen Kategori
        $routes->get('categories', 'Admin\KategoriController::index');
        $routes->get('categories/create', 'Admin\KategoriController::create');
        $routes->post('categories/store', 'Admin\KategoriController::store');
        $routes->get('categories/edit/(:num)', 'Admin\KategoriController::edit/$1');
        $routes->post('categories/update/(:num)', 'Admin\KategoriController::update/$1');
        $routes->get('categories/delete/(:num)', 'Admin\KategoriController::delete/$1');
    });
});
