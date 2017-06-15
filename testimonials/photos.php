<?php
  include("../connect_rpl_db.php");

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  // $link = mysql_connect("localhost", "root", "");
  // mysql_select_db("dvddb");
  $sql = "SELECT image FROM testimonials WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
 

  header("Content-type: image/gif");
  echo $row['image'];
?>