<!DOCTYPE html>
<html>
<head>
    <title>校园打印</title>
	<meta charset="utf-8">
    <meta name="keyword" content=""/>
    <meta name="description" content=""/>
	<meta name="Author" content="shl">
	<meta name="Robots" content="all">
	<meta http-equiv="refresh" content="10;url=index.php">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon"/>
	
    <link href="css/second.css" rel="stylesheet" type="text/css" />
</head>
    <body>
    	<!-- header -->
        <div class="header">
            <div class="head">
                <a href="index.html" class="logo"></a>
            </div>
        </div>
		
        <div class="main main1">
		<?php
include("checkpostget.php");
if((!empty($_POST["shoper"]))&&(!empty($_POST["address"]))&&(!empty($_POST["price"]))&&(!empty($_POST["alipay"]))&&(!empty($_POST["shophours"])))
{
	$sshoper = $_POST["shoper"];
	$sname = $_SESSION["sname"];
	$sprice_per_side = $_POST["price"];
	$salipay_account = $_POST["alipay"];
	$saddress = $_POST["address"];
	$sopen_time = $_POST["shophours"];
	$md5_password = $_SESSION["spassword"];
	$mysql = new SaeMysql();
		
	$mysql->closeDb();
		
	$sql="SELECT `id` FROM `app_yunprinter`.`db_shop` WHERE `name`='$sshoper';";
	$data = $mysql->getData( $sql );
	if ($mysql->errno() != 0)
	{
		die("Error:" . $mysql->errmsg());
	}else
	{
		if(count($data)>=1)
		{
			?>
			<img src="images/error.png" /><h2>shoper exist!</h2>
			<?php
		}else
		{
			$sql="INSERT INTO `app_yunprinter`.`db_shop` (`name`, `price_per_side`, `alipay_account`, `address`, `open_time`) VALUES ('$sshoper', '$sprice_per_side', '$salipay_account', '$saddress', '$sopen_time');";
			$mysql->runSql($sql);
			if ($mysql->errno() != 0)
			{
				die("Error:" . $mysql->errmsg());
			}else
			{
				$sql="SELECT * FROM `app_yunprinter`.`db_shop` WHERE `name`='$sshoper';";
				$data = $mysql->getData( $sql );
				if ($mysql->errno() != 0)
				{
					die("Error:" . $mysql->errmsg());
				}else
				{
					$sid = $data[0]["id"];
					$sql="UPDATE `app_yunprinter`.`db_user` SET `shop_id`='$sid' WHERE `name` = '$sname' AND `password`='$md5_password';";
					$mysql->runSql($sql);
					if ($mysql->errno() != 0)
					{
						die("Error:" . $mysql->errmsg());
					}
					else
					{
						?>
						<img src="images/right.png" /><h2>Reg success!</h2>
						<?php
					}
				}
			}
		}
			//var_dump($data);
	}
}else
{
	?>
	<img src="images/error.png" /><h2>Infomation not complete!</h2>
	<?php
}
?>

	<div class="jump"><span id="time">10</span>s后将自动带您进入前一页面...<span>若跳转失败，手动戳&nbsp;<a id="back" href="index.php">这里</a>&nbsp;返回。</span></div>
</div>



        
        <!-- footer --> 
        <div class="footer">
            <div class="foot">
                <div class="link">
                    <a href="javascript:;" target="_blank">关于我们</a><span>|</span>
                    <a href="javascript:;" target="_blank">意见反馈</a><span>|</span>
                    <a href="http://www.hfut.edu.cn" target="_blank">合肥工业大学</a>
                </div>
                <div class="cprt">
                    Copyright&nbsp;&copy;&nbsp;2014&nbsp;HFUT_SHL. All Rights Reserved
                </div>
            </div>
        </div>
    
    <script>
		var oTime=document.getElementById('time');
		var timer=null; var i=10;
		
		timer=setInterval(function(){
			i--;
			oTime.innerHTML=i;
			if(i<1){ clearInterval(timer);}
			},1000);
		
	</script>
    </body>
</html>