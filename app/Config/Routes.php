<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Views::index');
$routes->get('/login', 'Views::getLogin');
$routes->get('/signup', 'Views::getSignup');
$routes->get('/home', 'Views::index');
$routes->get('/tarea/(:num)', 'Views::getTask/$1');

$routes->post('form/signup', 'Actions::signup');
$routes->post('form/login', 'Actions::login');
$routes->post('form/create', 'Actions::createTask');
$routes->post('form/subtask', 'Actions::addSubtask');
