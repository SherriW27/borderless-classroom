<?php

require_once("../db_conntect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入";
    die;
}

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$time=date('Y-m-d H:i:s');

if(empty($name) || empty($email) || empty($phone)){
    echo "請輸入資料";
    die;
}

// echo "$name, $email, $phone";

$sql="INSERT INTO users (name, phone, email, created_at, valid)
VALUES ('$name', '$phone', '$email', '$time', 1)";
// echo $sql;
// exit;

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成, ";
    $last_id = $conn->insert_id;
    echo "最新一筆為序號".$last_id;
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

header("location: user-list.php");
