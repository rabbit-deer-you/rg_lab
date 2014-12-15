<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$name=trim($_GET['name']);
	$sql=mysql_query("select act_id from activities where act_name='".$name."';");
	$act_id=mysql_fetch_array($sql);
	$price=$_GET['chifan']+$_GET['jiaotong']+$_GET['zhusu']+ $_GET['menpiao']+$_GET['qita'];
	mysql_query("insert into data values (".$act_id[0].",'',".$_GET['chifan'].",".$_GET['zhusu'].",".$_GET['jiaotong'].",".$_GET['menpiao'].",".$_GET['qita'].",0".");");	
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="static/bootstrap.min.css" rel="stylesheet">
	<link href="static/text.css" rel="stylesheet">
	<script src="http://tjs.sjs.sinajs.cn/t35/apps/opent/js/frames/client.js" language="JavaScript"></script>
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
       		 <h2><?php echo $_GET['name']; ?> 活动的结果：</h2>
		<p style="font-size:30px; text-align:center;">
			        每个人预先付的费用为 <strong><span style="color:red;">
					<?php 
echo number_format(($price/$_GET['people']), 2, '.', ''); 
mysql_query("insert into result values (".$act_id[0].",'',".$price.");");?></strong>
			</span>
			元
		</p>
	</br>
	<p style="margin:20px;">发送微博通知你的好友:</p>
</br>
<form action="send.php">
	<textarea name="weibo" cols="20" rows="5" id="test2" style="overflow:visible text-algin:center; margin-left:270px;"  ><?php echo trim($_GET['name'])." 活动，总参加人数为".$_GET['people']."人，每个人预费用为 
".number_format(($price/$_GET['people']), 2, '.', '')."元,@"; ?></textarea>
	<div>
		</br></br></br>
		<a href="index.php" style="float:right; margin-right:300px;"><div class="btn btn-primary">返回</div></a>
		<input type="submit" value="提交" class="btn btn-success"  style="margin-right:50px; float:right;"></br>
	</div>
</form>
</div>
</body>
</html>