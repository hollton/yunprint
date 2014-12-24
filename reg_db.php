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
if((!empty($_POST["name"]))&&(!empty($_POST["password"]))&&(!empty($_POST["password_very"]))&&(!empty($_POST["phone"])))
{
	if(strlen($_POST["name"])<=3||strlen($_POST["name"])>=20
	||strlen($_POST["password"])<=5||strlen($_POST["password"])>=20
	||strlen($_POST["password_very"])<=5||strlen($_POST["password_very"])>=20
	||strlen($_POST["phone"])!=11)
	{
	?>
	<img src="images/error.png" /><h2>Data error!</h2>
	<?php
	}else
	{
		$mysql = new SaeMysql();
		
		$mysql->closeDb();
		if($_POST["password"]==$_POST["password_very"])
		{
			$uname=$_POST["name"];
			$md5_password=md5($_POST["password"]);
			$uphone=$_POST["phone"];
			$uis_shoper=0;
			
			$sql="SELECT `id` FROM `app_yunprinter`.`db_user` WHERE `name`='$uname';";
			$data = $mysql->getData( $sql );
			if ($mysql->errno() != 0)
			{
				die("Error:" . $mysql->errmsg());
			}else
			{
				if(count($data)>=1)
				{
					?>
					<img src="images/error.png" /><h2>user exist!</h2>
					<?php
				}else
				{
					if($_POST["is_shoper"]=="true")
					{
						$uis_shoper=1;
						$_SESSION["sname"] = $_POST["name"];
						$_SESSION["spassword"] = $md5_password;
					}
					
					$sql="INSERT INTO `app_yunprinter`.`db_user` (`name`, `password`, `type`, `phone`) VALUES ('$uname', '$md5_password', '$uis_shoper', '$uphone');";
					$mysql->runSql($sql);
					if ($mysql->errno() != 0)
					{
						die("Error:" . $mysql->errmsg());
					}else
					{
						if($_POST["is_shoper"]=="true")
						{
							//echo "<meta http-equiv=\"refresh\" content=\"0; url=shoper.php\">";
							echo "<script language='javascript'>";
							echo " location='shoper.php';";
							echo "</script>";
						}
						
						?>
						<img src="images/right.png" /><h2>Reg success!</h2>
						<?php
					}
				}
				//var_dump($data);
			}
		}else
		{
			?>
			<img src="images/error.png" /><h2>password not right!</h2>
			<?php
		}
		//$sql="insert "
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