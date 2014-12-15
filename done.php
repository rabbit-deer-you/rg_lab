<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="static/bootstrap.min.css" rel="stylesheet">
    <link href="static/text.css" rel="stylesheet">
    <script src="static/jquery-1.11.1.js"></script>
    <script type="text/javascript">
		$ (document).ready(function(){
		$(".more1").hide();
		$(".more2").hide();

		$("#averge").click(function(){
		$(".more1").hide();	
		$(".more2").hide();
		$("#flag").attr("value","1");
		$("#per").attr("class","btn btn-default");
		$("#averge").attr("class","btn btn-danger");					
		});

		$("#per").click(function(){
		$(".more1").show();	
		$(".more2").show();	
		$("#flag").attr("value","2");
		$("#per").attr("class","btn btn-danger");
		$("#averge").attr("class","btn btn-default");		
		});
	}
	);
	</script>
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
	<h2>活动名称：<strong><?php echo $_GET['name']?></strong></h1>
	<form action="price_done.php">
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
				<th class="more1">所占百分比(%)</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for($i=1;$i<=$_GET['people'];$i++){
				echo  "<tr>
				<td><input type='text' name='name_$i' style='width:100px;'></td>
				<td><input type='text' name='chifan_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				<td><input type='text' name='zhusu_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				<td><input type='text' name='jiaotong_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				<td><input type='text' name='menpiao_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				<td><input type='text' name='qita_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				<td class=\"more2\"><input type='text' name='baifenbi_$i' style='width:50px;' onFocus=\"if (this.value==this.defaultValue) this.value='';\" onBlur=\"if (this.value=='') this.value=this.defaultValue;\" value='0'></td>
				</tr>";
			}
			?>
		</tbody>
	</table>
</div>
	<input type="hidden" name="people" value="<?php echo $_GET['people']; ?>">
	<input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
	<input type="hidden" id="flag" name="flag" value="1">
	<div style="margin:20px;">
		<div class="btn btn-danger" id="averge">平均分摊</div>
		<div class="btn btn-default" id="per">百分比分摊</div>
	</div>
	</br></br>
	<a href="index.php" style="float:right; margin-right:300px;"><div class="btn btn-primary">返回</div></a>
	<input type="submit" value="提交" class="btn btn-success"  style="margin-right:50px; float:right;"></br>
	</form>
	</div>
</body>
</html>

