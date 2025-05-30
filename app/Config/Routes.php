<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Views::index');
$routes->get('/home', 'Views::index');

$routes->get('/login', 'Views::getLogin');
$routes->post('form/login', 'Actions::login');

$routes->get('/signup', 'Views::getSignup');
$routes->post('form/signup', 'Actions::signup');

$routes->get('/logout', 'Actions::logout');

$routes->get('/perfil/id(:num)', 'Views::getProfile/$1');


$routes->post('form/create', 'Actions::createTask');
$routes->post('form/edit', 'Actions::editTask');
$routes->post('form/deleteTask', 'Actions::deleteTask');

$routes->get('/tarea/(:num)', 'Views::getTask/$1');
$routes->get('/updT/(:num)/(:num)', 'Actions::setCompletedTask/$1/$2');

$routes->get('/archive/(:num)', 'Actions::archiveTask/$1');
$routes->get('/archived/for/(:num)', 'Views::getArchived/$1');

$routes->get('colaboracion/(:num)/(:any)', 'Actions::procesarCollab/$1/$2');
$routes->get('/collabs/for/(:num)', 'Views::getCollabs/$1');

$routes->post('form/filter/(:any)', 'Views::filter/$1');
$routes->get('form/filtered/(:any)', 'Views::showFilter');

$routes->post('update/task-status/(:num)', 'Actions::changeTaskStatus/$1');


$routes->post('form/newSubtask', 'Actions::createSubtask');
$routes->post('form/editSubtask', 'Actions::editSubtask');
$routes->post('form/deleteSubtask', 'Actions::deleteSubtask');
$routes->post('update/sbtask-status/(:num)/(:num)', 'Actions::changeSubtaskStatus/$1/$2');

$routes->post('form/collaboration/for/(:num)', 'Actions::sendCollab/$1');
// $routes->get('colaboracion/1/read', 'Views::getTask/1/read');
