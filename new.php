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
		<h2 class="text-center">创建一个新活动</h2>
		<div style="margin:10px; padding:10px;" class="text-center">
			<form action="select.php">
				<span>请选择活动的类型:</span></br>
				<input type="radio" name="select" value="do">策划中的活动
				<input type="radio" name="select" value="done">已经完成的活动</br></br></br></br>
				<span>请输入活动的名字</span>
				<input type="text" class="form-control" style="width:200px; margin:20px 20px 20px 250px;" name="name">
				<p style="padding:10px;">输入该活动的总人数</p>
				<input type="text" name="people" style="margin-left:10px;"></br>
				<input type="submit" class="btn btn-success btn-lg" value="提交">
			</form>
		</div>
		<a href="index.php" style="float:right;"><button class="btn btn-primary">返回</button></a>
	</div>
</body>
</html>
