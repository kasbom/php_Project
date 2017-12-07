<?php
	header("content-type:text/html;charset=utf8");
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';
	checkLogin();
	initDb();

	$news_id=isset($_GET['news_id']) ? $_GET['news_id']:0;
	if(empty($news_id)){
		back('参数错误');
	}

	$sql="DELETE FROM news WHERE news_id={$news_id} AND user_id ={$_SESSION['user_id']}";
	$result=mysql_query($sql);
	if($result!==false){
		jump('删除成功','admin/list.php',3);
	}else{
		jump('删除失败','admin/list.php',3);
	}



?>
