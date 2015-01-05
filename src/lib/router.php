<?php 

/**
 * Class Router
 *
 * Parse the requested URI and dispatch actions
 */
final class Router {

	public $controller;
	public $action;
	public $params;

	function __construct() {
		// URI is of the form: /controller/action/param1/param2/param3...
		$uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));

		// retrieve the controller, if not specified set it to WelcomeController 
		$this->controller = $uri[0] != '' ? strtolower($uri[0]) : 'welcome';

		// retrieve the action, if not specified set it to index
		$this->action = isset($uri[1]) && $uri[1] != '' ? strtolower($uri[1]) : 'index';

		// retrieve the params, if there is no parameter it will be a empty array
		$this->params = isset($uri[2]) ? array_slice($uri, 2) : array();
	}

	// check if the class (controller) exists, if so, check if the method (action) exists. 
	// if action do exist, execute that action, if not, redirect to the index of that controller. 
	// if controller do not exist, then redirect to root
	public function routeRequest() {
		$class_name = ucfirst($this->controller) . 'Controller';

		if (class_exists($class_name)) {
			$class = new $class_name($this->params);
			if (method_exists($class_name, $this->action)) {
				$action = $this->action;
				$class->$action();
			} else {
				Controller::redirect_to($this->controller);
			}
		} else {
			Controller::redirect_to(''); // empty string means redirect to root
		}
	}

}