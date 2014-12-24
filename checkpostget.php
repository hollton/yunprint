<?php      

//要过滤的非法字符      
$ArrFiltrate=array("/'/","/;/","/union/i");      
//出错后要跳转的url,不填则默认前一页      
$StrGoUrl="";      
//是否存在数组中的值      
function FunStringExist($StrFiltrate,$ArrFiltrate){      
    foreach ($ArrFiltrate as $key=>$value){      //每次循环时，将ArrFiltrate当前单元中的值赋给$value,单元的键名赋给$key
        if (preg_match($value,$StrFiltrate)){    //返回$value匹配的次数，返回0或1，preg_match()在第一次匹配后会停止搜索
    return true;      
  }      
}      
return false;      
}      

//合并$_POST 和 $_GET      
if(function_exists(array_merge)){      
  $ArrPostAndGet=array_merge($HTTP_POST_VARS,$HTTP_GET_VARS);      
}else{      
  foreach($HTTP_POST_VARS as $key=>$value){      
    $ArrPostAndGet[]=$value;      
  }      
  foreach($HTTP_GET_VARS as $key=>$value){      
    $ArrPostAndGet[]=$value;      
  }      
}      

//验证开始      
foreach($ArrPostAndGet as $key=>$value){      
  if (FunStringExist($value,$ArrFiltrate)){      
    echo "<script language=\"javascript\">alert(\"非法字符\");</script>";      
    if (empty($StrGoUrl)){      
    echo "<script language=\"javascript\">history.go(-1);</script>";      
    }else{      
    echo "<script language=\"javascript\">window.location=\"".$StrGoUrl."\";</script>";      
    }      
    exit;      
  }      
}      
?> 