<?php
	$con=mysql_connect("localhost","root","meng");
	mysql_select_db("aazhi", $con);
	$name=trim($_GET['name']);
	$sql=mysql_query("select act_id from activities where act_name='".$name."';");
	$act_id=mysql_fetch_array($sql);
	for($i=1;$i<=$_GET['people'];$i++)
	{
		$a='chifan_'.$i;
		$b='zhusu_'.$i;
		$c='jiaotong_'.$i;
		$d='menpiao_'.$i;
		$e='qita_'.$i;
		$f='name_'.$i;
		mysql_query("insert into data values (".$act_id[0].",'".$_GET[$f]."',".$_GET[$a].",".$_GET[$b].",".$_GET[$c].",".$_GET[$d].",".$_GET[$e].");");	
	}
	mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>jisuan</title>
	<link rel="stylesheet" href="static/bootstrap.min.css">
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
	<div id="table_me">
	<?php 
		$total=0;
		$person_price=array();
		for($i=1;$i<=$_GET['people'];$i++)
		{
			$person_total=0;
			$a='chifan_'.$i;
			$b='zhusu_'.$i;
			$c='jiaotong_'.$i;
			$d='menpiao_'.$i;
			$e='qita_'.$i;
			$person_total=$_GET[$a]+$_GET[$b]+$_GET[$c]+$_GET[$d]+$_GET[$e];
			array_push($person_price, $person_total);
			$total=$total+$person_total;
		}
		$averge=$total/$_GET['people'];
		echo "<table class='table' >
		<thead>
			<tr>
			<th>姓名</th>
			<th>计算结果</th>
			</tr>
		</thead>
		 <tbody>
			";
		for($i=0;$i<$_GET['people'];$i++){
			echo "<tr>";
			$a='name_'.($i+1);
			echo "<td>".$_GET[$a]."</td>";
			echo "<td>";
			echo ($person_price[$i]-$averge);
			echo "</td></tr>";
		}
	echo "
		</tbody>
	</table>";
	?>
</div>
	<form action="index.php">
	<textarea name="weibo" cols="20" rows="5" id="test2" style="overflow:visible"  >
		<?php 
		echo $name." 活动，总参加人数为".$_GET['people']."人,结果如下 ";
			for($i=0;$i<$_GET['people'];$i++){
				$a='name_'.($i+1);
				echo $_GET[$a];
				echo "  ".($person_price[$i]-$averge).";";
			}
			echo "(正数为多付的钱，负数为少付的钱.)";
			for($i=0;$i<$_GET['people'];$i++){
				$a='name_'.($i+1);
				echo "@".$_GET[$a]." ";
			}	
		 ?></textarea>
	<input type="submit">
	<?php
if( isset($_REQUEST['weibo']) ) {
	$ret = $c->
	update( $_REQUEST['weibo'] );	//发送微博

	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "
	<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>
	";
	} else {
		echo "
	<p>发送成功</p>
	";
	}
}
?>
</form>
<a href="index.php" style="float:right;"><button class="btn btn-primary">返回</button></a>
	</div>
</body>
</html>