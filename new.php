<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="static/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="static/text.css" rel="stylesheet"></head>
<script type="text/javascript">
	function beforeSubmit(form)
	{
		isNum = /^[0-9]*$/;
		if(form.select.value=='')
		{
			alert('活动类型未填写！请重新填写');			
			return false;
		}
		if(form.name.value=='')
		{
			alert('活动名称未填写！请重新填写');
			return false;
		}
		if(form.people.value=='')
		{
			alert('活动人数未填写！请重新填写');
			return false;
		}	
		if(isNum.test(check.people.value)==false)
		{
			alert('参加人数请填写数字！');
			return false;
		}	
	}
</script>
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
		<h2 class="text-center">创建一个新活动</h2></br>
		<div style="margin:10px; padding:10px;">
			<form action="select.php" style="margin-left:150px;" name="check" onsubmit="return beforeSubmit(this);">
				<span>请选择活动的类型:</span>
				<input id="set_center" type="radio" name="select" value="do">策划中的活动
				<input id="set_center" type="radio" name="select" value="done">已经完成的活动</br></br>
				<span>请输入活动的名字:<input id="set_center" type="text" class="form-control" style="width:200px;" name="name"></span></br></br>
				<span>请输入活动的人数:<input id="set_center" type="text" name="people" class="form-control" style="width:200px;"></span></br></br></br></br>
				<a href="index.php" style="float:right; margin-right:300px;"><div class="btn btn-primary">返回</div></a>
				<input id="set_center" type="submit" class="btn btn-success" style="margin-right:50px; float:right;" value="提交">
			</form>
		</div>
	</div>
</body>
</html>
