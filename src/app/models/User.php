<?php 

/**
 * Model User
 *
 * A User have the following attributes: 
 * id, firstname, lastname, username, email, gender, password, created
 *
 * Among this, the 'id' and 'created' columns are automatically generated by the database
 * Thus, when constructing a new post, these attributes need not to be created in params
 */
class User extends Model {

	// the name of table in database
	public static $table = 'users';

	public $loggedIn = false;

	function __construct() {
		$this->set('firstname', '');
		$this->set('lastname', '');
		$this->set('username', '');
		$this->set('email', '');
		$this->set('gender', '');
		$this->set('password', '');
	}

	/**
	 * Function current
	 *
	 * @return the current user
	 * If not logged in, returns a new User instance
	 */
	public static function current() {
		static $user = null;

		if ($user === null) {
			if (isset($_SESSION['LoginUser'])) {
				$user = self::find($_SESSION['LoginUser']);
				if ($user) {
					$user->loggedIn = true;
					return $user;
				}
			} elseif (isset($_COOKIE['LoginToken'])) {
				$parts = explode('@', htmlspecialchars_decode($_COOKIE['LoginToken']));
				$id = $parts[0];
				$token = isset($parts[1]) ? $parts[1] : '';
				$user = self::find($id);
				if ($user !== false) {
					$hashed_password = $user->get('password');
					if (password_verify($hashed_password, $token)) {
						setcookie('LoginToken', $_COOKIE['LoginToken'], time() + 3600 * 24 * 30, '/'); // renew cookie
						$user->loggedIn = true;
						$_SESSION['LoginUser'] = $id;
						return $user;
					}
				}
			}
			$user = new User();
		}
		return $user;
	}

	/**
	 * Function create
	 *
	 * Create a new user record in the database, and log the user in
	 * Override the parent method because password needs to be hashed
	 */
	public function create() {
		$password = $this->get('password');
		$this->set('password', password_hash($password, PASSWORD_BCRYPT));
		parent::create();
		$this->set('password', $password); // set it back to unhashed password so that login() function will work
		$this->login();
	}

	/**
	 * Function nameUsed
	 *
	 * Check if a username has been used
	 */
	public function nameUsed($uname) {
		return $this->find_by('username', $uname);
	}

	/**
	 * Function emailUsed
	 *
	 * Check if an email address has been used
	 */
	public function emailUsed($email) {
		return $this->find_by('email', $email);
	}

	/**
	 * Function login
	 *
	 * Log the user in, accepts both username and email address
	 */
	public function login($remember = false) {
		$user = $this->find_by('username', $this->get('username'));
		if (!$user) {
			$user = $this->find_by('email', $this->get('username'));
			if (!$user) {
				return false;
			}
		}
		$hashed_password = $user->get('password');
		if (password_verify($this->get('password'), $hashed_password)) {
			$uid = $user->get('id');
			$_SESSION['LoginUser'] = $uid;
			$token = $uid . '@' . password_hash($hashed_password, PASSWORD_BCRYPT);
			if ($remember) {
				setcookie('LoginToken', $token, time() + 3600 * 24 * 30, '/');
			}
			$this->loggedIn = true;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Function timeSinceJoin
	 *
	 * @return a string describing how long the user has been registered
	 */
	public function timeSinceJoin() {
		$regDate = strtotime($this->get('created'));
		$now = $this->serverTime();
		$memSince = $now - $regDate;
		
		if($memSince < 60) {
			$memFor = $memSince . " second";
		} elseif ($memSince < 3600 && $memSince > 60) {
			$memFor = floor($memSince / 60) . " minute";
		} elseif ($memSince < 86400 && $memSince > 60) {
			$memFor = floor($memSince / 3600) . " hour";
		} elseif ($memSince < 604800 && $memSince > 3600) {
			$memFor = floor($memSince / 86400) . " day";
		} elseif ($memSince < 2592000 && $memSince > 86400) {
			$memFor = floor($memSince / 604800) . " week";
		} elseif ($memSince > 604800) {
			$memFor = floor($memSince / 2592000) . " month";
		}
		if (explode(' ', $memFor)[0] != '1') {
			$memFor .= 's';
		}
		return $memFor;
	}

	/**
	 * Function fullname
	 *
	 * @return the full name of the user
	 */
	public function fullname() {
		return $this->get('firstname') . ' ' . $this->get('lastname');
	}

}