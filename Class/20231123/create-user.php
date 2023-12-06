<?php
require_once("../db_connect.php");

$sql = "INSERT INTO users (name, phone, email)VALUES ('Sherri', '0900000000', 'john@example.com')
";

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . 
    $conn->error;
   
}

$conn->close();
?>