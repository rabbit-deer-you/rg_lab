<?php
	session_start();

	include_once( 'config.php' );
	include_once( 'saetv2.ex.class.php' );
	include_once( 'weibo_api.php' );
	$con=mysql_connect("w.rdc.sae.sina.com.cn:3307/app_aazhi","31kowyzwmj","lhzi4xy5zyzzjx142552wx4jwkk1jzjyzyzx434k");	
	mysql_select_db("app_aazhi", $con);

	$sql=mysql_query("select act_id from activities where act_name='".$_GET['name']."';");
	$act_id=mysql_fetch_array($sql);

	$sql=mysql_query("select flag from activities where act_name='".$_GET['name']."';");
	$flag=mysql_fetch_array($sql);

	$result=mysql_query("select * from data where act_id=".$act_id[0].";");
	$result2=mysql_query("select * from result where act_id=".$act_id[0].";");
	
	$sql=mysql_query("select price from result where act_id=".$act_id[0].";");
	$price=mysql_fetch_array($sql);

	$sql=mysql_query("select people from activities where act_id=".$act_id[0].";");
	$people=mysql_fetch_array($sql);

	$sql=mysql_query("select total from data where act_id=".$act_id[0].";");
	$total=mysql_fetch_array($sql);

	$sql=mysql_query("select type from activities where act_name='".$_GET['name']."';");
	$type=mysql_fetch_array($sql);

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
		<div style="margin:10px;">
		<h2>活动名称：<strong><?php echo $_GET['name']?></strong></h2>
		<div style="display:block; margin-bottom:10px; float:right;">
			<a href=<?php echo "\"delete.php?act_id=".$act_id[0]."\""?> style="float:right; margin-right:10px;"><button class="btn btn-danger">删除</button></a>
		</div>
		<div id="table_small">
		<table  class="table" style="width:500px; margin:20px">
		<thead>
			<tr>
				<th>姓名</th>
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
 	 					echo "<th>".$row['name']."</th>";
 	 					echo "<th>".$row['chifan']."</th>";
 	 					echo "<th>".$row['zhusu']."</th>";
 	 					echo "<th>".$row['jiaotong']."</th>";
 	 					echo "<th>".$row['menpiao']."</th>";
 	 					echo "<th>".$row['qita']."</th>";
 	 					echo "</tr>";
  					}
				?>
		</tbody>
	</table>
		</div>
		<?php 
	if ($_GET['flag'] == '1'){ 
		echo "
	<p style='margin:20px;''>实际花费的总数为：</p>
	<form action=\"activities_new.php\">
	&nbsp &nbsp &nbsp<input type=\"text\" name=\"total\" style=\"width:50px;\" onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value=\"0\">
	&nbsp &nbsp &nbsp<input type=\"hidden\" style=\"margin:20px\" name=\"name\" value=\"".$_GET['name']."\"></br></br></br>
	<a href=\"index.php\" style=\"float:right; margin-right:300px;\"><div class=\"btn btn-primary\">返回</div></a>
	<input type=\"submit\" valtttttue=\"提交\" class=\"btn btn-default\"  style=\"margin-right:50px; float:right\">
	</form>
		";
	}else if($_GET['flag'] == '0' && $type[0] =='done'){
			echo "
			<div id=\"table_small\">
			<table  class=\"table\"  style=\"width:500px; margin:20px\">
				<thead>
					<tr>
						<th>姓名</th>
						<th>结果</th>
					</tr>
				</thead>
				<tbody>";
					while($row = mysql_fetch_array($result2))
 	 				{

 	 					echo "<tr>";
 	 					echo "<td>".$row['name']."</td>";
 	 					echo "<td>".$row['price']."</td>";
 	 					echo "</tr>";
  					}
  					echo "
				</tbody>
			</table></div>";	
				echo "<a href=\"index.php\" style=\"float:right; margin-right:300px;\"><button class=\"btn btn-primary\">返回</button></a>
	<div class='btn btn-primary' style=\"margin-right:50px; float:right;\" onclick=\"disp_alert()\">支付</div></br>";

	}else if($_GET['flag'] == '0'&& $type[0] =='do'){
		if($total[0]-$price[0]>0){
			echo "<p style='margin:20px;'>实际花费了<strong style='color:red;'>".$total[0]."</strong>元，每个人应多付<strong style='color:red;'>".number_format((($total[0]-$price[0])/$people[0]), 2, '.', ' ')."</strong>元</p>";
		}
		else{
			echo "<p style='margin:20px;'>实际花费了<strong style='color:red;'>".$total[0]."</strong>元，每个人找还<strong style='color:red;'>".number_format((($price[0]-$total[0])/$people[0]), 2, '.', ' ')."</strong>元</p>";
		}
		echo "<a href=\"index.php\" style=\"float:right; margin-right:100px;\"><div class=\"btn btn-primary\">返回</div></a>";
	}
	else{}
	?>
	</div>
</body>
</html>
<script type="text/javascript">
function disp_alert()
{
alert("支付成功");
}
</script>