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
    	<!-- header -->
        <div class="header">
            <div class="head">
                <a href="javascript:;" class="logo"></a>
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
                        <dd><a href="#">我的账号</a></dd>
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
			<!-- 商家注册 --> 
			<div id="sreg">
				<form action="http://yunprinter.sinaapp.com/reg_shop_db.php" method="post">
					<table cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td>
									<div class="formTop">
										<dl class="clearfix">
											<dd class="formLeft">商家注册</dd>
										</dl>
									</div>
									
									<div class="formBottom" id="formReg">
										<div class="reg" id="error">	
											<dl class="clearfix">
												<dd>店铺名称：</dd>
												<dt><input id="shop" maxlength="20" placeholder="允许20字符以内" type="text" name="shoper" /></dt>
											</dl>
											
											<dl class="clearfix">
											<dd>店铺地址：</dd>
											<dt><input id="shopAdd" maxlength="30" placeholder="允许30个字符以内" type="text" name="address" /></dt>
											</dl>
											
											<dl class="clearfix">
											<dd>打印单价：</dd>
											<dt><input id="shopPri" placeholder="A4黑白单面打印价格" type="text" name="price" onblur="return s_check0()"/><span class="yuan">元</span></dt>
                                        	<dt class="error" id="serror0">输入不规范</dt>
											</dl>
											
											<dl class="clearfix">
											<dd>支付宝帐号：</dd>
											<dt><input id="shopAli" placeholder="用于收取打印费用" type="text" name="alipay" onblur="return s_check1()"/></dt>
											<dt class="error" id="serror1">输入不规范</dt>
											</dl>
											
											<dl class="clearfix">
											<dd>营业时间：</dd>
											<dt><input id="shopTime" placeholder="推荐格式：6:00-22:30" type="text" name="shophours" /></dt>
											</dl>
											
											<dl class="clearfix">
												<input id="regiter" type="submit" value="同意相关协议并注册" />
												<a id="agree" name="agree" href="javascript:;">《服务协议》</a>
											</dl>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
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

		<!-- 协议 --> 
		<div id="hreg">
        	<div class="mask"></div>
            <form>
				<div class="formTop">
					<dl class="clearfix">
						<dd class="formLeft">服务协议</dd>
						<dt class="formRight">
							<a href="javascript:;" onclick="_close()"><img title="关闭" alt="关闭" src="images/close.gif"></a>
						</dt>
					</dl>
				</div>
				
				<div class="agreeBottom">							
					<p>全都是协议</p>
				</div>
        	</form>
        </div>
		
        <script src="js/register.js" type="text/javascript"></script>
    </body>
</html>
