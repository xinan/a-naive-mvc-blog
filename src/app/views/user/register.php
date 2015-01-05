<div class="panel panel-primary" id="login-panel">
	<div class="panel-heading">
		<h3 class="panel-title">Sign Up</h3>
	</div>
	<div class="panel-body">
		<form action="/user/create" method="POST" class="form-signin" role="form">
			<label for="fname" class="sr-only">First Name</label>
			<input name="fname" type="text" placeholder="First Name" value="<?php echo $user->get('firstname'); ?>" class="form-control" autofocus>
			<span class="error"><?php echo $err['fname']; ?></span><br>
			<label for="lname" class="sr-only">Last Name</label>
			<input name="lname" type="text" placeholder="Last Name" value="<?php echo $user->get('lastname'); ?>" class="form-control">
			<span class="error"><?php echo $err['lname']; ?></span><br>
			<label for="uname" class="sr-only">Username</label>
			<input name="uname" type="text" placeholder="Username" value="<?php echo $user->get('username'); ?>" class="form-control">
			<span class="error"><?php echo $err['uname']; ?></span><br>
			<label for="email" class="sr-only">Email Address</label>
			<input name="email" type="text" placeholder="Email Address" value="<?php echo $user->get('email'); ?>" class="form-control">
			<span class="error"><?php echo $err['email']; ?></span><br>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Female" <?php if ($user->get('gender') == "Female") echo "checked"; ?>>Female
			</label>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Male" <?php if ($user->get('gender') == "Male") echo "checked"; ?>>Male
			</label>
			<label class="radio-inline">
				<input type="radio" name="gender" value="Unknown" <?php if ($user->get('gender') != "Female" && $user->get('gender') != "Male") echo "checked"; ?>>I don't know
			</label><br><br>
			<label for="pass" class="sr-only">Password</label>
			<input name="pass" type="password" placeholder="Password" class="form-control">
			<span class="error"><?php echo $err['pass']; ?></span>
			<label for="pass2" class="sr-only">Confirm Password</label>
			<input name="pass2" type="password" placeholder="Confirm Password" class="form-control">
			<span class="error"><?php echo $err['pass2']; ?></span>
			<span>*All fields are required.</span><br><br>
			<button name="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
		</form>
		<p>Already registered? <a href="/user/login">Login now!</a></p>
	</div>
</div>