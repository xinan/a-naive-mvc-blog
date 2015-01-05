<?php 

/**
 * Controller WelcomeController
 *
 * Shows the home page of the blog site
 */
class WelcomeController extends AppController {

	public function index() {
		$posts = Post::all('DESC'); // indicate order as 'DESC'

		$view = new View('welcome#index', 'A Random Blog');
		$view->set('user', $this->user);
		$view->set('posts', $posts);
		$view->render();
	}

}