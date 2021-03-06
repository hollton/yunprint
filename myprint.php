<?php
session_start();
//上面这个，一定要放在最开始！！不要动！！！！
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
                        <dd>欢迎您，<a href="myaccount.php"><?=$_SESSION["uname"]?></a>
                        <dt></dt>
                        <dd><a href="newprint.php">去打印</a></dd>
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
                                	<li><a href="newprint.php">新建打印</a></li>
                                	<li><a id="active" href="javascript:;">我的打印</a></li>
                                </ul>	
                            </li>
                        	<li class="order"><h3>我的帐号</h3>
                            	<ul>
                                	<li><a href="myaccount.php">帐号信息</a></li>
                                	<li><a href="mypsw.php">修改密码</a></li>
                                </ul>	
                            </li>
                        </ul>
                        
                        <div class="docuLeft">
                        	<div class="docuTop">
                            	<h2>我的打印</h2>
                            </div>
                            <table class="document" id="document">
                                <tbody>
                                    <tr class="docuhead">
                                        <th width="30%">文档名称</th>
                                        <th width="25%">打印方式</th>
                                        <th width="10%">打印页数</th>
                                        <th width="25%">打印商家</th>
                                        <th width="10%">打印总价</th>
                                    </tr>
                                    
                                    <tr class="odd">
                                        <td>打印1</td>
                                        <td>黑白单页</td>
                                        <td>20</td>
                                        <td>慈园门口</td>
                                        <td><span class="price">1.2</span>元</td>
                                    </tr>
                                    
                                    <tr class="even">
                                        <td>打印2</td>
                                        <td>黑白单页</td>
                                        <td>20</td>
                                        <td>慈园门口</td>
                                        <td><span class="price">1.2</span>元</td>
                                    </tr>
                                </tbody>
                            </table>
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
    
    <script src="js/print.js" type="text/javascript"></script>
    </body>
</html>
