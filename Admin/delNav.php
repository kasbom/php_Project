<?php
	header("content-type:text/html;charset=utf-8");
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';

	checkLogin();
	initDb();
	$id=isset($_GET['id']) ? $_GET['id']:0;
	if(empty($id)){
		back('参数错误');
	}

	$sql="DELETE FROM nav where id={$id}";
	$result=mysql_query($sql);
	if($result!==false){
		jump('删除成功','Admin/nav.php',3);
	}else{
		jump('删除失败','Admin/nav.php',3);
	}


?>
