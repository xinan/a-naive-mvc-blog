<?php 

/**
 * A Simple (Naive) PHP MVC Blog
 *
 * @version		1.0
 * @author		Liu Xinan
 * @copyright	2014 Liu Xinan
 */


// for use in development mode
error_reporting(E_ALL);

// define some path globals
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/');
define("APP_PATH", ROOT . 'app/');
define("CONTROLLERS_PATH", APP_PATH . 'controllers/');
define("MODELS_PATH", APP_PATH . 'models/');
define("VIEWS_PATH", APP_PATH . 'views/');


// load the config and core files
include ROOT . 'config/config.php';
include ROOT . 'lib/core.php';

// start the session
session_start();

// instantialize a router and start to route the request
$router = new Router();
// why I did not make the constructer execute this next line is that I may need to access the properties of the router
// when routing the request. Therefore the object must be constructed before routing. 
$router->routeRequest();
