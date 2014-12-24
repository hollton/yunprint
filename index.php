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
</head>
    <body>

        <?php
		include("header.php");
		?>
        <!-- main -->  
        <div class="main">
            <div class="mainTop">
                <div class="mainTopContain">
                    <div class="mainTopLeft">
                        <h1 class="title"></h1>
                        <p class="titleWord">在寝室就能打印，无需U盘，无需零钱，还不用排队哟~</p>
                        <a href="javascript:;" onclick="isLogin()" class="print">我要打印</a>
                        <div class="tips"></div>
                    </div>
                </div>
            </div>
            
            <div class="mainBottom">
                <dl class="mainBottomContain">
                    <dd>
                        <h2 class="title">上传文档</h2>

                        <p class="words">支持doc、ppt及pdf格式文件</p>
                    </dd>
                    <dt></dt>
                    <dd>
                        <h2 class="title">打印设置</h2>

                        <p class="words">设置打印份数，单双面以及装订方式</p>
                    </dd>
                    <dt></dt>
                    <dd>
                        <h2 class="title">快捷支付</h2>

                        <p class="words">通过支付宝便捷支付，填写配送地址</p>
                    </dd>
                    <dt></dt>
                    <dd>
                        <h2 class="title">线下取单</h2>

                        <p class="words">等待店铺君的电话骚扰吧~</p>
                    </dd>
                </dl>
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
        
        <!-- 注册 --> 
        <div id="hreg">
        	<div class="mask"></div>
            <form action="http://yunprinter.sinaapp.com/reg_db.php" method="post">
                <table class="tableBox" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="formTop">
                                    <dl class="clearfix">
                                        <dd class="formLeft">用户注册</dd>
                                        <dt class="formRight">
                                            <span>已有帐号？</span><a class="login" href="javascript:;" onclick="goLog()">登录</a>
                                            <a href="javascript:;" onclick="_close()">
                                                <img src="images/close.gif">
                                            </a>
                                        </dt>
                                    </dl>
                                </div>
                                
                                <div class="formBottom" id="formReg">
                                    <div class="reg" id="error">							
                                        <dl class="clearfix">
                                            <dd>用户名：</dd>
                                            <dt><input placeholder="输入一个喜欢的名字吧~" id="user" type="text" name="name" onblur="return check0()"/></dt>
                                            <dt class="error" id="_error">允许3~20字符且为英文、数字或下划线组合</dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                        <dd>密码：</dd>
                                        <dt><input id="psw" placeholder="允许5~20个字符" type="password" name="password" onblur="return check1()"/></dt>
                                        <dt class="error" id="_error">允许6~20字符且为英文、数字或下划线组合</dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                        <dd>确认密码：</dd>
                                        <dt><input id="conPsw" placeholder="请再次输入密码" type="password" name="password_very" onblur="return check2()"/></dt>
                                        <dt class="error" id="_error">密码输入不一致</dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                        <dd>手机号：</dd>
                                        <dt><input id="phone" placeholder="留个联系方式呗~" type="text" name="phone" onblur="return check3()"/></dt>
                                        <dt class="error" id="_error">还好我机智，这根本不是手机号码</dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                            <input id="shoper" type="checkbox" name="is_shoper" value="true">&nbsp;我是商家
                                            <input id="regiter" type="submit" value="注册" />
                                        </dl>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
        	</form>
        </div>
        
        <!-- 登录 -->
        <div id="hlog">
        	<div class="mask"></div>
            <form action="http://yunprinter.sinaapp.com/login_db.php" method="post">
                <table class="tableBox" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="formTop">
                                    <dl class="clearfix">
                                        <dd class="formLeft">用户登录</dd>
                                        <dt class="formRight">
                                            <span>还没有帐号？</span><a class="login" href="javascript:;" onclick="goReg()">点此注册</a>
                                            <a href="javascript:;" onclick="_close()">
                                                <img src="images/close.gif">
                                            </a>
                                        </dt>
                                    </dl>
                                </div>
                                
                                <div class="formBottom">
                                    <div class="reg" id="error">							
                                        <dl class="clearfix">
                                            <dd>用户名：</dd>
                                            <dt><input placeholder="" id="user" type="text" name="name" /></dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                        <dd>密码：</dd>
                                        <dt><input id="psw" placeholder="" type="password" name="password" /></dt>
                                        </dl>
                                        
                                        <dl class="clearfix">
                                            <input id="regiter" class="login" type="submit" value="登录" />
                                            <a id="forget" href="javascript:;">忘记密码？</a>
                                        </dl>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
        	</form>
        </div>

        <script src="js/register.js" type="text/javascript"></script>
    </body>
</html>
