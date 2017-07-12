<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/jquery.pagination.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/header.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../css/bokeList.css"> -->
	<link rel="stylesheet" type="text/css" href="../../css/bottom2.css">
	<style type="text/css">
		.main{}
	.firstfloor{
		height: 40px;
		width: 100%;
		background: #ddd;
	}
	.firstfloor .wrapper{
		font-size: 14px;
		font-family: '华文细黑' , 'sans-serif';
		margin:0 auto;
		width: 1080px;
	}
	 .m_tag{
	 	color: #f00;
		width: 100px;
		float: left;
		text-align: center;
		line-height: 40px;
	}
	.wrapper ul{
		float: left;
	}
	.wrapper ul li{
		text-align: center;
		display: block;
		list-style: none;
		float: left;
		padding: 10px;
		line-height: 20px;
	}
	.wrapper ul li a{
		/*font-size: 14px;
		font-family: '华文细黑';*/
	}
	.secondfloor{
		width: 100%;

	}
	</style>
</head>
<body>
<div class="header">
	<div class="logo"><a href="../../index.html"><img src="../../images/logo1.png"></a></div>
	<div class="nav">
		<ul>
			<li><a href="../../technology.html" id="active">技术博客</a></li>
			<li><a href="../../article.html">走心随笔</a></li>
			<li><a href="../../academy.html">校园生活</a></li>
			<li><a href="../../music.html">品味音乐</a></li>
			<li><a href="../../movie.html">时尚观影</a></li>
			<li><a href="../../cartoon.html">二次元系</a></li>
			<li><a class="care" target="_blank" href="../../bg.html">关于本站</a></li>
		</ul>
	</div>
</div>
<div class="main">
	<div class="firstfloor">
		<div class="wrapper">
			<div class="m_tag">分类标签</div>
			<ul>
				<li><a href="bokeList.php?c=HTML">HTML</a></li>
				<li><a href="bokeList.php?c=CSS">CSS</a></li>
				<li><a href="bokeList.php?c=Javascript">Javascript</a></li>
				<li><a href="bokeList.php?c=jQuery">jQuery</a></li>
				<li><a href="bokeList.php?c=AJAX">AJAX</a></li>
				<li><a href="bokeList.php?c=Bootstrap">Bootstrap</a></li>
				<li><a href="bokeList.php?c=firebug">firebug</a></li>
				<li><a href="bokeList.php?c=PHP">PHP</a></li>
				<li><a href="bokeList.php?c=MySQL">MySQL</a></li>
				<li><a href="bokeList.php?c=Smarty">Smarty</a></li>
				<li><a href="bokeList.php?c=Thinkphp">Thinkphp</a></li>
				<li><a href="bokeList.php?c=Yii">Yii</a></li>
				<li><a href="bokeList.php?c=Laravel">Laravel</a></li>
				<li><a href="bokeList.php?c=Git">Git</a></li>
				<li><a href="bokeList.php?c=LAMP">LAMP</a></li>
				<li><a href="bokeList.php?c=Linux">Linux</a></li>
			</ul>
		</div>
	</div>
	<div class="secondfloor">
	
		<?php
			// echo "ok";
			$articleId = isset($_GET['a']) ? $_GET['a'] : 1 ;
			header("content-type:text/html;charset=utf-8");
			$mysqli = @new mysqli('localhost', 'root', 'suoyue', 'sy_boke_db');
			$mysqli->set_charset('utf8');
			if($mysqli->connect_errno){
				die('数据库连接失败：'.$mysqli->connect_error);
			}
			$sql = "SELECT id, title, content, `date`, `view`, rewrite FROM sy_boke WHERE id='$articleId'";
			$res = $mysqli->query($sql);
			while($rows = $res->fetch_assoc()){
		?>

		<?php
				echo $rows["content"];
			}
			$mysqli->close();
		?>
	</div>

</div>
</body>
</html>