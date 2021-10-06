<?php
/**
 *
 * Require files
 *
 */
require_once __DIR__ . '/config/__init.php';
require_once __DIR__ . '/router/Route.php';
set_include_path(".");
session_start();


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
$router->get('/create', '/pages/create_exercise.php');

/**
 * handle /take route
 */
$router->get('/take', '/pages/take_exercise.php');

/**
 * handle /manage route
 */
$router->get('/manage', '/pages/manage_exercise.php');
/**
 * handle /add_field route
 */
$router->get('/create/field', '/pages/add_field.php');