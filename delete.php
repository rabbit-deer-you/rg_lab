<?php
$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");	
	mysql_select_db("app_aazhi", $con);

	mysql_query("delete from activities where act_id=".$_GET['act_id'].";");
	mysql_query("delete from data where act_id=".$_GET['act_id'].";");
	mysql_query("delete from result where act_id=".$_GET['act_id'].";"); 
	header("location:index.php");
?>