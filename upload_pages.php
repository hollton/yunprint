<?php
session_start();

//上面这个，一定要放在最开始！！不要动！！！！
?>
<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
<body>
<?php
include("checkpostget.php");
if(empty($_SESSION["uname"]))
{
	?>
		没登陆！滚蛋！
	<?php
	exit();
}

if(isset($_GET['fid'])&&isset($_POST['pages']))
{
	if(is_numeric($_GET['fid'])&&is_numeric($_POST['pages']))
	{
		$mysql=new SaeMysql();
		$sql="UPDATE  `db_task` SET  `pages` =  {$_POST['pages']} WHERE  `id` ={$_GET['fid']};";
		$mysql->runSql($sql);
		?>
		提交成功！跳转pay.php?fid=<?=$_GET['fid']?>
		<?php
	}
}
?>
</body>
</html>