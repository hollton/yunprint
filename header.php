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