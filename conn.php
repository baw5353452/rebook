<?php
$conn=mysql_connect('10.0.16.16:4066','3IOqLxYf','2NQs8mAUUYoN');
if (!$conn){
		die ('数据库连接失败');
	}
mysql_select_db('baw5353452_mysql_ybgv1eo9', $conn) or die ("没有找到数据库。");
mysql_query("set names utf8");
?>