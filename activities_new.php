<?php
	session_start();
	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	include_once( 'weibo_api.php' );
	$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");	
	mysql_select_db("app_aazhi", $con);

	$sql=mysql_query("select act_id from activities where act_name='".$_GET['name']."';");
	$act_id=mysql_fetch_array($sql);

	$sql=mysql_query("select people from activities where act_id=".$act_id[0].";");
	$people=mysql_fetch_array($sql);

	$sql=mysql_query("select flag from activities where act_name='".$_GET['name']."';");
	$flag=mysql_fetch_array($sql);
	$result=mysql_query("select * from data where act_id=".$act_id[0].";");
	mysql_query("update activities set flag='0' where act_name='".$_GET['name']."';");
	mysql_query("update data set total=".$_GET['total']."where act_id=".$act_id[0].";");
	$total=0;
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
		<h2>活动名称：<strong><?php echo $_GET['name']?></strong></h2>
		<p>预计情况：</p>
		<div id="table_me">
		<table  class="table" style="width:500px; margin:20px">
		<thead>
			<tr>
				<th>吃饭</th>
				<th>住宿</th>
				<th>交通</th>
				<th>门票</th>
				<th>其他</th>
			</tr>
		</thead>
		<tbody>
			<?php 
					while($row = mysql_fetch_array($result))
 	 				{

 	 					echo "<tr>";
 	 					echo "<th>".$row['chifan']."</th>";
 	 					echo "<th>".$row['zhusu']."</th>";
 	 					echo "<th>".$row['jiaotong']."</th>";
 	 					echo "<th>".$row['menpiao']."</th>";
 	 					echo "<th>".$row['qita']."</th>";
 	 					echo "</tr>";
 	 					$total=$total +$row['chifan']+$row['zhusu']+$row['jiaotong']+$row['menpiao']+$row['qita'];
  					}
				?>
		</tbody>
	</table>
	</div>
	<p>实际花费的总数为：<?php echo $_GET['total'];?></p>
	<?php 
	if(($total-$_GET['total'])<0){
		echo "<p>每个人应多付".(($_GET['total']-$total)/$people[0])."元</p>";
		}
		else{
			echo "<p>每个人找还".(($total-$_GET['total'])/$people[0])."元</p>";
		}
		 ?>
		<a href="index.php" style="float:right;"><button class="btn btn-primary">返回</button></a>
	</div>
</body>
</html>
