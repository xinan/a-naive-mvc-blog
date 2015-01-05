<?php 

/**
 * Controller PostController
 *
 * Handling the CRUD of posts
 */
class PostController extends AppController {

	// every controller must have an index action, it is the default action when a action is not found, see '/lib/router.php'
	public function index() {
		if ($this->user->loggedIn) {
			self::redirect_to('user#posts');
		} else {
			self::redirect_to('');
		}
	}

	/**
	 * Function by
	 *
	 * List all post by a certain user
	 */
	public function by() {
		$authorid = isset($this->params[0]) ? $this->params[0] : -1;

		$posts = Post::find_all_by('author', $authorid, 'DESC');

		if ($posts === false) {
			self::redirect_to('');
		}

		$author = User::find($authorid);

		$view = new View('post#by', $author->fullname() . '\'s Posts');
		$view->set('user', $this->user);
		$view->set('author', $author);
		$view->set('posts', $posts);
		$view->render();
	}

	/**
	 * Function show
	 *
	 * Show a particular post
	 */
	public function show() {
		$postid = isset($this->params[0]) ? $this->params[0] : -1;

		$post = Post::find($postid);

		if ($post === false) {
			self::redirect_to('');
		}

		$view = new View('post#show', $post->get('title'));
		$view->set('user', $this->user);
		$view->set('post', $post);
		$view->render();
	}

	/**
	 * Function add
	 *
	 * Add a post, requires login
	 */
	public function add() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$post = new Post();
		$post->set('author', $this->user->get('id'));

		$err = array('title' => '', 'body' => '');

		if (isset($_POST['submit'])) {
			$failed = false;
			$_POST = array_map('stripcslashes',	$_POST);
			extract($_POST);
			if ($title == '') {
				$err['title'] = "* Please enter a title :)";
				$failed = true;
			} else {
				$post->set('title', $title);
			}
			if ($body =='') {
				$err['body'] = "* Please enter some content :)";
				$failed = true;
			} else {
				$post->set('body', $body);
			}

			if (!$failed) {
				$post->create();
				self::redirect_to('user#posts', array('added'));
			}
		}

		$view = new View('post#add', 'Write A Post');
		$view->set('user', $this->user);
		$view->set('post', $post);
		$view->set('err', $err);
		$view->render();
	}

	/**
	 * Function edit
	 *
	 * Edit a post, requires login, and user be the owner of the post
	 */
	public function edit() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		$postid = isset($this->params[0]) ? $this->params[0] : -1;

		$post = Post::find($postid);

		if ($post === false || $post->get('author') !== $this->user->get('id')) {
			self::redirect_to('user#posts');
		}

		$err = array('title' => '', 'body' => '');

		if (isset($_POST['submit'])) {
			$failed = false;
			$_POST = array_map('stripcslashes',	$_POST);
			extract($_POST);
			if ($title == '') {
				$err['title'] = "* Please enter a title :)";
				$failed = true;
			} else {
				$post->set('title', $title);
			}
			if ($body =='') {
				$err['body'] = "* Please enter some content :)";
				$failed = true;
			} else {
				$post->set('body', $body);
			}

			if (!$failed) {
				$post->update();
				self::redirect_to('user#posts', array('edited'));
			}
		}

		$view = new View('post#edit', 'Edit A Post');
		$view->set('user', $this->user);
		$view->set('post', $post);
		$view->set('err', $err);
		$view->render();
	}

	/**
	 * Function delete
	 *
	 * Delete a post, requires login, and user be the owner of the post
	 */
	public function delete() {
		if (!$this->user->loggedIn) {
			self::redirect_to('user#login');
		}

		if (isset($this->params[0])) {
			$post = Post::find($this->params[0]);

			// make sure the user owns this post
			if ($post->get('author') == $this->user->get('id')) {
				$post->destroy();
				self::redirect_to('user#posts', array('deleted'));
			}
		}
		self::redirect_to('user#posts');
	}

}