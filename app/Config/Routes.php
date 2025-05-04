<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Views::inicio');
$routes->get('/login', 'Views::getLogin');
$routes->get('/signup', 'Views::getSignup');
$routes->post('form/signup', 'Actions::signup');
$routes->post('form/login', 'Actions::login');
