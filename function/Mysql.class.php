<?php
class Mysql{
	private $conn;

	private $config = array(
		'DB_HOST'			=> 	'localhost',     // 服务器地址
		'DB_NAME'			=>  'sy_boke_db',    // 数据库名
		'DB_USER'			=> 	'root',          // 用户名
		'DB_PWD'			=> 	'root'           // 密码
		);

	public function __construct(){

	}
	public function connect(){
		$this->conn = @mysql_connect($this->config['DB_HOST'], $this->config['DB_USER'], $this->config['DB_PWD']) or die('数据库连接失败');
		mysql_select_db($this->config['DB_NAME'], $this->conn);
		mysql_query('set names utf8');
	}
	public function close(){
		if($this->conn){
			mysql_close($this->conn);
		}	
	}
};
