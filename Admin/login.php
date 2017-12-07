<?php
	header("content-type:text/html;charset=utf-8");
include_once '../Common/mysql.php';
include_once '../Common/function.php';
 initDb();
 if(!empty($_POST)){
 	if(empty($_POST['username'])) back('用户名不存在');
 	if(empty($_POST['password'])) back('密码不存在');

$sql="SELECT * FROM user WHERE username ='{$_POST['username']}' LIMIT 1";
$query =mysql_query($sql);
$user=mysql_fetch_array($query,MYSQL_ASSOC);
if($user){
	if($user['password']!==md5($_POST['password'])){
		back('密码错误');
	}
	@session_start();
	$_SESSION['username']=$user['username'];
	$_SESSION['user_id']=$user['user_id'];
	jump('登陆成功','Admin/index1.php',3);
 }else{
 	back('用户不存在');
 }
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台登录页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
    <div class="top"><h2>后台登录</h2></div>
    <div class="main">
      <form class="form" action="" method="post">
        <label for="txtname">账号：</label>
        <input type="text"  name="username" value="" /><br>
        <label for="txtpswd">密码：</label>
        <input type="password"  name="password" /><br>
        <div class="btn">
          <input type="reset" />
          <input type="submit" value="登录" />
          <a href="register.php">没有账号？点击注册</a>
        </div>
      </form>
    </div>
 </body>
 </html>
