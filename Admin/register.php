<?php
	header("content-type:text/html;charset=utf-8");
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
  /*$link=@mysql_connect('localhost','root','123456') or die('数据库连接失败');
  mysql_select_db('blog',$link);
  mysql_query('set names utf8');*/
  if(!empty($_POST)){

    if(empty($_POST['username'])) back('用户名不能为空');
    if(empty($_POST['password'])) back('密码不能为空');
    if(empty($_POST['password1'])) back('确认密码不能为空');
    if($_POST['password']!==$_POST['password1']) back('两次密码不一致');
    if(empty($_POST['mobile'])) back('手机号不能为空');

  //验证逻辑性是否通过
    $sql="SELECT * FROM user where username = '{$_POST['username']}'";
    $query=mysql_query($sql);
    $result=mysql_fetch_array($query,MYSQL_ASSOC);

    if(!empty($result)){
      back('当前用户名'.$_POST['username'].'已经存在，请更换用户名');
    }

    $_POST['password']=md5($_POST['password']);
    $now =time();


    $sql="INSERT INTO user VALUES(null,'{$_POST['username']}','{$_POST['password']}','{$_POST['email']}','{$_POST['mobile']}',{$now})";


    $result=mysql_query($sql);
    if($result){
      jump('注册成功','Admin/login.php',3);
    }else{
      jump('注册失败','Admin/register.php',3);
    }




    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    exit();*/
  }

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台注册页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
  <div class="top"><h2>注册页面</h2></div>
  <div class="main">
    <form class="form" action="" method="post">
      <label for="txtname">用&ensp;户&ensp;名：</label>
      <input type="text" name="username" /><br>
      <label for="txtpswd">密&#12288;&#12288;码：</label>
      <input type="password" name="password" /><br>
      <label for="txtpswd">确认密码：</label>
      <input type="password" name="password1" /><br>
      <label for="txtpswd">邮&#12288;&#12288;箱：</label>
      <input type="text" name="email" /><br>
      <label for="txtpswd">手&ensp;机&ensp;号：</label>
      <input type="text" name="mobile" /><br>
      <div class="btn">
        <input type="reset" />
        <input type="submit" value="注册" />
        <a href="login.php">已有账号？点击登录</a>
      </div>
    </form>
  </div>
</body>
</html>
