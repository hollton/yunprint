
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
				
				if(empty($_SESSION["uname"]))
				{
					?>
                        <dd><a href="javascript:;" onclick="goLog()">登录</a></dd>
                        <dt></dt>
                        <dd><a href="javascript:;" onclick="goReg()">注册</a></dd>
					<?php
				}else
				{
					?>
                        <dd>欢迎您，<?=$_SESSION["uname"]?>
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
                        	<li class="order"><h3>打印订单</h3>
                            	<ul>
                                	<li><a id="active" href="#">新建打印</a></li>
                                	<li><a href="#">我的打印</a></li>
                                </ul>	
                            </li>
                        	<li class="order"><h3>我的帐号</h3>
                            	<ul>
                                	<li><a href="#">修改密码</a></li>
                                	<li><a href="#">管理收件地址</a></li>
                                </ul>	
                            </li>
                        </ul>
                        
                        <div class="docuLeft">
                        	<div class="docuTop">
                            	<h2>新建打印</h2>
								<input type="file" name="file" id="file" value="+&nbsp;添加"/> 
                                <a href="javascript:;">+&nbsp;添加</a>
                            </div>
                            <table class="document">
                                <tbody>
                                    <tr class="docuhead">
                                        <th>序号</th>
                        				<th>用户名</th>
                       			 		<th>用户类型（0为顾客，1为商家）</th>
                        				<th>联系方式</th>
                        				<th>商家id</th>
                                    </tr>
                                    <?php 
                                    $link=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
                                    if($link)
                                    {
                                    	mysql_select_db(SAE_MYSQL_DB,$link);
                                    	//your code goes here
                                    	mysql_query('set name "uft-8"');
                                    
                                    	$result = mysql_query('SELECT * FROM `app_yunprinter`.`db_user`');
                                    	while($tmp = mysql_fetch_assoc($result)){
                                    ?>
                                    <tr align="center">
        							<td><?php echo $tmp["id"] ?></td>
        							<td><?php echo $tmp["name"] ?></td>
        							<td><?php echo $tmp["type"] ?></td>
        							<td><?php echo $tmp["phone"] ?></td>
        							<td><?php echo $tmp["shop_id"] ?></td>
        							</tr>
        							<?php 
        								}
                                    }
        							?>
                                </tbody>
                            </table>
                        	<div class="docuTop docuTop1">
                            	<a href="javascript:;">下一步</a>
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
    </body>
</html>
