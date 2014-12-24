<?php
session_start();

//上面这个，一定要放在最开始！！不要动！！！！
?>
<html>
<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
<?php
if(empty($_SESSION["uname"]))
{
	?>
		没登陆！滚蛋！
	<?php
}else
{
?>

<body>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename(*.doc,*.ppt,*.xls,*.pdf,*.txt,<1M):</label>
<br />
<input type="file" name="file" id="file" /> 
<br />
<select id="print_type" name="print_type">
	<option value="-1">请选择...</option>
	<?php
	$mysql = new SaeMysql();
	$sql = "SELECT * FROM `db_print_type`";
	$data = $mysql->getData( $sql );
	$i=0;
	for($i=0;$i<count($data);$i++)
	{
		echo ("<option value=\"{$data[$i]['id']}\">{$data[$i]['name']}</option>");
	}
	?>
</select>
<br />
<select id="shop_id" name="shop_id">
	<option value="-1">请选择...</option>
	<?php
	$sql = "SELECT * FROM `db_shop`";
	$data = $mysql->getData( $sql );
	$i=0;
	for($i=0;$i<count($data);$i++)
	{
		echo ("<option value=\"{$data[$i]['id']}\">{$data[$i]['name']}</option>");
	}
	?>
</select>
<br />
份数：<input type="text" name="times" value="1">数字</input>
<br />
备注：<input type="text" name="note" >30中文字</input>
<br/>
<select id="is_color" name="is_color">
	<option value="-1">请选择...</option>
	<option value="0">黑白</option>
	<option value="1">彩色</option>
</select>
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
<?php
$mysql->closeDB();
?>
<?php
}
?>