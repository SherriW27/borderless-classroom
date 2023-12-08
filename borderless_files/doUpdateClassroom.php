<?php
require_once("../borderless_connect.php");

if (!isset($_POST["name"])) {
    echo "請循正常管道進入此頁";
    exit;
}

$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$price = $_POST["price"];
// echo $name;

$sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "更新成功";
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();

header("location: user-edit.php?id=$id");
