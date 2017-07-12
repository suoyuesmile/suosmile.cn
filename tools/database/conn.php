<?php
/**********************************
 * 连接数据库
 * 选择数据库
 * 设置编码
 ********************************
 */
$conn = @mysql_connect('localhost', 'root', 'root') or die('数据库连接失败');
mysql_select_db('sy_boke_db', $conn);
mysql_query('set names utf8');

