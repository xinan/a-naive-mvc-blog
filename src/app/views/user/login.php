<div class="panel panel-primary" id="login-panel">
	<div class="panel-heading">
		<h3 class="panel-title">Login</h3>
	</div>
	<div class="panel-body">
		<form action="/user/login" method="POST" class="form-signin" role="form">
			<?php 
				if ($err != '') {
					echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><br>' . $err . '</div>';
				}
			 ?>
			<label for="login" class="sr-only">Username / Email</label>
			<input name="login" type="text" value="<?php echo $user->get('username'); ?>" placeholder="Username / Email" class="form-control" autofocus><br>
			<label for="pass" class="sr-only">Password</label>
			<input name="pass" type="password" placeholder="Password" class="form-control">
			<div class="checkbox">	
				<label>
					<input type="checkbox" name="remember_me"> Remember me
				</label>
			</div>
			<button name="submit" class="btn btn-lg btn-primary btn-block" aria-label="Login">Login</button>
			<br><p>Don't have an account? <a href="/user/create">Sign up now!</a></p>
		</form>
	</div>		
</div>