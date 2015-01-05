<?php 

/**
 * Class Controller
 *
 * Base Controller.
 * Take requests and parameters from Router, process and render
 */
abstract class Controller {

	public $params;

	function __construct($params) {
		$this->params = $params;
	}	

	// accept a route of the form 'controller#action', as well as an array of parameters
	public static function redirect_to($route, $params = false) {
		$path = '/' . str_replace('#', '/', $route) . ($params ? ('/' . implode('/', $params)) : '');
        header('Location: ' . $path, true, 302);
        exit;
	}

}