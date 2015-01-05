<div class="panel panel-warning" id="login-panel">
	<div class="panel-heading">
		<h3 class="panel-title">Change Password</h3>
	</div>
	<div class="panel-body">
		<form action="/user/change" method="POST" class="form-signin" role="form">
			<?php 
				if ($err != '') {
					echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><br>' . $err . '</div>';
				}
			 ?>
			<label for="oldpass" class="sr-only">Current Password</label>
			<input name="oldpass" type="password" placeholder="Current Password" class="form-control" autofocus><br>
			<label for="newpass" class="sr-only">New Password</label>
			<input name="newpass" type="password" placeholder="New Password" class="form-control">
			<label for="newpass2" class="sr-only">Confirm New Password</label>
			<input name="newpass2" type="password" placeholder="Confirm New Password" class="form-control">
			<button name="submit" class="btn btn-lg btn-warning btn-block">Change</button>
		</form>
	</div>		
</div>