<?php
session_start();
//上面这个，一定要放在最开始！！不要动！！！！
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
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

/************* 
*@l - length of random string 
*/ 
function generate_rand($l){ 
$c= "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
srand((double)microtime()*1000000); 
$rand=""; 
for($i=0; $i<$l; $i++) { 
$rand.= $c[rand()%strlen($c)]; 
} 
return $rand; 
} 

function filekzm($a)
{
 $c=strrchr($a,'.');
 if($c)
 {
  return $c;
 }else{
  return '';
 }
}
$kzm=filekzm($_FILES["file"]["name"]);
//echo $_FILES["file"]["name"];
//echo"fuck!!!";
if ((($kzm== ".doc")
||($kzm== ".docx")
||($kzm== ".ppt")
||($kzm== ".pptx")
||($kzm== ".xls")
||($kzm== ".xlsx")
||($kzm== ".txt")
||($kzm== ".pdf")
)
&& ($_FILES["file"]["size"] < 1*1024*1024))//限制文件大小1M
  {
  if ($_FILES["file"]["error"] > 0)
    {
	?>
	运行错误！
	<?php
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	$save_file_type=filekzm($_FILES["file"]["name"]);
	$save_file_name=generate_rand(16).$save_file_type;
	$save_file_dir="yun_printer/upload/";
	$saeSto=new SaeStorage();
	while($saeSto->fileExists('yunprinter',$save_file_name))
	{
		$save_file_name=generate_rand(16).$save_file_type;
	}
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	//move_uploaded_file($_FILES["file"]["tmp_name"],
	//$save_file_dir.$save_file_name);
	
	//echo $saeSto->upload('yunprinter',$save_file_name,$_FILES["file"]["tmp_name"]). "<br />";
	//echo "Stored in: " .$save_file_name. "<br />";
	//echo $saeSto->getUrl('yunprinter',$save_file_name). "<br />";
	$mysql=new SaeMysql();
	$print_type=0;
	$shop_id=0;
	$times=0;
	$is_color=0;
	$note=$_POST["note"];
	if(is_numeric($_POST['print_type']))
	{
		$print_type=$_POST['print_type'];
	}
	if(is_numeric($_POST['shop_id']))
	{
		$shop_id=$_POST['shop_id'];
	}
	if(is_numeric($_POST['times']))
	{
		$times=$_POST['times'];
	}
	if(is_numeric($_POST['is_color']))
	{
		$is_color=$_POST['is_color'];
	}
	$file_title=mysql_escape_string($_FILES["file"]["name"] );
	$sql = "INSERT INTO `app_yunprinter`.`db_task` (`file_title`,`file_name`, `print_type_id`, `shop_id`,`user_id`,`times`,`is_color`,`note`) VALUES ('{$file_title}','{$save_file_name}', '{$print_type}', '{$shop_id}','{$_SESSION['uid']}',{$times},{$is_color},'{$note}');";
    }
	$mysql->runSql($sql);
	if ($mysql->errno() != 0)
	{
		die("Error:" . $mysql->errmsg());
	}
	$sql="select `id` from `app_yunprinter`.`db_task` where `file_name`='{$save_file_name}'";
	$data=($mysql->getData( $sql ));
	if ($mysql->errno() != 0)
	{
		die("Error:" . $mysql->errmsg());
	}
	?>
	<h4>上传成功！将带您进入支付页面...</h4>
	<meta http-equiv="refresh" content="3,url=pay.php?fid=<?=$data[0]['id']?>">
	<?php
	$mysql->closeDb();
  }
else
  {
  echo "Invalid file";
  }
?>
</body>
</html>