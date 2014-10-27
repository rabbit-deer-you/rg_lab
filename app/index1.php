<?php
session_start();

include_once( '../config.php' );
include_once( '../saetv2.ex.class.php' );
include_once( 'weibo_api.php' );
?>
<!DOCTYPE html>
<html>
<head>
	<title>AA制分担</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../static/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../static/text.css" rel="stylesheet"></head>
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
		<p class="text-left">创建一个新活动</p>
		<form action="select.php">
			<span>请选择活动的类型</span>
		</br>
		<input type="radio" name="select" value="do">策划中的活动</br>
	<input type="radio" name="select" value="done">已经完成的活动</br>
<span>请输入活动的名字</span>
<input type="text" name="name">
<input type="submit" value="Submit"></form>
</div>
</body>
</html>
</p>