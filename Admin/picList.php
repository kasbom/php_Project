<?php

  header('content-type:text/html;charset=utf-8');
  include_once '../Common/function.php';
  include_once '../Common/mysql.php';

  checkLogin();
  initDb();

  $sql="SELECT * FROM pics";
  $pics=findAll($sql);

  /*echo '<pre>';
  var_dump($pics);
  echo '</pre>';
  exit();*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>相册列表</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
 <link rel="stylesheet" href="../Public/css/Admin-picList.css">
</head>
<body>
  <div class="top">
    <h2>相册列表</h2>
    <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
  </div>
  <?php include_once 'commonNav.php' ?>
  <div class="pic">
    <ul>
				<?php
					if(!empty($pics)){
							foreach ($pics as $k => $pic) {

							?>
							<li><img src="../Public/Upload/<?php echo $pic['pic_url'];?>" alt=""><a href="delPic.php?id=<?php echo $pic['id'];?>" onclick="if(!confirm('确定删除该图片吗，删除之后不可恢复！')) {return false;}" title="点击删除该图片">X</a></li>
						<?php }
					}else{ ?>
						<p>暂无相关照片，请选择图片上传</p>
					<?php }
				?>

    </ul>
  </div>
</body>
<script src="../Public/js/Admin-effect.js"></script>
</html>
