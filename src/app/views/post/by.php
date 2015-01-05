<div class="well">
	<h1><?php echo $author->fullname(); ?>'s posts</h1>
	<p><?php echo $author->fullname() . ' has registered for ' . $author->timeSinceJoin() . ' and written ' . count($posts) . ' post' . (count($posts) > 1 ? 's' : '') . '.'; ?></p>
</div>
<div class="blog-main">
	<?php 
		foreach ($posts as $post) {
			echo '<div class="blog-post">';
				echo '<h2 blog-post-title>' . $post->get('title') . '</h2>';
				echo '<p class="blog-post-meta">
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> ' . $post->getDate() . '
					  </p>';
				echo '<p class="content">' . $post->getAbstract() . '</p>';
				echo '<p><a href="/post/show/' . $post->get('id') . '" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Read more</a></p>';
			echo '</div>';
		}
	 ?>
</div>