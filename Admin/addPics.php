<?php
		header('content-type:text/html;charset=utf-8');
		include_once '../Common/function.php';
		include_once '../Common/mysql.php';

		checkLogin();
		initDb();

		if(!empty($_FILES)){

		/*	echo '<pre>';
			var_dump($_FILES);
			echo '</pre>';
			exit();*/

				if($_FILES['pic']['error']==0){
						$ext=strrchr($_FILES['pic']['name'],'.');
						$newPicName=time().mt_rand(1000,9999).$ext;

						$result=move_uploaded_file($_FILES['pic']['tmp_name'], '../Public/Upload/'.$newPicName);
						if($result){
							$now=time();
							$sql="INSERT INTO pics VALUES (null,'{$newPicName}',{$now})";
							mysql_query($sql);
							jump('图片上传成功','Admin/picList.php',3);
						}else{
							back('图片上传失败，请重试');
						}
				}else{
					back('上传失败');
				}
		}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>图片上传</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
 <h2>图片上传页</h2>
</div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <label for="txtname">选择图片：</label>
    <input type="file" multiple name="pic"><br>
    <div class="btn"><input type="submit"></div>
  </form>
</div>
</body>
</html>
