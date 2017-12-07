<?php
	header("content-type:text/html;charset=utf-8");
	include_once('../Common/function.php');

	@session_start();
	$_SESSION=array();
	jump('退出成功','admin/login.php',3);

?>
