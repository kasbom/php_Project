<?php
	header('content-type:text/html;charset=utf-8');
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';

	checkLogin();
	initDb();

	if(!empty($_POST)){
			if(empty($_POST['id'])){
				back('参数错误');
			}
			if(empty($_POST['nav_name'])){
				back('标题不能为空');
			}
			if(empty($_POST['nav_url'])){
				back('url不能为空');
			}
			$id=isset($_GET['id']) ? $_GET['id']:0;
		$sql="UPDATE nav set nav_name='{$_POST['nav_name']}',nav_url='{$_POST['nav_url']}' WHERE id={$id}";
		$result=mysql_query($sql);
		if($result!==false){
			jump('修改成功','Admin/nav.php',3);
		}else{
			jump('修改失败','Admin/editNav.php?id='.$_POST['id'],3);
		}

	}else{
		$id=isset($_GET['id']) ? $_GET['id']:0;
		if(empty($id)){
			back('参数错误');
			}
		$sql="SELECT * FROM nav WHERE id={$id}" ;
		$info=find($sql);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改导航菜单</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改导航菜单</h2>
  <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
</div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <form class="form" action="" method="post">
    <input type="hidden" name="id" value="1">
    <label for="txtname">菜单名称：</label>
    <input type="text" name="nav_name" value="首页" /><br>
    <label for="txtpswd">菜单地址：</label>
    <textarea name="nav_url">/Home/index.php</textarea><br>
    <label for="txtpswd">菜单排序：</label>
    <input type="text" name="nav_order" value="1" />
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>
