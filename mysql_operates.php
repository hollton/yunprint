<?php
include 'checkpostget.php';

$id = $_GET["id"];
$link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
if($link)
{
	mysql_select_db(SAE_MYSQL_DB,$link);
	//your code goes here
	mysql_query('set name "uft-8"');
	mysql_query("delete from `app_yunprinter`.`db_user` where id = '$id'");
	mysql_close($link);
	
	echo "<script language='javascript'>";
	echo " location='admin_manage.php';";
	echo "</script>";
}
?>
