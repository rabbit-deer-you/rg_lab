<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$num=mysql_query("select num from user where user_id=11;");
	$a=mysql_fetch_array($num);
	if($_GET['select']=='do'){
		mysql_query("insert into activities(num,act_name,flag,people,type) value ('".$a[0]."','".$_GET['name']."','1',".$_GET['people'].",'do');");
		mysql_close($con);
		header("location:do.php?name=".$_GET['name']."&people=".$_GET['people']);		
		exit();
	}
	elseif($_GET['select']=='done'){
		mysql_query("insert into activities(num,act_name,flag,people,type) value ('".$a[0]."','".$_GET['name']."','0',".$_GET['people'].",'done');");
		mysql_close($con);
		mysql_close($con);
		header("location:done.php?name=".$_GET['name']."&people=".$_GET['people']);
		exit();
	}
	else{
		header("error.php");
		mysql_close($con);
		exit();
	}
?>
