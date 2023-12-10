<?php

if (!isset($_GET["id"])) {
    header("location: tables.php");
}

$id = $_GET["id"];


require_once("../borderless_connect.php");

// $conn = new mysqli($servername, $username, $password, $dbname);
// // 檢查連線


$sql = "SELECT * FROM classroom WHERE id=$id";

if (!$conn->query($sql)) {
    die("連線失敗: " .
        $conn->connect_error);
    exit;
} else {
    echo "資料庫連線成功";
}

// $result = $conn->query($sql);
// $classroomCount = $result->num_rows;

$row = $result->fetch_assoc();

var_dump($row);
