<?php
session_start();
if (session_destroy())
{
?>
logout ok!
<?php
}else
{
?>
logout failed!
<?php
}
//上面这个，一定要放在最开始！！不要动！！！！
?>