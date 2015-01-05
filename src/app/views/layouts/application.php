<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Liu Xinan">
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/css/blog.css">
	<title><?php echo $this->_title; ?></title>
</head>
<body>

	<div class="container">
	
		<?php include 'header.php'; ?>
	
		<?php include $this->_file; ?>

		<?php include 'footer.php'; ?>
	</div>

	<!-- Scripts put at the end for faster loading of the page -->
	<script type="text/javascript" src="/public/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
</body>
</html>