<script type="text/javascript" src="/public/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/public/js/tinymce/tinymce.init.js"></script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $form_title; ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST">
			<p>
				<label>Title</label>
				<span class="error"><?php echo $err['title']; ?></span><br>
				<?php 
					// if there is an error in body and no error in title, autofocus body, otherwise autofocus title
				 ?>
				<input type="text" name="title" value="<?php echo $post->get('title'); ?>" size="100%" class="form-control" <?php if ($err['body'] == '' || $err['title'] != '') echo 'autofocus' ?>>
			</p>
			<p>
				<label>Content</label>
				<span class="error"><?php echo $err['body']; ?></span><br>
				<textarea name="body" cols="60" rows="10" class="form-control" <?php if ($err['body'] != '' && $err['title'] == '') echo 'id="autofocus"'; ?>><?php echo $post->get('body'); ?></textarea>
			</p>
			<p><button name="submit" class="btn btn-primary"><?php echo $button_name; ?></button></p>
		</form>
	</div>
</div>