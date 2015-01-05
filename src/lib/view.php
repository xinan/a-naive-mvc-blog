<?php 

/**
 * Class View
 *
 * Basic View.
 * Binds variable from controller, load layout and substitute templates
 */
class View {

	protected $_file;
	protected $_title;
	protected $_data = array();

    // accepts a route of the form 'controller#action', as well as a page title
    // using the route to get the file path of the view
	public function __construct($route, $page_title) {
		$parts = explode('#', $route);
        $controller = strtolower($parts[0]);
        $action = !isset($parts[1]) || $parts[1] == '' ? 'index' : strtolower($parts[1]); 
        $this->_file = VIEWS_PATH . $controller . '/' . $action . '.php';

        $this->_title = $page_title;
    }

    // will be used by controllers to bind and get variables
    public function set($key, $value) {
        $this->_data[$key] = $value;
    }
    public function get($key) {
        return $this->_data[$key];
    }

    // extract the variables set by controller, and load the application template
    public function render() {
        extract($this->_data);
        ob_start();
        include VIEWS_PATH . 'layouts/application.php';
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

}