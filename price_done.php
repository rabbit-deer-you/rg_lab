<?php
	session_start();

	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	include_once( 'weibo_api.php' );
	$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");
	mysql_select_db("app_aazhi", $con);
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
		mysql_query("insert into data values (".$act_id[0].",'".$_GET[$f]."',".$_GET[$a].",".$_GET[$b].",".$_GET[$c].",".$_GET[$d].",".$_GET[$e].",".$_GET['people'].");");	
	}
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
						<span><?php echo $user_name; ?></span>
					</div>
					
						<img style="width:50px height：50px； float:right; margin-bottom:10px;" class="touxiang" src="<?php echo $image_url; ?>">
													
				</div>	
       		 </div>
	<h2><?php echo $_GET['name']; ?> 活动的结果：</h2>
	<div id="table_me">
	<?php
		if ($_GET['flag']==1) 
		{
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
			$averge=number_format(($total/$_GET['people']), 2, '.', '').";";
			echo "<table class='table' >
			<thead>
				<tr>
				<th>姓名</th>
				<th>计算结果</th>
				</tr>
			</thead>
			 <tbody>
				";
			for($i=0;$i<$_GET['people'];$i++)
			{
				echo "<tr>";
				$a='name_'.($i+1);
				echo "<td>".$_GET[$a]."</td>";
				echo "<td>";
				echo ($person_price[$i]-$averge);
				echo "</td></tr>";
				mysql_query("insert into result values (".$act_id[0].",'".$_GET[$a]."',".($person_price[$i]-$averge).");");
			}
		}else if($_GET['flag']=='2'){
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
			echo "<table class='table' >
			<thead>
				<tr>
				<th>姓名</th>
				<th>计算结果</th>
				</tr>
			</thead>
			 <tbody>
				";
			for($i=0;$i<$_GET['people'];$i++)
			{
				echo "<tr>";
				$a='name_'.($i+1);
				$b='baifenbi_'.($i+1);
				echo "<td>".$_GET[$a]."</td>";
				echo "<td>";
				echo number_format(($person_price[$i]-$total*($_GET[$b]/100)), 2, '.', '');
				echo "</td></tr>";
				mysql_query("insert into result values (".$act_id[0].",'".$_GET[$a]."',".number_format(($person_price[$i]-$total*($_GET[$b]/100)), 2, '.', '').");");
			}
		}
	echo "
		</tbody>
	</table>";
	?>
</div>
<p style="margin:10px 0px 0px 20px;">发送微博通知你的好友:</p>
	<form action="send.php">
	<textarea name="weibo" cols="20" rows="5" id="test2" style="margin-left:20px; margin-top:10px;"  ><?php 
		if($_GET['flag']==1)
		{
			echo $name." 活动，总参加人数为".$_GET['people']."人,结果如下 ";
			for($i=0;$i<$_GET['people'];$i++)
			{
				$a='name_'.($i+1);
				echo $_GET[$a];
				echo ":  ".($person_price[$i]-$averge).";";
			}
			echo "(正数为多付的钱，负数为少付的钱.)";
			for($i=0;$i<$_GET['people'];$i++){
				$a='name_'.($i+1);
				echo "@".$_GET[$a]." ";
			}	
		}else if($_GET['flag']==2){
			echo $name." 活动，总参加人数为".$_GET['people']."人,结果如下 ";
			for($i=0;$i<$_GET['people'];$i++)
			{
				$a='name_'.($i+1);
				$b='baifenbi_'.($i+1);
				echo $_GET[$a];
				echo ":  ".number_format(($person_price[$i]-$total*($_GET[$b]/100)), 2, '.', '').";";
			}
			echo "(正数为多付的钱，负数为少付的钱.)";
			for($i=0;$i<$_GET['people'];$i++){
				$a='name_'.($i+1);
				echo "@".$_GET[$a]." ";
			}	
		}
		 ?></textarea>
		<a href="index.php" style="float:right; margin-right:200px;"><div class="btn btn-primary" style="margin-top:100px;">返回</div></a>
		<input type="submit" value="提交" class="btn btn-success"  style="margin-right:50px; float:right;  margin-top:100px;"></br>
</form>
	</div>
</body>
</html>