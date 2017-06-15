<?php
	include("../connect_rpl_db.php");
	if (isset($_GET['id']) && is_numeric($_GET['id'])){

		$id = $_GET['id'];
		$result = mysql_query("DELETE FROM contact WHERE id=".$id)
		or die(mysql_error());
		
		header("Location: /rpl_finder/contact/contact_list.php");
	}
	else
		{
			echo "id not present";
		}
		echo "  ohh good !!";
?>