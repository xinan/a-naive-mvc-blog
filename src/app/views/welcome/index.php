<div class="jumbotron">
		<h1>A Random Blog</h1>
		<br><br>
		<p class="lead">This is a blog created for the 2014 CVWO Assignment 1. You can register for an account and post anything you like!</p>
</div>

<div class="blog-main">
	<?php 
		foreach ($posts as $post) {
			echo '<div class="blog-post">';
				echo '<h2 blog-post-title>' . $post->get('title') . '</h2>';
				echo '<p class="blog-post-meta">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <a href="/post/by/' . $post->get('author') . '">' . $post->getAuthor()->fullname() . '</a><br>
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ' . $post->getDate() . '
					  </p>';
				echo '<p class="content">' . $post->getAbstract() . '</p>';
				echo '<p><a href="/post/show/' . $post->get('id') . '" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Read more</a></p>';
			echo '</div>';
		}
	 ?>
</div>