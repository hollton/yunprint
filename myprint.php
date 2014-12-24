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
                                	<li><a href="newprint.php">新建打印</a></li>
                                	<li><a id="active" href="javascript:;">我的打印</a></li>
                                </ul>	
                            </li>
                        	<li class="order"><h3>我的帐号</h3>
                            	<ul>
                                	<li><a href="mypsw.php">修改密码</a></li>
                                	<li><a href="myaddress.php">管理收件地址</a></li>
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
                                        <th width="20%">文档名称</th>
                                        <th width="10%">订单号</th>
                                        <th width="5%">页数</th>
                                        <th width="10%">单双页</th>
                                        <th width="10%">色彩</th>
                                        <th width="10%">打印份数</th>
                                        <th width="10%">总价</th>
                                        <th width="20%">送货地址</th>
                                        <th width="5%">删除</th>
                                    </tr>
                                    
                                    <tr class="odd">
                                        <td>打印</td>
                                        <td>001</td>
                                        <td class="pages">8</td>
                                        <td><select class="sd"><option value="2">双页</option><option value="1">单页</option></select></td>
                                        <td><select class="bc"><option value="black">A4黑白</option><option value="color">A4彩色</option></select></td>
                                        <td><button type="button" class="sub">-</button>&nbsp;<span class="num">0</span>&nbsp;<button type="button" class="add">+</button></td>
                                        <td><span class="price">0</span>元</td>
                                        <td><input class="address" readonly="readonly" value="合工大8号楼" /><a class="change" href="javascript:;">修改</a></td>
                                        <td><a class="close" href="javascript:;"><img src="images/close.gif" /></a></td>
                                    </tr>
                                    
                                    <tr class="even">
                                        <td>打印</td>
                                        <td>001</td>
                                        <td class="pages">8</td>
                                        <td><select class="sd"><option value="2">双页</option><option value="1">单页</option></select></td>
                                        <td><select class="bc"><option value="black">A4黑白</option><option value="color">A4彩色</option></select></td>
                                        <td><button type="button" class="sub">-</button>&nbsp;<span class="num">0</span>&nbsp;<button type="button" class="add">+</button></td>
                                        <td><span class="price">0</span>元</td>
                                        <td><input class="address" readonly="readonly" value="合工大8号楼" /><a class="change" href="javascript:;">修改</a></td>
                                        <td><a class="close" href="javascript:;"><img src="images/close.gif" /></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        	<div class="docuTop docuTop1">
                            	<a href="javascript:;">确认下单</a>
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
    
    <script src="js/print.js" type="text/javascript"></script>
    </body>
</html>
