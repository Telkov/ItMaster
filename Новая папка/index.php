<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- <script src="js/jquery-3.2.1.min.js"></script> -->
	<!-- <script src="js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="container-fluid main">
		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
			<?php require_once "views/sidebar.php"; ?>
		</div>
		
		<div class="col-lg-10 col-md-9 col-sm-8 col-xs-8">
			<?php 
			require_once "views/incmsglist.php"; 
			require_once "views/recmsglist.php"; 
			?>
		</div>

	</div>

	<?php 
		echo '<hr>';
		require_once "views/mailform.php";
	 ?>
	
</body>
</html>