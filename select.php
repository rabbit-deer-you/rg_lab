<?php
	session_start();
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	$c = new SaeTClientV2( WB_AKEY , WB_SKEY ,$_SESSION['oauth2']['oauth_token'] ,'' );
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");
	mysql_select_db("app_aazhi", $con);
	$num=mysql_query("select num from user where user_id=".$uid.";");
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
		header("location:done.php?name=".$_GET['name']."&people=".$_GET['people']);
		exit();
	}
	else{
		header("error.php");
		mysql_close($con);
		exit();
	}
?>
