<?php
	header("content-type:text/html;charset=utf-8");
	include_once('../Common/function.php');
	include_once('../Common/mysql.php');
	checkLogin();
	initDb();

	if(!empty($_POST)){

		if(empty($_POST['title']))  {back('标题不能为空');}
		if(empty($_POST['content']))  {back('内容不能为空');}
		$title=trim($_POST['title']);
		$content=trim($_POST['content']);
		$user_id=$_SESSION['user_id'];
		$now=time();
		$newPicName = '';
		//实现图片上传，返回图片地址
		if(!empty($_FILES)){
				if($_FILES['pic']['error']==0){
						$ext=strrchr($_FILES['pic']['name'],'.');
						$newPicName=time().mt_rand(1000,9999).$ext;
						$result=move_uploaded_file($_FILES['pic']['tmp_name'], '../Public/Upload/'.$newPicName);
				}
		}
		$sql="INSERT INTO news VALUES(null,{$user_id},'{$title}','{$content}','{$now}','{$newPicName}')";
		$result=mysql_query($sql);
		if($result){
			jump('发布成功！','admin/list.php',3);
		}else{
			jump('发布失败！','admin/addNews.php',3);
		}

	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>发布新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>发布新闻</h2>
  <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
</div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <label for="txtname">标题：</label>
    <input type="text"  name="title" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"></textarea><br>
    <label for="txtpic">图片：</label>
		<input type="file" multiple name="pic"><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="发布" />
    </div>
  </form>
</div>
</body>
</html>
