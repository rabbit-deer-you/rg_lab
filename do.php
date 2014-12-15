<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="static/bootstrap.min.css" rel="stylesheet">
   <link href="static/text.css" rel="stylesheet">
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
		<h3>预算</h3>
	<form action="price_do.php">
	<table  class="table" style="width:500px; margin:20px 20px 20px 100px">
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
			<tr>
				<td><input type="text" name="chifan" style="width:50px;" onFocus="if (this.value==this.defaultValue) this.value='';" onBlur="if (this.value=='') this.value=this.defaultValue;" value="0"></td>
				<td><input type="text" name="zhusu" style="width:50px;" onFocus="if (this.value==this.defaultValue) this.value='';" onBlur="if (this.value=='') this.value=this.defaultValue;" value="0"></td>
				<td><input type="text" name="jiaotong" style="width:50px;" onFocus="if (this.value==this.defaultValue) this.value='';" onBlur="if (this.value=='') this.value=this.defaultValue;" value="0"></td>
				<td><input type="text" name="menpiao" style="width:50px;" onFocus="if (this.value==this.defaultValue) this.value='';" onBlur="if (this.value=='') this.value=this.defaultValue;" value="0"></td>
				<td><input type="text" name="qita" style="width:50px;" onFocus="if (this.value==this.defaultValue) this.value='';" onBlur="if (this.value=='') this.value=this.defaultValue;" value="0"></td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" style="margin:20px" name="name" value="<?php echo $_GET['name']; ?>">
	<input type="hidden" style="margin:20px" name="people" value="<?php echo $_GET['people']; ?>"></br></br></br>
		<a href="index.php" style="float:right; margin-right:300px;"><div class="btn btn-primary">返回</div></a>
	<input type="submit" value="提交" class="btn btn-success"  style="margin-right:50px; float:right;"></br>
	</form>
	</div>
</body>
</html>
