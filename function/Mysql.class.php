<?php
class Mysql{
	private $conn;

	private $config = array(
		'DB_HOST'			=> 	'localhost',     // 服务器地址
		'DB_NAME'			=>  'sy_boke_db',    // 数据库名
		'DB_USER'			=> 	'root',          // 用户名
		'DB_PWD'			=> 	'suoyue'           // 密码
		);

	public function __construct(){

	}
	public function connect(){
		$this->mysqli = @new mysqli($this->config['DB_HOST'], $this->config['DB_USER'], $this->config['DB_PWD'], $this->config['DB_NAME']) ;
		if($this->conn->connect_erron){
			die('数据库连接失败：'.$this->conn->connect_error);
		}
		
	}
	public function close(){
		if($this->mysqli){
			$this->mysqli->close();
		}	
	}
};
