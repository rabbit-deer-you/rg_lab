<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$sql=mysql_query("select num from user where user_id=11;");
	$user_id=mysql_fetch_array($sql);
	$result=mysql_query("select * from activities where num=".$user_id[0].";");
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
        	<div style="float:left; margin-left:10px;">
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
		<div class="index">
		<?php 
			while($row = mysql_fetch_array($result))
 	 		{
 	 			echo "<div style='margin:10px;'><a href=\"activity.php?name=".$row['act_name']."&flag=".$row['flag']."\"".">";
 	 			echo $row['act_name']."</a> &nbsp &nbsp &nbsp";
 	 			if($row['flag'] == '0')
 	 			{
 	 				echo "<div  style='float:right; margin-right:200px;' id='butt' class='btn btn-success'>已完成</div></div></br>";
 	 			}
 	 			else{
 	 				echo "<div id='butt' style='float:right; margin-right:200px;' class='btn btn-primary'>未完成</div></div></br>";
 	 			}
  			}
  		?>
  		</div>
  	</br>
	<a href="new.php" style='margin:10px; color:red;'>+新建一个活动</a>
	</div>
</body>
</html>