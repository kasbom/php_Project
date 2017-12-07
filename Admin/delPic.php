<?php
		header("content-type:text/html;charset=utf-8");
		include_once('../Common/function.php');
		include_once('../Common/mysql.php');
		checkLogin();
		initDb();
		$id=isset($_GET['id']) ? $_GET['id']:0;
		if($id<=0){
			back('参数错误呢');
		}
		$sql="SELECT pic_url FROM pics WHERE id={$id} LIMIT 1";
		$picInfo=find($sql);
		$pic_url=$picInfo['pic_url'];
		unlink('../Public/Upload/'.$pic_url);

		$sql="DELETE FROM pics WHERE id={$id}";
		$result=mysql_query($sql);
		if($result){
				jump('删除成功','Admin/picList.php',3);
		}else{
			back('删除失败');
		}



?>
