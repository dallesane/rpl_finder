<?php
	//include("../login_script/login_success.php");
	function renderForm($category_name, $error){
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

<?php
// if there are any errors, display them
	if ($error != '')
		{
			echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
		}
?>

	<br>
	<form action="" method="post">
	<div>
		<div class="container">
		<div class="row">
		<div class="card">
			<div class="card-header">
				<h2>Add Category</h2>
			</div>

	    <label for="category_name" class="col-2 col-form-label">Category name:</label>
			<div class="col-10">
			<textarea class="form-control" rows="10" cols="100" type="text" name="category_name" id="category_name"><?php echo $category_name; ?></textarea>	

			<br>
			<br>
	    	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
	    	<br>
	</form>

	</body>
		</div>
		</div>

</html>

<?php

}

	// connect to the database
	include('../connect_rpl_db.php');
	// check if the form has been submitted. If it has, start to process the form and save it to the database
	if (isset($_POST['submit'])){

		// get form data, making sure it is valid
		$category_name = mysql_real_escape_string(htmlspecialchars($_POST['category_name']));
		// check to make sure both fields are entered

	if ($category_name == '')
		{
		// generate error message
			$error = 'ERROR: Please fill in all required fields!';
		// if either field is blank, display the form again
			renderForm($category_name, $error);
		
		}
		else{
			if(isset($_GET['id'])){
				$id01 = $_GET['id'];
				mysql_query("UPDATE category SET category_name='$category_name' WHERE id='$id01'")
				or die(mysql_error());
			
			}else{
				mysql_query("INSERT category SET category_name='$category_name'")
				or die(mysql_error());
			}

			echo "new category name entered successfully";

			// header("Location: new_category_form.php");	
		}
	}
    elseif(isset($_GET['id'])){
		$id = $_GET['id'];

		$result = mysql_query("SELECT * FROM category WHERE id=".$id);
		$row = mysql_fetch_array($result);
		$category_name = $row['category_name'];

		renderForm($category_name, $error);
	}else
		// if the form hasn't been submitted, display the form
		{
		renderForm('');
		}
?>





        