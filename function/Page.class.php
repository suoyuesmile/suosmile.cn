<?php
class Page{
	private $cate;
	private $perPage;
	private $nPage;
	private $offset;

	public function __construct($curPage, $cate){
		$this->cate = $cate;
		$this->perPage = 12; //每页的记录数
		$this->curPage = $curPage;
		$this->getConn(); //连接数据库
		$this->nPage = ( $this->getTotal() / $this->perPage ) + 1; //总页数
		$this->offset = ( $this->curPage - 1 ) * $this->perPage;    //当前页开始记录数
	}

	public function getConn(){
		include_once('Mysql.class.php');
		$db = new Mysql();
		$db->connect();
	}
	public function getPageCount(){
		return $this->nPage;
	}

	public function getTotal(){
		$resTotal = mysql_query("SELECT * FROM sy_boke WHERE category='$this->cate'");
		return mysql_num_rows($resTotal); //总记录数
	}

	public function showPage(){
		$data = array();
		$res = mysql_query("SELECT sy_boke.`date`, title, sy_boke.`view`, rewrite FROM sy_boke WHERE category='$this->cate' LIMIT $this->offset, $this->perPage ");
		while($rows = mysql_fetch_assoc($res)){
			array_push($data, $rows);
		}
		return $data;
	}
};
