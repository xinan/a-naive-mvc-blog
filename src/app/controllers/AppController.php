<?php 

/**
 * Controller AppController
 *
 * Add a user mechanism to the base controller
 */
class AppController extends Controller {

	public $user;

	function __construct($params) {
		parent::__construct($params);
		$this->user = User::current();
	}

  /**
   * Function index
   *
   * index of AppController shouldn't be requested
   * In case it is requested, redirect to root
   */
  function index() {
    self::redirect_to('');
  }

}