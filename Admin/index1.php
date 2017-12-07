<?php
	header("content-type:text/html;charset=utf-8");
  include_once('../Common/function.php');
	include_once('../Common/mysql.php');
	checkLogin();
  initDb();

  $sql = "SELECT count(*) as newsnum FROM news";
      $newsInfo = find($sql);
      $newsCount=$newsInfo['newsnum'];

     /* echo '<pre>';
      echo var_dump($newsCount);
      echo '</pre>';*/

  $sql ="SELECT count(*) as usernum FROM user";
  $userInfo=find($sql);
 /* echo '<pre>';
  var_dump($userInfo);
  echo '</pre>';*/
  $userCount=$userInfo['usernum'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="../Public/css/basic.css" />
  <link rel="stylesheet" href="../Public/css/Admin-index.css">
</head>
<body>
<div class="top">
  <h2>后台首页</h2>
  <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
</div>
<?php include_once 'commonNav.php' ?>
<div class="banner"><img src="../Public/img/index_banner.jpg" height="900" width="1440" alt=""></div>
<div class="info"><p>本站共有文章<b><?php echo $newsCount ?></b>篇，注册会员<b><?php echo $userCount ?></b>人</p></div>
</body>
</html>
