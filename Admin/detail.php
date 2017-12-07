<?php
	header("content-type:text/html;charset=utf8");
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';
	checkLogin();
	initDb();

	$news_id=isset($_GET['news_id']) ? $_GET['news_id'] :0;
	$sql="SELECT *FROM news where news_id ={$news_id} AND user_id = {$_SESSION['user_id']}";

	$info=find($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>新闻详情</title>
 <link rel="stylesheet" href="../Public/css/basic.css" />
 <link rel="stylesheet" href="../Public/css/Admin-detail.css" />
</head>
<body>
<div class="top"><h2>文章列表页面</h2></div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <h3><?php echo $info['title'];?></h3>
  <p><font size="2">发布时间：<?php echo date('Y-m-d H:i:s', $info['addtime']);?></font></p>
  <hr width="100%" align="left" />
  <div class="con">
    <p><?php echo $info['content'];?></p>
  </div>
</div>
</body>
</html>

