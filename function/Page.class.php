<?php
class Page{
	private $cate;
	private $perPage;
	private $nPage;
	private $offset;
	private $mysqli;

	public function __construct($curPage, $cate){
		$this->cate = $cate;
		$this->perPage = 12; //每页的记录数
		$this->curPage = $curPage;
		$this->getConn(); //连接数据库
		$this->nPage = ( $this->getTotal() / $this->perPage ) + 1; //总页数
		$this->offset = ( $this->curPage - 1 ) * $this->perPage;    //当前页开始记录数
	}

	public function getConn(){
		header("content-type:text/html;charset=utf-8");
		$this->mysqli = @new mysqli('localhost', 'root', 'suoyue', 'sy_boke_db') ;
		$this->mysqli->set_charset('utf8');
		if($this->mysqli->connect_errno){
			die('数据库连接失败：'.$this->mysqli->connect_error);
		}
	}
	// public function getClose(){
	// 	$this->mysqli->close();
	// }
	public function getPageCount(){
		return $this->nPage;
	}

	public function getTotal(){
		$sql = "SELECT id FROM sy_boke WHERE category='$this->cate'";
		$resTotal = $this->mysqli->query($sql);
		return $resTotal->num_rows; //总记录数
	}

	public function showPage(){
		$data = array();
		$sql = "SELECT sy_boke.`date`, title, sy_boke.`view`, rewrite FROM sy_boke WHERE category='$this->cate' LIMIT $this->offset, $this->perPage ";
		$res = $this->mysqli->query($sql);
		while($rows = $res->fetch_assoc()){
			array_push($data, $rows);
		}
		$this->mysqli->close();
		return $data;
	}
};
