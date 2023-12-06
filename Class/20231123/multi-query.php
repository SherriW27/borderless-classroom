<?php

require_once("../db_connect.php");

$time=date('Y-m-d H:i:s');

$sql = "INSERT INTO users (name, phone, email,created_at)
	VALUES ('May', '0900000000', 'may@example.com','$time');";
	$sql .= "INSERT INTO users (name, phone, email,created_at)
	VALUES ('Sue', '0900000000', 'sue@example.com','$time');";
	$sql .= "INSERT INTO users (name, phone, email,created_at)
	VALUES ('Lucy', '0900000000', 'lucy@example.com','$time')";

    // echo $sql;
if ($conn->multi_query($sql) === TRUE) { //multi_query
    echo "新資料輸入成功";

} else {
    echo "Error: " .$sql."<br>". 
    $conn->error;
   
}

$conn->close();//確保資源得到及時釋放，避免背景任務
?>