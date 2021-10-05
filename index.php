<?php
//set_include_path(dirname());

/**
 *
 * Require files
 *
 */
require_once __DIR__ . '/config/__init.php';
require_once __DIR__ . '/router/Route.php';


/**
 * new Instance of router
 */
$router = new Router();


/**
 * handle / route
 */
$router->get('/', 'main.php');

/**
 * handle /create route
 */
$router->get('/create', '/exercises/create.php');

/**
 * handle /take route
 */
$router->get('/take', '/exercises/take.php');

/**
 * handle /manage route
 */
$router->get('/manage', '/exercises/manage.php');
/**
 * handle /field route
 */
$router->get('/create/field', '/exercises/fields/field.php');