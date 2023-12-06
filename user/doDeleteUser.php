<?php
//軟刪除
require_once("../db_connect.php");

if(!isset($_GET["id"])){
    echo"請循正常管道進入此頁";
    exit;
}
//檢查是否有設定 GET 參數中的 "id"。如果 "id" 不存在，則顯示 "請循正常管道進入此頁"，然後結束程式


$id=$_GET["id"];
//將 GET 參數中的 "id" 值賦值給變數 $id。

$sql="UPDATE users SET valid='0' WHERE id=$id";
// echo $sql;
// exit;


if ($conn->query($sql) === TRUE) {
    	echo "刪除成功";
  } else {
    	echo "刪除資料錯誤: " . 
        $conn->error;
  }

  $conn->close();

  header("location:user-list.php");
?>