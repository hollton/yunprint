<?php
session_start();
	header("Content-type: text/html; charset=utf-8");
	if(empty($_SESSION["admin"]))
	{
		echo "对不起，您没有登陆，没有权限访问该页面";
		sleep(3);
		echo "<script language='javascript'>";
		echo " location='admin_login.php';";
		echo "</script>";
	}
	else {
		echo "<script language='javascript'>";
		echo " location='admin_manage.php?judge=1&first=2';";
		echo "</script>";
	}
?>