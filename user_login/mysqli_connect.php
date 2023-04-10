<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','123456');
//DEFINE ('DB_PASSWORD','');//we的数据库没上密码
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','3d_room');

/*DEFINE ('DB_USER','wnedekyd_movie');
DEFINE ('DB_PASSWORD','qw1234er123456!');
DEFINE ('DB_HOST','182.255.34.200');
DEFINE ('DB_NAME','wnedekyd_movie1');*/

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not to connect to Mysql:'.mysqli_connect_error());
// @符号，用于错误忽略
mysqli_set_charset($dbc, 'utf8');
?>