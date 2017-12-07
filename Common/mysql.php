<?php
	/**
	 * 数据库相关公共函数
	 */

	// 初始化 链接数据库
	function initDb(){
		// 链接数据库
		$link = @mysql_connect('localhost', 'root', '123456') or die('数据库链接失败');
		mysql_select_db('blog', $link);
		mysql_query('set names utf8');
	}

	function findAll($sql){
		if(empty($sql)) return false;
		$result= mysql_query($sql);
		if(is_resource($result)){
			$rows=array();
			while($row =mysql_fetch_array($result,MYSQL_ASSOC)){
					$rows[]=$row;
			}
			return $rows;
		}else{
			return false;
		}
	}

	function find($sql)
	{
		$query = mysql_query($sql);
		return mysql_fetch_array($query, MYSQL_ASSOC);
	}
