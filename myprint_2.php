<?php
session_start();
//上面这个，一定要放在最开始！！不要动！！！！
if(empty($_SESSION["uname"]))
{
	?>
		没登陆！滚蛋！
	<?php
	exit();
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
                                	<li><a href="manage_psw.php">修改密码</a></li>
                                	<li><a href="address.php">管理收件地址</a></li>
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
										<th width="10%">订单ID</th>
                                        <th width="10%">文档名称</th>
										<th width="10%">打印店名称</th>
                                        <th width="5%">页数</th>
										<th width="10%">色彩</th>
                                        <th width="10%">打印方式</th>
                                        <th width="10%">打印份数</th>
                                        <th width="10%">总价</th>
                                        <th width="10%">状态</th>
                                    </tr>
                                    <?php
									$mysql = new SaeMysql();
									$sql = "SELECT * FROM `db_task` WHERE `user_id`={$_SESSION["uid"]}"; 
									$data = $mysql->getData( $sql );
									if ($mysql->errno() != 0)
									{
										die("Error:" . $mysql->errmsg());
									}else
									{
										for($i=0;$i<count($data);$i++)
										{
											$show_type="";
											if($i%2)
											{
												$show_type="odd";
											}else
											{
												$show_type="even";
											}
											$str_color="";
											if($data[$i]['is_color'])
											{
												$str_color="彩印";
											}else
											{
												$str_color="黑白印";
											}
											$stor = new SaeStorage();
											$file_url = $stor->getUrl("yunprinter",$data[$i]['file_name']);
											$str_page="未指定";
											if($data[$i]['page']>0)
											{
												$str_page=$data[$i]['page'];
											}
											$sql="SELECT * FROM `db_print_type` WHERE `id`={$data[$i]['print_type_id']}";
											$type_data=($mysql->getData( $sql ));
											if ($mysql->errno() != 0)
											{
												die("Error:" . $mysql->errmsg());
											}
											$sql="SELECT * FROM `db_shop` WHERE `id`={$data[$i]['shop_id']}";
											$shop_data=($mysql->getData( $sql ));
											if ($mysql->errno() != 0)
											{
												die("Error:" . $mysql->errmsg());
											}
											$str_print_type = $type_data[0]['name'];
											$price=$type_data[0]['kpage']*$data[$i]['page']*$shop_data[0]['price_per_side'];
											$str_sta="";
											if(!$data[$i]['paid'])
											{
												$str_sta="未支付";
											}else 
											{
												if(!$data[$i]['printed'])
												{
													$str_sta="待打印";
												}else
												{
													$str_sta="已完成打印，请到{$shop_data[0]['address']}领取";
												}
											}
											?>
											<tr class="<?=$show_type?>">
												<td><?=$data[$i]['id']?></td>
												<td><a href=<?=$file_url?> target="_blank"><?=$data[$i]['file_title']?></a></td>
												<td><?=$shop_data[0]['name']?></td>
												<td><?=$str_page?></td>
												<td><?=$str_color?></td>
												<td><?=$str_print_type?></td>
												<td><?=$data[$i]['times']?></td>
												<td><?=$price?>元</td>
												<td><?=$str_sta?></td>
											</tr>
											
											<?php
										}
									}
									?>
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
