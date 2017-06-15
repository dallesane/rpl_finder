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
            <div class="container">   
                <table class="table stripped">  
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email address</th>
                        <th>Phone number</th>
                        <th>Message</th>
                        <th>delete</th>
                        <th>edit</th>
                    </tr>
	    	
	    	<?php
	    	    $query = "SELECT * FROM contact";

		        $result = mysql_query($query);
		        $counter = 1;
		  
			    if ($result) {

			        while($row = mysql_fetch_array($result)) {

	    	            echo '<tr>';
	    	            echo "<td>".$counter."</td>";
	    	            echo '<td>'. $row['name'].'</td>';
	    	            echo '<td>'. $row['email'].'</td>';
	    	            echo '<td>'. $row['phone_number'].'</td>';
	    	            echo '<td>'. $row['message'].'</td>';
	    	
	    	            echo '<td>'. '<a href="contact_list_delete.php/?id='.$row[0].'" onclick="return checkDelete()"><button>delete</button></a>' .'</td>';
	    	            echo '<td>'. '<a href="/rpl_finder/contact/contact_details_form.php/?id='.$row[0].'"><button>edit</button></a>' .'</td>';
	    	            echo '</tr>';
	    	            $counter += 1;
	    	        }
	    	    }   
	    	?>
	    		</table>
	    	</div>	
	</body>
</html>  
			