<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	</style>
</head>
<body>
<?php
	$articleId = isset($_GET['a']) ? $_GET['a'] : 1 ;
	include_once('../Mysql.class.php');
	$db = new Mysql();
	$db->connect();
	$res = mysql_query("SELECT title, content, `date`, `view`, rewrite FROM sy_boke WHERE id='$articleId'");
	while( $rows = mysql_fetch_array($res) ) {
		echo $rows['content'];
	}
?>
</body>
</html>