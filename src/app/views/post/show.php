<script language="JavaScript" type="text/javascript">
	function delpost(id) {
		if (confirm("Are you sure you want to delete this post?")) {
			window.location.href = "/post/delete/" + id;
		}
	}
</script>
<div class="blog-main">
	<div class="blog-post">
	<?php 
		if ($user->loggedIn && $post->get('author') == $user->get('id')) {
			echo '<div class="btn-group pull-right">
					<a class="btn btn-sm btn-success" aria-label="Edit" href="/post/edit/' . $post->get('id') . '">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					</a>
					<a class="btn btn-sm btn-danger" aria-label="Delete" href="javascript:delpost(' . $post->get('id') . ');">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>
				  </div>';
		}
	 ?>
		<h2 blog-post-title><?php echo $post->get('title'); ?></h2>
		<p class="blog-post-meta">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <a href="/post/by/<?php echo $post->get('author'); ?>"><?php echo $post->getAuthor()->fullname(); ?></a><br>
			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo $post->getDate(); ?>
		</p>
		<p class="content"><?php echo $post->getMarkup(); ?></p>
	</div>
</div>