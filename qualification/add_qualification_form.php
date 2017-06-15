 <?php
    include("../connect_rpl_db.php");
?>
 <?php
    ob_start();
	function renderForm($category_name, $code, $name, $description, $job_rules, $fees, $packaging_rules, $error)

	{

?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html>
		
		<head>
		
			<title>Qualification form</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/3.3.7:bootstrap.min.css">
			<script src="../js/3.2.1:jquery.min.js"></script>
			<script src="../js/3.3.7:bootstrap.min.js"></script>
		<!-- </style> -->
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
					<h2>Add Qualification</h2>
				</div>
				<div class="card-body">
					<!-- THis is card body -->
				</div>
			</div>

			    <strong>category_name: *</strong><b/>
				<select name="category_name">

			    <option selected="selected" value="">Select category</option>
			    <?php 
			   
			        $query = "SELECT * FROM category";
			        $result = mysql_query($query);
				    if ($result) {
				        while($row = mysql_fetch_array($result)) {
				        
					      	if ($category_name == $row['id']){

					      		echo '<option selected="selected" value="'.$row['id'].'">"'.$row['category_name'].'"</option>';
					      		
					      	}else{
					      		echo '<option value="'.$row['id'].'">"'.$row['category_name'].'"</option>';
					      	}
				        }
				    }
				    else {
				      echo mysql_error();
				    }
			    ?>
			    </select>
			    	<br>
			    	<br>
			    	<br>
			    	
			    	<label for="code" class="col-2 col-form-label">Code:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="code"><?php echo $code; ?></textarea>
			    	<br>
			    	<label for="name" class="col-2 col-form-label">Name:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="name"><?php echo $name; ?></textarea>
			    	<br>
			    	<label for="description" class="col-2 col-form-label">Description:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="description"><?php echo $Description; ?></textarea>
			    	<br>
			    	<label for="job rules" class="col-2 col-form-label">Job rules:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="job rules"><?php echo $job_rules; ?></textarea>
			    	<br>
			    	<label for="fees" class="col-2 col-form-label">Fees:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="fees"><?php echo $Fees; ?></textarea>
			    	<br>
			    	<label for="packaging rules" class="col-2 col-form-label">Packaging rules:</label>
					<div class="col-10">
					<textarea class="form-control" rows="10" cols="100" type="text" name="code" id="packaging rules"><?php echo $packaging_rules; ?></textarea>
			    	<br>
					<br>	
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<br>
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
				$category_name = mysql_real_escape_string(htmlspecialchars($_POST['category_name']));
				$code = mysql_real_escape_string(htmlspecialchars($_POST['code']));
				$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
				$description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
				$job_rules = mysql_real_escape_string(htmlspecialchars($_POST['job_rules']));
				$fees = mysql_real_escape_string(htmlspecialchars($_POST['fees']));
				$packaging_rules = mysql_real_escape_string(htmlspecialchars($_POST['packaging_rules']));
				
				
				// check to make sure both fields are entered

				if ($category_name == '' || $code == '' || $name == '' || $description == '' || $job_rules == '' || $fees == '' || $packaging_rules == '')

					{
						$error = 'ERROR: Please fill in all required fields!';
				
						renderForm($category_name, $code, $name, $description, $job_rules, $fees, $packaging_rules, $error);
					}
				else{

					if(isset($_GET['id'])){
						$id11 = $_GET['id'];
						mysql_query("UPDATE qualification SET category_name='$category_name', code='$code', name='$name', description='$description', job_rules='$job_rules', fees='$fees', packaging_rules='$packaging_rules' WHERE id='$id11'")
						or die(mysql_error());	


					}else{
						mysql_query("INSERT qualification SET category_name='$category_name', code='$code', name='$name', description='$description', job_rules='$job_rules', fees='$fees', packaging_rules='$packaging_rules'")
						or die(mysql_error());	

					}
						
					echo "distributor details entered successfully";
					// header('Location: /safeway/distributor_details_web/sim_details_list.php');
				}

		    }
		    elseif(isset($_GET['id'])){
				$id = $_GET['id'];
		
				$result = mysql_query("SELECT * FROM qualification WHERE id=".$id);
				$row = mysql_fetch_array($result);
				$category_name = $row['category_name'];
				$code = $row['code'];
				$name = $row['name'];
				$description = $row['description'];
				$job_rules = $row['job_rules'];
				$fees = $row['fees'];
				$packaging_rules = $row['packaging_rules'];
				

				renderForm($category_name, $code, $name, $description, $job_rules, $fees, $packaging_rules);
				
			}
			else
				{
					renderForm('','','','','','','');
				}
		?>