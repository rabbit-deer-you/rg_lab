<?php
	session_start();
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	//从POST过来的signed_request中提取oauth2信息
	if(!empty($_REQUEST["signed_request"])){
		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY  );
		$data=$o->parseSignedRequest($_REQUEST["signed_request"]);
		if($data=='-2'){
			die('签名错误!');
		}else{
		$_SESSION['oauth2']=$data;
		}
	}
	//判断用户是否授权
	if (empty($_SESSION['oauth2']["user_id"])) {
		include "auth.php";
		exit;
	} else {
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY ,$_SESSION['oauth2']['oauth_token'] ,'' );
	} 
	$uid_get = $c->get_uid();
	$uid = $uid_get['uid'];
	$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
	$image_url=$user_message['profile_image_url'];
	$user_name=$user_message['name'];
	
	$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");
	mysql_select_db("app_aazhi", $con);
	$sql=mysql_query("select num from user where user_id=".$uid.";");
	$user_id=mysql_fetch_array($sql);
	if(empty($user_id[0]))
	{
		mysql_query("insert into user(user_id) value (".$uid.");");
	}
	else{
		$result=mysql_query("select * from activities where num=".$user_id[0].";");
	}
	mysql_close($con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="static/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="static/text.css" rel="stylesheet"></head>
<body>
<title>授权后的页面</title>
</head>

<body>
	<div class="container_me">
  			<div class="navbar_me">
                <div style="float:left;">
					<h1>AA制管理系统</h1>
				</div>
                <div style="float:right;" >
					<div style="float:left; margin-top:20px; height：50px">
						<span><?php echo $user_name; ?></span>
					</div>
					
						<img style="width:50px height：50px； float:right; margin-bottom:10px;" class="touxiang" src="<?php echo $image_url; ?>">
													
				</div>	
       		 </div>
		<h2>活动列表</h2>
		<?php 
			if(!empty($user_id[0]))
			{
			while($row = mysql_fetch_array($result))
 	 		{
 	 			echo "<div><a href=\"activity.php?name=".$row['act_name']."&flag=".$row['flag']."\"".">";
 	 			echo $row['act_name']."</a> &nbsp &nbsp &nbsp";
 	 			if($row['flag'] == '0')
 	 			{
 	 				echo "<div  style='float:right; margin:10px 400px 10px 10px;' id='butt' class='btn btn-success'>已完成</div></div></br>";
 	 			}
 	 			else{
 	 				echo "<div id='butt' style='float:right; margin:10px 400px 10px 10px;' class='btn btn-primary'>未完成</div></div></br>";
 	 			}
  			}
  		}
  		?>
		<a href="new.php">新建一个活动</a>
	</div>
</body>
</html>