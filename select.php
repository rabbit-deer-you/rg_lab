<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$num=mysql_query("select num from user where user_id=11;");
	$a=mysql_fetch_array($num);
	mysql_query("insert into activities(num,act_name) value ('".$a[0]."','".$_GET['name']."');");
	mysql_close($con);
	if($_GET['select']=='do'){
		header("location:do.php?name=".$_GET['name']);

	}
	elseif($_GET['select']=='done'){
		header("location:people.php?name=".$_GET['name']."&flag=0");

	}
	else{
		header("error.php");
	}
?>
