<?php
require_once("../db_connect.php");


$sql= "ALTER TABLE users DROP COLUMN age;";

if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " .
     $conn->error;
}

$conn->close();
?>