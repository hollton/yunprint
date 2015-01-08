<?php
session_start();

//上面这个，一定要放在最开始！！不要动！！！！
?>

<?php
include("checkpostget.php");
if(empty($_SESSION["uname"]))
{
	?>
	<html>
	<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
	<body>
		没登陆！滚蛋！
	</body>
	</html>
	<?php
	exit();
}?>
<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
<body>
<?php

if(isset($_GET['fid']))
{
	if(is_numeric($_GET['fid']))
	{
		$mysql=new SaeMysql();
		$sql="select * from `db_task` where `id`={$_GET['fid']}";
		$data = $mysql->getData( $sql );
		if ($mysql->errno() != 0)
		{
			die("Error:" . $mysql->errmsg());
		}
		if($data[0]["pages"]<=0)
		{
			?>
			<form action="upload_pages.php?fid=<?=$_GET['fid']?>" method="post">
			请输入实际页数，支付价格依据实际页数确定，若输入有误，可能会耽误您打印：
			<br />
			<input type="text" name="pages" ></input>
			<input type="submit" name="submit" value="Submit" />
			</form>
			<?php
		}else
		{
			?>
			直接跳转
			<?php
		}
	}
}
?>

</body>
</html>