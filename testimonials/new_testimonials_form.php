 <?php
    include("../connect_rpl_db.php");
?>
 <?php
    ob_start();
	function renderForm($image, $name, $designation, $message, $error)

	{

?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html>
		
		<head>
			<title>Category form</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/3.3.7:bootstrap.min.css">
			<script src="../js/3.2.1:jquery.min.js"></script>
			<script src="../js/3.3.7:bootstrap.min.js"></script>
	
		</head>
		<body>
			<style>
	        body  {
	            background-image: url('../images/bon.jpg');
	            background-color: #B6B6B4;
	        }
	    	</style>       
			
		<br>	
			
		<?php
		// if there are any errors, display them
			if ($error != '')
				{
					echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
				}
		?>
			<form action="" method="post">
			<div>
			<div class="container">
			<div class="row">
			<div class="card">
				<div class="card-header">
					<h2>Add testimonials</h2>
				</div>
				<div class="card-body">
					<!-- THis is card body -->
				</div>
			</div>

			    
			    	
			    	<form enctype="multipart/form-data" action="upload_photo.php" method="post" name="upimg">
					<input name="MAX_FILE_SIZE" value="102400" type="hidden">
					<input name="image" accept="image/jpeg/gif" type="file">
					<input value="Submit" type="submit">
			    	<br>

			    	<label for="name" class="col-2 col-form-label">Name:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="name" id="name"><?php echo $name; ?></textarea>
			    	<br>

			    	<label for="Designation" class="col-2 col-form-label">Designation:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="name" id="designation"><?php echo $designation; ?></textarea>
			    	<br>

			    	<label for="message" class="col-2 col-form-label">Message:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="name" id="message"><?php echo $message; ?></textarea>
			    	<br>
			    	<br>
			    	<br>
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<br>
			    	<br>
			</div>
			</div>
			</div>
			</form>  
			</body>
		</html>
		<?php
		}
			// connect to the database
			include('../connect_rpl_db.php');
			if (isset($_POST['submit'])){
				// get form data, making sure it is valid
				$image = mysql_real_escape_string(htmlspecialchars($_POST['image']));
				$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
				$designation = mysql_real_escape_string(htmlspecialchars($_POST['designation']));
				$message = mysql_real_escape_string(htmlspecialchars($_POST['message']));
				
				
				// check to make sure both fields are entered

				if ($image == '' || $name == '' || $designation == '' || $message == '')

					{
						$error = 'ERROR: Please fill in all required fields!';
				
						renderForm($image, $name, $designation, $message, $error);
					}
				else{

					

					if(isset($_GET['id'])){
						$id11 = $_GET['id'];
						mysql_query("UPDATE testimonials SET image='$image', name='$name', designation='$designation', message='$message' WHERE id='$id11'")
						or die(mysql_error());	


					}else{
						mysql_query("INSERT testimonials SET image='$image',name='$name', designation='$designation', message='$message'")
						or die(mysql_error());	

					}
						
					echo "New testimonials details entered successfully";
					
				}

		    }
		    elseif(isset($_GET['id'])){
				$id = $_GET['id'];
		
				$result = mysql_query("SELECT * FROM testimonials WHERE id=".$id);
				$row = mysql_fetch_array($result);
				$image = $row['image'];
				$name = $row['name'];
				$designation = $row['designation'];
				$message = $row['message'];
				

				renderForm($image, $name, $designation, $message);
				
			}
			else
				{
					renderForm('','','','');
				}
		?>