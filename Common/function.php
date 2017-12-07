<?php
	/**
	 * 公共函数文件
	 */

	/**
	 * auth:chenxq
	 * @param  $msg 提示信息
	 * desc:返回上一步
	 */
	function back($msg)
	{
		echo $msg;
		$back = <<<eof
		<script type="text/javascript">
			setTimeout('window.history.go(-1);',1000);
		</script>
eof;
		echo $back;
		exit();
	}

	/**
	 * 跳转函数
	 * @param  string  $msg  提示信息
	 * @param  string  $url  跳转地址
	 * @param  integer $time 延迟时间
	 * @return [type]        [description]
	 */
	function jump($msg,$url,$time = 1)
	{
		$url = 'http://localhost/test/PHP/blog/'.$url;
		//跳转提示功能
		header("Refresh:{$time};url='{$url}'");
		echo $msg . "系统将在{$time}秒之后自动跳转到{$url}！";
		//终止脚本
		exit();
	}


	function checkLogin(){
		@session_start();
		if(!isset($_SESSION['username'])|| !isset($_SESSION['user_id'])){
				jump('暂未登录，请先登录','admin/login.php',3);
		}
	}
