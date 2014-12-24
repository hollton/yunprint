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
?>
<html>
<head>
    <title>校园打印</title>
	<meta charset="utf-8">
    <meta name="keyword" content=""/>
    <meta name="description" content=""/>
	<meta name="Author" content="shl">
	<meta name="Robots" content="all">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="images/favicon.ico"  type="image/x-icon"/>
	
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link href="css/second.css" rel="stylesheet" type="text/css" />
</head>
    <body>
    	<!-- header -->  
        <div class="header">
            <div class="head">
                <a href="index.php" class="logo"></a>
                <dl class="regLog">
				<?php
				
				if(empty($_SESSION["admin"]))
				{
					?>
                        <dd><a href="javascript:;" onclick="goLog()">登录</a></dd>
                        <dt></dt>
                        <dd><a href="javascript:;" onclick="goReg()">注册</a></dd>
					<?php
				}else
				{
					?>
                        <dd>欢迎您，<?=$_SESSION["admin"]?>
                        <dt></dt>
                        <dd><a href="#">我的打印</a></dd>
						<dt></dt>
						<a href="logout.php">登出</a></dd>
					<?php
				}
				?>
                </dl>
            </div>
        </div>
        
        <!-- main -->  
        <div class="main">
            <div class="mainTop">
                <div class="mainTopContain">
                        <ul class="myorder">
                        	<li class="order"><h3>用户信息</h3>
                            	<ul>
                                	<li><a id="active" href="#">顾客信息</a></li>
                                	<li><a href="#">商家信息</a></li>
                                </ul>	
                            </li>
                        	<li class="order"><h3>订单信息</h3>
                            	<ul>
                                	<li><a href="#">订单详情</a></li>
                                </ul>	
                            </li>
                        </ul>
                        
                        <div class="docuLeft">
                        	<div class="docuTop">
                            	<h2>顾客信息</h2>
                            </div>
                            <table class="document">
                                <tbody>
                                    <tr class="docuhead">
                                        <th>序号</th>
                        				<th>用户名</th>
                       			 		<th>用户类型（0为顾客，1为商家）</th>
                        				<th>联系方式</th>
                        				<th>商家id</th>
                        				<th>删除记录</th>
                                    </tr>
                                    <?php 
                                    include("checkpostget.php");
                                    $judge = $_GET["judge"];
                                    $first_flag = $_GET["first"];
                                    $count = 0;
                                    $t_count = $_SESSION["count"];
                                    
                                    if($judge == 1) {
                                    	$_SESSION["count"] = $t_count + 3;
                                    	$t_count = $_SESSION["count"];
                                    }
                                    else if($judge == 0) {
                                    	$_SESSION["count"] = $t_count - 3;
                                    	$t_count = $_SESSION["count"];
                                    	if($t_count == 0) {
											$_SESSION["count"] == 0;
										}
                                    }
                                    
                                    $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
                                    if($link)
                                    {
                                    	mysql_select_db(SAE_MYSQL_DB,$link);
                                    	//your code goes here
                                    	mysql_query('set name "uft-8"');
                                    
                                    	$result = mysql_query('SELECT * FROM `app_yunprinter`.`db_user`');
                                    	if($first_flag == 2) { 
											$_SESSION["count"] = 0;
                                    		$t_count = 0;
                                    		$first_flag = 3;
                                    	}
                                    	for($i=0; $i<$t_count; $i++)
                                    		mysql_fetch_assoc($result);
                                    	while($tmp = mysql_fetch_assoc($result)){
											if($count++ <11) //每页显示10个数据
											{
                                    		?>
                                    		<tr align="center">
        									<td><?php echo $tmp["id"] ?></td>
        									<td><?php echo $tmp["name"] ?></td>
        									<td><?php echo $tmp["type"] ?></td>
        									<td><?php echo $tmp["phone"] ?></td>
        									<td><?php echo $tmp["shop_id"] ?></td>
        									<td><?php echo '<a href="mysql_operates.php?id='.$tmp["id"].'">删除</a>';?></td>
        									</tr>
        									<?php 
											}
        									if($count == 10)
        									{
        										$count = 0;
        										mysql_close($link);
        										break;
        									}
        							 	}
                                  	}
        					        ?>
                                </tbody>
                            </table>
                        	<div class="docuTop docuTop1">
                        		<a href="javascript:;" onclick="goLast()">上一栏</a>
                        	    <a href="javascript:;" onclick="goNext()">下一栏</a>
                            	
                            </div>
                        </div>
                        
                </div>
            </div>
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
        
        <script src="js/register.js" type="text/javascript"></script>
    </body>
</html>
