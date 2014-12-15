<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	mysql_query("delete from activities where act_id=".$_GET['act_id'].";");
	mysql_query("delete from data where act_id=".$_GET['act_id'].";");
	mysql_query("delete from result where act_id=".$_GET['act_id'].";"); 
	header("location:index.php");
?>