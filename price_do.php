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
		<p style="font-size:30px; ">
			每个人预先付的费用为 <strong><span style="color:red;">
					<?php 
echo $price/$_GET['people']; 
mysql_query("insert into result values (".$act_id[0].",'',".($price/$_GET['people']).");");?></strong>
			</span>
			元
		</p>
	</br>
	<p>发送微博通知你的好友</p>
</br>
<form action="">
	<textarea name="weibo" cols="20" rows="5" id="test2" style="overflow:visible"  >
		<?php echo trim($_GET['name'])." 活动，总参加人数为".$_GET['people']."人，每个人预费用为 
".$price/$_GET['people']."元,@"; ?></textarea>
	<input type="submit">
	<?php
if( isset($_REQUEST['weibo']) ) {
	$ret = $c->
	update( $_REQUEST['weibo'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "
	<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>
	";
	header("location:index.php");
	} else {
		echo "
	<p>发送成功</p>
	";
	header("index.php");
	}
}
?>
</form>
<a href="index.php" style="float:right;"><button class="btn btn-primary">返回</button></a>
</div>
</body>
</html>