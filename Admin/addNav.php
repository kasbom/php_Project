<?php
	header('content-type:text/html;charset=utf-8');
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';
	checkLogin();
	initDb();

	$maxNav=7;
	if(!empty($_POST)){
		if(empty($_POST['nav_name'])) back('导航名不能为空');
		if(empty($_POST['nav_url']))  back('导航地址不能为空');

		$sql="SELECT count(*) as navCount FROM nav";
		$navCountArr = find($sql);
		$navCount =$navCountArr['navCount'];
		if($navCount>=$maxNav){
				back('当前导航数量已经超过最大限制'.$maxNav.'个');
		}

		$sql="SELECT * FROM nav WHERE nav_name='{$_POST['nav_name']}'";

		$oldNav=find($sql);
		if($oldNav){
			back('该导航已经存在，请更换');
		}

		$now=time();
		$sql="INSERT INTO nav VALUES (null,'{$_POST['nav_name']}','{$_POST['nav_url']}','{$_POST['nav_order']}',{$now})";

		$result=mysql_query($sql);
		if($result!==false){
			jump('导航添加成功','Admin/nav.php',3);
		}else{
			jump('导航添加失败','Admin/addNav.php',3);
		}


	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>添加官网导航菜单</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>添加官网导航菜单</h2>
  <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
</div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <form class="form" action="" method="post">
    <label for="txtname">导航名称：</label>
    <input type="text"  name="nav_name"  /><br>
    <label for="txtpswd">导航地址：</label>
    <input type="text"  name="nav_url"  /><br>
    <label for="txtpswd">导航排序：</label>
    <input type="text"  name="nav_order" value="" placeholder="正数排序" /><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="添加" />
    </div>
  </form>
</div>
</body>
</html>
