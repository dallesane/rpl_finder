<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($localhost, $root);
if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
 //echo 'Connected successfully Mr. Bond';
	

$db_selected= mysql_select_db ('rpl_finder', $conn);

if (!$db_selected){
	echo mysql_error();
}

?>