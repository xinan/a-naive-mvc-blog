<script language="JavaScript" type="text/javascript">
	function delpost(id) {
		if (confirm("Are you sure you want to delete this post?")) {
			window.location.href = "/post/delete/" + id;
		}
	}
</script>
<div class="well">
	<?php 
		if (count($posts) == 0) {
			echo '<h1>You don\'t have any post yet :(</h1><br><a class="btn btn-primary btn-sm" href="/post/add"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write one now!</a>';
		} else {
			echo '<h1>My posts</h1><p>These are all your posts, you can edit, or delete them.</p>';
		}
	 ?>
</div>
<div class="blog-main">
	<?php 
		if ($status) {
			echo '<div class="alert alert-success"><p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Post ' . $status . '.</p></div>';
		}
		foreach ($posts as $post) {
			echo '<div class="blog-post">';
				echo '<div class="btn-group pull-right">
						<a class="btn btn-sm btn-success" aria-label="Edit" href="/post/edit/' . $post->get('id') . '">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</a>
						<a class="btn btn-sm btn-danger" aria-label="Delete" href="javascript:delpost(' . $post->get('id') . ');">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
					  </div>';
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


