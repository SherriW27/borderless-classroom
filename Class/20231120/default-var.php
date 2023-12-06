<h2>$GLOBALS</h2>
<?php
$num=2;
//關聯式陣列
echo $GLOBALS["num"];
//是一個陣列，可以存取此程式範圍的所有全域變數

?>
<!-- 字串跟變數合起來用. -->
<h2>$_ENV</h2> 
<?php var_dump($_ENV); //superglobal array containing environment variables.
?>
<h2>$_SERVER</h2>
<?php 
echo "PHP_SELF:".$_SERVER["PHP_SELF"]."<br>";//目前程式檔案的相對路徑

echo "SERVER_ADDR:".$_SERVER["SERVER_ADDR"]."<br>";//網頁伺服器的IP位置 IP address of the server

echo "SERVER_NAME:".$_SERVER["SERVER_NAME"]."<br>";//Server name

echo "REQUEST_TIME:".$_SERVER["REQUEST_TIME"]."<br>";//Timestamp 時間戳記 when the request was received
echo "REMOTE_ADDR:".$_SERVER["REMOTE_ADDR"]."<br>";//遠端（使用者瀏覽器端）的IP位置  IP address of the client (user's browser)

echo "REMOTE_PORT:".$_SERVER["REMOTE_PORT"]."<br>";//遠端（使用者瀏覽器端）的連接埠位置 Port number on the client side

echo "HTTP_HOST:".$_SERVER["HTTP_HOST"]."<br>";//REQUEST中的HOST資訊內容


echo "DOCUMENT_ROOT
:".$_SERVER["DOCUMENT_ROOT
"]."<br>";//網站根目錄的路徑 Root directory of the server

?>