<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/jquery.pagination.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../css/bokeList.css">
	<link rel="stylesheet" type="text/css" href="../../css/bottom2.css">
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
		<div class="sd_wrapper">
			<div class="list_time">
				<?php 
				if(isset($_GET['c'])){
					$cate = $_GET['c'];
				}else{
					$cate = '';
				}
				?>
				<div class="m_list_title"><?php echo $cate; ?>笔记</div>
				<div id="txt">
					<?php
						header("content-type:text/html;charset=utf-8");
						$mysqli = @new mysqli('localhost', 'root', 'suoyue', 'sy_boke_db');
						$mysqli->set_charset('utf8');
						if($mysqli->connect_errno){
							die('数据库连接失败：'.$mysqli->connect_error);
						}
						$sql = "SELECT id, title, `date`, `view`, rewrite FROM sy_boke WHERE category='$cate' LIMIT 12";
						$res = $mysqli->query($sql);
						while($rows = $res->fetch_assoc()){
					?>
					<div class="m_list">
						<div class="date"><?php echo $rows["date"]; ?></div>
						<a href= "showBoke.php?a=<?php echo $rows['id']; ?>"><?php echo $rows["title"]; ?></a>
						<div class="pv">
							<img src="../../images/pv.png" alt=""> <?php echo $rows["view"]; ?> 
						</div>
						<div class="rewrite"><img src="../../images/rewrite.png" alt=""> <?php echo $rows["rewrite"]; ?></div>
					</div>
					<?php 
						} 
						$mysqli->close();
					?>
				</div>
				<div class="m_page"></div>
			</div>
			<div class="list_hot">
				<div class="s_list_title"></div>
				<div class="s_list"></div>
			</div>
		</div>	
	</div>
</div>
<script type="text/javascript">
	$('.m_page').pagination({
    pageCount:2,
    jump:false,
    coping:true,
    homePage:'首页',
    endPage:'末页',
    prevContent:'上页',
    nextContent:'下页'
});
</script>
<script src="../../js/page.js"></script>
<div class="footer">
	<div class="brand">© 2017 - 2017 邵锁的官方网站(suosmile.cn) All Rights Reserved. 站长版权所有</div>
</div>
</body>
</html>