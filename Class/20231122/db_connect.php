<?php
$servername = "localhost";
$username = "admin";
$password = "12345";
$dbname = "mydb";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// 檢查連線
//這裡是瘦箭頭取得物件、執行方法
// 胖箭頭定義陣列
if ($conn->connect_error) {
  	die("連線失敗: " .
     $conn->connect_error);
}else{
    echo"資料庫連線成功";
}


?>