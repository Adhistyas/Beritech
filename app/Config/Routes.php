<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// -----------------------------------------------------------------
// FRONTEND (Pengunjung)
// -----------------------------------------------------------------
$routes->get('/', 'Frontend\HomeController::index');
$routes->get('artikel', 'Frontend\HomeController::articles');
$routes->get('artikel/(:segment)', 'Frontend\ArticleController::detail/$1');
$routes->get('tentang', 'Frontend\HomeController::about');

// -----------------------------------------------------------------
// ADMIN (Backend)
// -----------------------------------------------------------------
$routes->group('admin', static function (RouteCollection $routes) {
    // Auth (tidak perlu login)
    $routes->get('login', 'Admin\AuthController::login');
    $routes->post('login', 'Admin\AuthController::attemptLogin');
    $routes->get('logout', 'Admin\AuthController::logout');

    // Area yang wajib login, dilindungi oleh filter 'adminauth'
    $routes->group('', ['filter' => 'adminauth'], static function (RouteCollection $routes) {
        $routes->get('/', 'Admin\DashboardController::index');
        $routes->get('dashboard', 'Admin\DashboardController::index');

        // Manajemen Artikel
        $routes->get('articles', 'Admin\ArticleController::index');
        $routes->get('articles/create', 'Admin\ArticleController::create');
        $routes->post('articles/store', 'Admin\ArticleController::store');
        $routes->get('articles/edit/(:num)', 'Admin\ArticleController::edit/$1');
        $routes->post('articles/update/(:num)', 'Admin\ArticleController::update/$1');
        $routes->get('articles/delete/(:num)', 'Admin\ArticleController::delete/$1');

        // Manajemen Kategori
        $routes->get('categories', 'Admin\CategoryController::index');
        $routes->get('categories/create', 'Admin\CategoryController::create');
        $routes->post('categories/store', 'Admin\CategoryController::store');
        $routes->get('categories/edit/(:num)', 'Admin\CategoryController::edit/$1');
        $routes->post('categories/update/(:num)', 'Admin\CategoryController::update/$1');
        $routes->get('categories/delete/(:num)', 'Admin\CategoryController::delete/$1');
    });
});
