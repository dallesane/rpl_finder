<?php
    include("../connect_rpl_db.php");
?>
<html>
	<head>
		<script language="JavaScript" type="text/javascript">
		function checkDelete(){
		    return confirm('Are you sure want to delete ?');
		}
		</script>
	</head>
	<body>
	    <style>
	    	body{
                background-image: url('../images/design_wallpapers1.jpg');
                background-color: #B6B6B4;
            }
            table{
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            td, th{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>    
            <div class="container">   
                <table class="table stripped">  
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>designation</th>
                        <th>Message</th>
                        <th>delete</th>
                        <th>edit</th>
                    </tr>
	    	
	    	<?php
	    	    $query = "SELECT * FROM testimonials";

		        $result = mysql_query($query);
		        $counter = 1;
		        // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		  
			    if ($result) {

			        while($row = mysql_fetch_array($result)) {

			        	header('Content-type: image/jpeg');
			        	
	    	            echo '<tr>';

	    	            echo "<td>".$counter."</td>";
	    	            // echo '<td>'.'<img src="'.$pic.'" alt="HTML5 Icon" style="width:128px;height:128px">'.'</td>';
	    	            echo '<td>';?> <img src="<?php echo $row['image'];?>" height="100" width="100"> <?php.'</td>';
	    	            echo '<td>'. $row['name'].'</td>';
	    	            echo '<td>'. $row['designation'].'</td>';
	    	            echo '<td>'. $row['message'].'</td>';
	    			
	    	            echo '<td>'. '<a href="testimonials_list_delete.php/?id='.$row[0].'" onclick="return checkDelete()"><button>delete</button></a>' .'</td>';
	    	            echo '<td>'. '<a href="new_testimonials_form.php/?id='.$row[0].'"><button>edit</button></a>' .'</td>';
	    	            echo '</tr>';
	    	            $counter += 1;
	    	        }
	    	    }   
	    	?>
	    		</table>
	    	</div>	
	</body>
</html>  
			