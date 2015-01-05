<?php 
	if ($user->loggedIn) {
		$fullname = $user->fullname();
		$mid = '<a href="/user/profile">' . $fullname . '</a>';
		$right = '<a href="/user/logout">Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>';
	} else {
		$mid = '<a href="/user/create">Sign Up</a>';
		$right = '<a href="/user/login">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a>';
	}
	$current_uri = $_SERVER['REQUEST_URI'];
	if ($GLOBALS['router']->action == 'show' && $user->loggedIn && $post->get('author') == $user->get('id')) {
		$active = "mid";
	} elseif ($GLOBALS['router']->controller == 'welcome' || $GLOBALS['router']->action == 'show' || $GLOBALS['router']->action == 'by') {
		$active = "left";
	} elseif ($GLOBALS['router']->action == 'login') {
		$active = "right";
	} else {
		$active = "mid";
	}
 ?>
 <div class="header">
	<nav>
		<ul class="nav nav-pills pull-right">
			<li role="presentation" <?php if ($active == "left") echo 'class="active"'; ?>><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
			<li role="presentation" <?php if ($active == "mid") echo 'class="active"'; ?>><?php echo $mid; ?></li>
			<li role="presentation" <?php if ($active == "right") echo 'class="active"'; ?>><?php echo $right; ?></li>
		</ul>
	</nav>
	<h2 class="text-muted">A Random Blog</h2>
</div>