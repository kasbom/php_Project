<?php
	header("content-type:text/html;charset=utf8");
	include_once '../Common/function.php';
	include_once '../Common/mysql.php';
	checkLogin();
	initDb();
	$sql="SELECT * FROM nav ORDER BY nav_order ASC ";
	$navs=findAll($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>导航菜单项列表</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>导航菜单项列表</h2>
  <span>欢迎<b><?php echo isset($_SESSION['username']) ? $_SESSION['username']:'';?></b>登录后台</span>
</div>
<?php include_once 'commonNav.php' ?>
<div class="main">
  <table cellspacing="0">
  <tr>
    <td><label for="txtname">ID</label></td>
    <td><label for="txtname">菜单名称</label></td>
    <td><label for="txtname">菜单url地址栏</label></td>
    <td><label for="txtname">排序</label></td>
    <td><label for="txtname">发布时间</label></td>
    <td><label for="txtname">操作</label></td>
  </tr>


   <?php
    		if(!empty($navs)) {
    			foreach($navs as $k => $nav){
    ?>
  	  <tr>
  	    <td><label for="txtname"><?php echo $nav['id'];?></label></td>
  	    <td><label for="txtname"><?php echo $nav['nav_name'];?></label></td>
  	    <td><label for="txtname"><?php echo $nav['nav_url'];?></label></td>
  	    <td><label for="txtname"><?php echo $nav['nav_order'];?></label></td>
  	    <td><label for="txtname"><?php echo date('Y-m-d', $nav['update_time']);?></label></td>
  	    <td><label for="txtname"><a href="editNav.php?id=<?php echo $nav['id'];?>">修改</a> | <a href="delNav.php?id=<?php echo $nav['id'];?>" onclick="if(!confirm('确定删除该导航吗？')){return false;}">删除</a></label></td>
    		</tr>
  	<?php
  			}
  		} else {
  	?>
  	  <tr>
  	    <td colspan="6"><label for="txtname">暂无数据</label></td>
  	  </tr>
  	 <?php
  	}
  	 ?>
</table>
</div>
</body>
</html>
