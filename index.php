<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$sql=mysql_query("select num from user where user_id=11;");
	$user_id=mysql_fetch_array($sql);
	$result=mysql_query("select act_name from activities where num=".$user_id[0].";");
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
						<span>雪地0.0</span>
					</div>
					
						<img style="width:50px height：50px； float:right; margin-bottom:10px;" class="touxiang" src="<?php echo $image_url; ?>">
													
				</div>	
       		 </div>
		<h2>活动列表</h2>
		<?php 
			while($row = mysql_fetch_array($result))
 	 		{
 	 			echo "<a href=\"activity.php?name=".$row['act_name']."\"".">";
 	 			echo "<p>".$row['act_name']."</p></a>";
  			}
  		?>
		<a href="new.php">新建一个活动</a>
	</div>
</body>
</html>