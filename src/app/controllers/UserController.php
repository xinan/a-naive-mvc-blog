<?php 

/**
 * Controller UserController
 *
 * Handles the creating, updating, login and logout of users
 */
class UserController extends AppController {

	public function index() {
		self::redirect_to('user#profile');
	}

	/**
	 * Function profile
	 *
	 * Show the profile page of a user, require login
	 */
	public function profile() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$status = isset($this->params[0]) ? $this->params[0] : false;

		$view = new View('user#profile', 'My Profile');
		$view->set('user', $this->user);
		$view->set('status', $status);
		$view->render();
	}

	/**
	 * Function posts
	 *
	 * Show all posts of the logged-in user
	 */
	public function posts() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$status = isset($this->params[0]) ? $this->params[0] : false;

		$posts = Post::find_all_by('author', $this->user->get('id'), 'DESC');

		$view = new View('user#posts', 'My Posts');
		$view->set('user', $this->user);
		$view->set('status', $status);
		$view->set('posts', $posts);
		$view->render();
	}

	/**
	 * Function login
	 *
	 * Login page
	 */
	public function login() {
		if ($this->user->loggedIn) {
			self::redirect_to('user#profile');
		}

		$err = "";

		if (isset($_POST['submit'])) {
			if (empty($_POST['login']) || empty($_POST['pass'])) {
				$err = "Username or password cannot be empty!";
			} else {
				$this->user->set('username', $_POST['login']);
				$this->user->set('password', $_POST['pass']);
				$success = $this->user->login(isset($_POST['remember_me']));
				if (!$success) {
					$err = "Username and password do not match!";
				} else {
					self::redirect_to('user#profile');
				}
			}
		}

		$view = new View('user#login', 'Login');
		$view->set('user', $this->user);
		$view->set('err', $err);
		$view->render();
	}

	/**
	 * Function create
	 *
	 * Sign up page
	 */
	public function create() {
		if ($this->user->loggedIn) {
			self::redirect_to('user#profile');
		}

		$err = array('fname' => '', 'lname' => '', 'uname' => '', 'email' => '', 'pass' => '', 'pass2' => '');

		if (isset($_POST['submit'])) {
			$failed = false;
			if (empty($_POST['fname'])) {
				$err['fname'] = "You have to enter your first name :)";
				$failed = true;
			} else {
				$this->user->set('firstname', $_POST['fname']);
			}

			if (empty($_POST['lname'])) {
				$err['lname'] = "You have to enter your last name :)";
				$failed = true;
			} else {
				$this->user->set('lastname', $_POST['lname']);
			}

			if (empty($_POST['uname'])) {
				$err['uname'] = "You have to enter a username :)";
				$failed = true;
			} else {
				$this->user->set('username', $_POST['uname']);
				if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]*/", $_POST['uname'])) {
					$err['uname'] = "Please ensure that the username contains only alphanumerical text and starts with a letter :)";
					$failed = true;
				} elseif ($this->user->nameUsed($_POST['uname'])) {
					$err['uname'] = "Sorry, this username have been registered :(";
					$failed = true;
				}
			}

			if (empty($_POST['email'])) {
				$err['email'] = "You have to enter your email address :)";
				$failed = true;
			} else {
				$this->user->set('email', $_POST['email']);
				if (!$this->user->validateEmail($_POST['email'])) {
					$err['email'] = "Oops! The email address you've entered is not in a correct form :O";
					$failed = true;
				} elseif ($this->user->emailUsed($_POST['email'])) {
					$err['email'] = "Sorry, this email address has been used :(";
					$failed = true;
				}
			}

			if (empty($_POST['gender']) || ($_POST['gender'] != "Female" && $_POST['gender'] != "Male")) {
				$this->user->set('gender', 'Unknown');
			} else {
				$this->user->set('gender', $_POST['gender']);
			}

			if (empty($_POST['pass']) && empty($_POST['pass2'])) {
				$err['pass'] = "You have to set a password :)";
				$failed = true;
			} else {
				$pass = $_POST['pass'];
				$pass2 = $_POST['pass2'];
				if ($pass !== $pass2) {
					$err['pass2'] = "Confirm password must match the password :)";
					$failed = true;
				} elseif (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $pass)) {
					$err['pass'] = "Password must contain at least 8 characters, consisting of uppercase and lowercase letters, as well as numbers :)";
					$failed = true;
				} else {
					$this->user->set('password', $pass);
				}
			}

			if (!$failed) {
				$this->user->create();
				self::redirect_to('user#success');
			} 
		} 

		$view = new View('user#register', 'Sign Up');
		$view->set('user', $this->user);
		$view->set('err', $err);
		$view->render();
	}

	/**
	 * Function success
	 *
	 * Sign up success page
	 */
	public function success() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$view = new View('user#success', 'Congratulations!');
		$view->set('user', $this->user);
		$view->render();
	}

	/**
	 * Function logout
	 *
	 * Handle logout request
	 */
	public function logout() {
		session_destroy();
		setcookie('LoginToken', '', time() - 3600, '/');
		self::redirect_to('user#login');
	}

	/**
	 * Function edit
	 *
	 * Allows user to edit their profile
	 */
	public function edit() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$err = array('fname' => '', 'lname' => '');


		if (isset($_POST['submit'])) {
			$failed = false;
			if (empty($_POST['fname'])) {
				$err['fname'] = "First name cannot be blank :)";
				$failed = true;
			} else {
				$this->user->set('firstname', $_POST['fname']);
			}

			if (empty($_POST['lname'])) {
				$err['lname'] = "Last name cannot be blank :)";
				$failed = true;
			} else {
				$this->user->set('lastname', $_POST['lname']);
			}

			if (empty($_POST['gender']) || ($_POST['gender'] != "Female" && $_POST['gender'] != "Male")) {
				$this->user->set('gender', 'Unknown');
			} else {
				$this->user->set('gender', $_POST['gender']);
			}

			if (!$failed) {
				$this->user->update();
				self::redirect_to('user#profile', array('edited'));
			} 
		} 

		$view = new View('user#edit', 'Edit My Profile');
		$view->set('user', $this->user);
		$view->set('err', $err);
		$view->render();
	}

	/**
	 * Function change
	 *
	 * Change password page
	 */
	public function change() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$err = '';

		if (isset($_POST['submit'])) {
			if ($_POST['newpass'] !== $_POST['newpass2']) {
				$err = "New passwords must match :)";
			} elseif (empty($_POST['newpass'])) {
				$err = "New password cannot be empty :)";
			} elseif (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST['newpass'])) {
				$err = "New password must contain at least 8 characters, uppercase and lowercase letters, as well as numbers :)";
			} elseif (!password_verify($_POST['oldpass'], $this->user->get('password'))) {
				$err = "Current password is not correct :(";
			} else {
				$this->user->set('password', password_hash($_POST['newpass'], PASSWORD_BCRYPT));
				$this->user->update();
				$this->user->set('Password', $_POST['newpass']);
				$this->user->login();
				self::redirect_to('user#profile', array('changed'));
			}
			
		}

		$view = new View('user#change', 'Change Password');
		$view->set('user', $this->user);
		$view->set('err', $err);
		$view->render();
	}

}