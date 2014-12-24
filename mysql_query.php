<?php 
	header("Content-type: text/html; charset=utf-8");
?>

<html>
    <head>

        <title>查询数据库表信息</title>
    </head>
    <body>
                <table>
                <tbody>
                	<caption>学生一览表</caption>
                	<tr>
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
	//for($i=0; $i<3; $i++)
	//	mysql_fetch_array($result);
	while($tmp = mysql_fetch_assoc($result)){
	//	echo $tmp["id"];
	//	echo "\n";
	//	echo $tmp["name"];
	//	echo "\n";
	//	echo $tmp["type"];
	//	echo "\n";
	//	echo $tmp["phone"];
	//	echo "\n";
	//	echo $tmp["shop_id"];
	//	echo "<br>";
	?>
		<tr align="center">
        <td><?php echo $tmp["id"] ?></td>
        <td><?php echo $tmp["name"] ?></td>
        <td><?php echo $tmp["type"] ?></td>
        <td><?php echo $tmp["phone"] ?></td>
        <td><?php echo $tmp["shop_id"] ?></td>
        </tr>
	<?php 
	/*
		echo $tmp["id"];
		echo '</td>';
		echo '<td>';
		echo $tmp["name"];
		echo '</td>';
		echo '<td>';
		echo $tmp["type"];
		echo '</td>';
		echo '<td>';
		echo $tmp["phone"];
		echo '</td>';
		echo '<td>';
		echo $tmp["shop_id"];
		echo '</td>';
		echo '<td><a href="javascript:;"><img src="images/close.gif" /></a></td>';
		echo '</tr>';
		echo '</tbody>';
		echo '</table>';
		*/
	}
	
}
?>
         </tbody>
                    
         </table>
    </body>
</html>
