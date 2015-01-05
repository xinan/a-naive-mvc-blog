<div class="panel panel-success" id="login-panel">
	<div class="panel-heading">
		<h3 class="panel-title">Edit my profile</h3>
	</div>
	<div class="panel-body">
		<form action="/user/edit" method="POST" class="form-signin" role="form">
			<label for="fname" class="pull-left">First Name</label>
			<input name="fname" type="text" placeholder="First Name" value="<?php echo $user->get('firstname'); ?>" class="form-control" autofocus>
			<span class="error"><?php echo $err['fname']; ?></span><br>
			<label for="lname" class="pull-left">Last Name</label>
			<input name="lname" type="text" placeholder="Last Name" value="<?php echo $user->get('lastname'); ?>" class="form-control">
			<span class="error"><?php echo $err['lname']; ?></span><br>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Female" <?php if ($user->get('gender') == "Female") echo "checked"; ?>>Female
			</label>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Male" <?php if ($user->get('gender') == "Male") echo "checked"; ?>>Male
			</label>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Unknown" <?php if ($user->get('gender') != "Female" && $user->get('gender') != "Male") echo "checked"; ?>>I don't know
			</label><br><br>
			<button name="submit" class="btn btn-lg btn-success btn-block">Save Changes</button>
		</form>
	</div>
</div>