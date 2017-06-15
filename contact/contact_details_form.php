 <?php
    include("../connect_rpl_db.php");
?>
 <?php
    ob_start();
	function renderForm($name, $email, $phone_number, $message, $error)

	{

?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html>
		
		<head>
			<title>Contact form</title>
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
					<h2>Add new contact</h2>
				</div>
				<div class="card-body">
					<!-- THis is card body -->
				</div>
			</div>

			    	<br>
			    	<label for="name" class="col-2 col-form-label">Name:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="name" id="name"><?php echo $name; ?></textarea>
			    	<br>
			    	<label for="email" class="col-2 col-form-label">Email:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="email" id="name"><?php echo $email; ?></textarea>
			    	<br>
			    	<label for="phone number" class="col-2 col-form-label">Phone number:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="phone number" id="name"><?php echo $phone_number; ?></textarea>
			    	<br>
			    	<label for="message" class="col-2 col-form-label">Message:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="message" id="name"><?php echo $message; ?></textarea>
			    
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
				$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
				$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
				$phone_number = mysql_real_escape_string(htmlspecialchars($_POST['phone_number']));
				$message = mysql_real_escape_string(htmlspecialchars($_POST['message']));
				
				
				// check to make sure both fields are entered

				if ($name == '' || $email == '' || $phone_number == '' || $message == '')

					{
						$error = 'ERROR: Please fill in all required fields!';
				
						renderForm($name, $email, $phone_number, $message, $error);
					}
				else{

					if(isset($_GET['id'])){
						$id11 = $_GET['id'];
						mysql_query("UPDATE contact SET name='$name', email='$email', phone_number='$phone_number', message='$message' WHERE id='$id11'")
						or die(mysql_error());	


					}else{
						mysql_query("INSERT contact SET name='$name', email='$email', phone_number='$phone_number', message='$message'")
						or die(mysql_error());	

					}
						
					echo "Contact details entered successfully";
					
				}

		    }
		    elseif(isset($_GET['id'])){
				$id = $_GET['id'];
		
				$result = mysql_query("SELECT * FROM contact WHERE id=".$id);
				$row = mysql_fetch_array($result);
				$name = $row['name'];
				$email = $row['email'];
				$phone_number = $row['phone_number'];
				$message = $row['message'];
				

				renderForm($name, $email, $phone_number, $message);
				
			}
			else
				{
					renderForm('','','','');
				}
		?>