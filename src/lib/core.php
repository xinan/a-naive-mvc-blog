<?php 

/**
 * Function __autoload
 *
 * Autoload controllers and models when needed.
 */
function __autoload($class) {
	if (file_exists(MODELS_PATH . $class . '.php')) {
		require_once MODELS_PATH . $class . '.php';
	} elseif (file_exists(CONTROLLERS_PATH . $class . '.php')) {
		require_once CONTROLLERS_PATH . $class . '.php';
	}
}

/**
 * Function DBH
 *
 * @return the database connection
 */
function DBH() {
	static $db = null;

	if ($db === null) {
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone = \'+08:00\'', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		try {
			$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS, $options);
		} catch (PDOException $ex) {
			die("Failed to connect to the database: " . $ex->getMessage());
		}
	}
	return $db;
}

// load the libraries
include 'router.php';
include 'model.php';
include 'view.php';
include 'controller.php';