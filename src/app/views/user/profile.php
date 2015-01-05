<?php 
	if ($status) {
		if ($status == 'changed') {
			echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Password changed successfully!</div>';
		} elseif ($status == 'edited') {
			echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Your profile has been updated!</div>';
		}
		
	}
 ?>

<div class="well">
	<h1>Hi <?php echo $user->get('firstname') . " " . $user->get('lastname'); ?>!</h1>
	<p>This is your profile page :)</p>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">My Info</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tr>
				<td>Username: </td>
				<td><?php echo $user->get('username'); ?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php echo $user->get('email'); ?></td>
			</tr>
			<tr>
				<td>Gender: </td>
				<td><?php echo $user->get('gender'); ?></td>
			</tr>
			<tr>
				<td>Registered: </td>
				<td><?php echo $user->timeSinceJoin(); ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Blogging</h3>
	</div>
	<div class="panel-body">
		<h3>
			<a class="btn btn-primary btn-lg" href="/post/add"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Write a post</a> 
			<a class="btn btn-primary btn-lg" href="/user/posts"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View my posts</a>
		</h3>
	</div>
</div>

<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">Manage My Account</h3>
	</div>
	<div class="panel-body">
		<h3>
			<a class="btn btn-lg btn-success" href="/user/change"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Change password</a>
			<a class="btn btn-lg btn-success" href="/user/edit"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit profile</a>
		</h3>
	</div>
</div>