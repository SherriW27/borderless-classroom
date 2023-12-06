<?php

setcookie("account","Sherri",time()+3600,"/");

echo $_COOKIE["account"];

//不會馬上顯示結果
?>