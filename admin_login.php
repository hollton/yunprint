<?php
session_start();
header("Content-type: text/html; charset=utf-8");
$_SESSION["admin"] = "admin";
$_SESSION["count"] = 0;
echo "<script language='javascript'>";
echo " location='admin_manage_temporary.php';";
echo "</script>";
?>