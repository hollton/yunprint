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
                                	<li><a id="active" href="javascript:;">新建打印</a></li>
                                	<li><a href="myprint.php">我的打印</a></li>
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
                                <form action="upload_file.php" method="post" enctype="multipart/form-data">
								
								    <a href="javascript:file.click();" id="afile">
                                        <img id="newfile" src="images/file.png" />
										<input type="file" name="file" id="file" accept=".doc,.docx,.ppt,.pptx,.xls,.xlsx,.pdf" />
                                    </a>
                            
									<table class="document" id="document">
										<tbody>
											<tr class="docuhead">
												<th width="25%">打印设置</th>
												<th width="25%">打印份数</th>
												<th width="25%">选择商家</th>
												<th width="25%">备注</th>
											</tr>
											<tr class="odd" style="display:table-row;">
												<td>
													<select id="print_type" name="print_type">
														<option value="-1">黑白单页</option>
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
												</td>
												<td><button type="button" class="sub">-</button>&nbsp;<span class="num">1</span>&nbsp;<button type="button" class="add">+</button></td>
												<td>
													<select id="shop_id" name="shop_id">
														<option value="-1">请选择商家</option>
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
												</td>
												<td><input type="text" placeholder="如：10分钟后领取" maxlength="30" /></td>
											</tr>
										</tbody>
									</table>
											
									<input type="submit" name="submit" id="goprint" value="上传打印" />
                                </form>
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
