<?php
session_start();

include_once( '../config.php' );
include_once( '../saetv2.ex.class.php' );
include_once( 'weibo_api.php' );
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../static/bootstrap.min.css" rel="stylesheet">
   <link href="../static/text.css" rel="stylesheet">
</head>
<body>
 	<div class="container_me">
 	<div class="top_me">
			<div class="top_left">
				<h1>AA制管理系统</h1>
			</div>
			<div class="top_right">
				<span><?php echo $user_name; ?></span>
				<img class="touxiang" src="<?php echo $image_url; ?>">
			</div>
		</div>
	<h2>活动名称：<strong><?php echo $_GET['name']?></strong></h1>
	<form action="jisuan.php">
	<div id='table_me'>
	<table class="table" >
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
				for($i=1;$i<=$_GET['people'];$i++){
				echo  "<tr>
				<td><input type='text' name='name_$i' style='width:100px;'></td>
				<td><input type='text' name='chifan_$i' style='width:50px;' onFocus='if (this.value==this.defaultValue) this.value=\'\';' onBlur='if (this.value=='') this.value=this.defaultValue;' value='0'></td>
				<td><input type='text' name='zhusu_$i' style='width:50px;' onFocus='if (this.value==this.defaultValue) this.value='';'' onBlur='if (this.value=='') this.value=this.defaultValue;'' value='0'></td>
				<td><input type='text' name='jiaotong_$i' style='width:50px;' onFocus='if (this.value==this.defaultValue) this.value='';'' onBlur='if (this.value=='') this.value=this.defaultValue;'' value='0'></td>
				<td><input type='text' name='menpiao_$i' style='width:50px;' onFocus='if (this.value==this.defaultValue) this.value='';'' onBlur='if (this.value=='') this.value=this.defaultValue;'' value='0'></td>
				<td><input type='text' name='qita_$i' style='width:50px;' onFocus='if (this.value==this.defaultValue) this.value='';'' onBlur='if (this.value=='') this.value=this.defaultValue;'' value='0'></td>
				</tr>";}
			?>
		</tbody>
	</table>
</div>
	<input type="hidden" name="people" value="<?php echo $_GET['people']; ?>">
	<input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
	<input type="submit" value="提交" class="btn btn-default"  style="margin-left:10px;"></br>
	</form>
	</div>
</body>
</html>
