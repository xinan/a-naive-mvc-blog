<?php 

/**
 * Class Model
 *
 * The basic model, act as an abstraction layer for database interaction
 */
abstract class Model {

	// contains attributes of a database record
	protected $params = array();

	/**
	 * Function validateEmail
	 *
	 * A static helper to validate an email
	 */
	public static function validateEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	/**
	 * Function serverTime
	 *
	 * @return current time on database server
	 */
	public function serverTime() {
		$serverTime = DBH()->query("SELECT UNIX_TIMESTAMP(NOW()) as NOW;");
		$now = $serverTime->fetch()['NOW'];
		return $now;
	}

	/**
	 * Function get
	 *
	 * @return a certain attribute of a record
	 */
	public function get($key) {
		return $this->params[$key];
	}

	/**
	 * Function set
	 *
	 * Set a certain attribute of a record
	 * It is not saved to database yet
	 */
	public function set($key, $value) {
		$this->params[$key] = htmlspecialchars(trim($value)); // escaping
	}

	/**
	 * Function resemble
	 *
	 * Create a model object from a database record
	 * @return a model object
	 */
	public static function resemble($result) {
		$object = new static(); // late static binding
		foreach ($result as $key => $value) {
			$object->params[$key] = $value; // cannot use set because it will be escaped again
		}
		return $object;
	}

	/**
	 * Function all
	 *
	 * Retrieve all records from the database
	 * @return an array of model instances
	 */
	public static function all($order = 'ASC') {
		$sql = 'SELECT * FROM ' . static::$table . ';';
		$query = DBH()->prepare($sql);
		$query->execute();
		$results = $order == 'DESC' ? array_reverse($query->fetchAll()) : $query->fetchAll();
		return array_map(function($result) { return self::resemble($result); }, $results);
	}

	/**
	 * Function find
	 *
	 * Retrieve a record by id
	 * @return a model object of the retrieved record
	 */
	public static function find($id) {
		return self::find_by('id', $id);
	}

	/**
	 * Function find_by
	 *
	 * Find a record by specifying a single condition
	 * @return a module object of the first record
	 */
	public static function find_by($column, $value) {
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = ? LIMIT 1;';
		$query = DBH()->prepare($sql);
		$query->execute(array($value));
		if ($query->rowCount() == 0) {
			return false;
		} else {
			return self::resemble($query->fetch());
		}
	}

	/**
	 * Function find_all_by
	 *
	 * Find all records satisfying a condition
	 * @return an array of model objects
	 */
	public static function find_all_by($column, $value, $order = 'ASC') {
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = ?;';
		$query = DBH()->prepare($sql);
		$query->execute(array($value));
		$results = $order == 'DESC' ? array_reverse($query->fetchAll()) : $query->fetchAll();
		if (empty($results)) {
			return array();
		} else {
			return array_map(function($result) { return self::resemble($result); }, $results);
		}
	}

	/**
	 * Function create
	 *
	 * Creates a database record for the current model
	 */
	public function create() {
		$columns = implode(', ', array_keys($this->params));
		$bindings = substr(str_repeat(', ?', count($this->params)), 2);
		$sql = 'INSERT INTO ' . static::$table . ' (' . $columns . ') VALUES (' . $bindings . ');';
		$query = DBH()->prepare($sql);
		$query->execute(array_values($this->params));
	}

	/**
	 * Function update
	 *
	 * Update the db record of current object
	 */
	public function update() {
		if (isset($this->params['updated'])) {
			$this->params['updated'] = null;
		} // 'updated' is an auto timestamp

		$columns = array();
		foreach (array_keys($this->params) as $key) {
			array_push($columns, $key . ' = ?');
		}
		$bindings = implode(', ', $columns);
		$sql = 'UPDATE ' . static::$table . ' SET ' . $bindings . ' WHERE id = ' . $this->get('id') . ' ;';
		$query = DBH()->prepare($sql);
		$query->execute(array_values($this->params));
	}

	/**
	 * Function destroy
	 *
	 * Drop the record of the current object from the database
	 */
	public function destroy() {
		$sql = 'DELETE FROM ' . static::$table . ' WHERE id = ' . $this->get('id') . ';';
		$query = DBH()->prepare($sql);
		$query->execute();
	}

}