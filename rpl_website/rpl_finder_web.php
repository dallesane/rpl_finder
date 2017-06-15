<?php
	//include("../login_script/login_success.php");
    include("../connect_rpl_db.php");
 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
	    <meta charset="utf-8">
	    <head>
			<title>RPL list</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/3.3.7:bootstrap.min.css">
			<script src="../js/3.2.1:jquery.min.js"></script>
			<script src="../js/3.3.7:bootstrap.min.js"></script>
	
		</head>
	    <title>RPL finder</title>
	</head>
  	<body>
		<style>
				/*background-image: url('https://wallpaperbrowse.com/media/images/cool-background.jpg');*/

			body  {
			    background-image: url('../images/flower.jpg');
			    background-color: #4863A0;
			}

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
           
		</style>
		</div>
		
		<div class="container">
		
		<header>
		   <h1><center>RPL finder</h1>
		</header>
		<br>
		<nav>
		<ul class="list-group">

		    <li class="list-group-item list-group-item-success"><a href="../category/new_category_form.php">Add new category</a></li>
		    <br>
		    <li class="list-group-item list-group-item-info"><a href="../category/category_list.php">See all category list</a></li>
		    <br>
		    <li class="list-group-item list-group-item-warning"><a href="../qualification/add_qualification_form.php">Add new qualification</a></li>
		    <br>
		    <li class="list-group-item list-group-item-danger"><a href="../qualification/qualification_list.php">See all qualification list</a></li>
		    <br>
		    <li class="list-group-item list-group-item-success"><a href="../contact/contact_details_form.php">Add new contact</a></li>
		    <br>
		    <li class="list-group-item list-group-item-info"><a href="../contact/contact_list.php">See all contact</a></li>
		    <br>
		    <li class="list-group-item list-group-item-warning"><a href="../testimonials/new_testimonials_form.php">Add new testimonials</a></li>
		    <br>
		    <li class="list-group-item list-group-item-danger"><a href="../testimonials/testimonials_list.php">See all testimonials</a></li>
		    <br>
		  </ul>
		</nav>
		</div>
		</div>
		
  	</body>
</html>
