<?php 

	$id = $_REQUEST['id'];
	$thb = $_REQUEST['thb'];

	$sql = "DELETE FROM exch052_history WHERE recordID = $id";

	require 'connect.php';

	$sql_exe = $conn -> query($sql);

	$conn->close();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
 	<title>Delete</title>
 </head>
 <body>
 	<center class="body">

 	<?php  
		if ($sql_exe) {     	?>

			<h2 class='text-success'>Delete Complete! <small>Delete ID : <?php echo $id ?> THB = <?php echo $thb ?></small></h2>

			<a href="index.php" class="btn btn-warning">Back</a>
			
	<?php }else{?>

			<h1 class="text-danger">Delete Failed!</h1>

	<?php }					?>
</center>
 </body>
 </html>