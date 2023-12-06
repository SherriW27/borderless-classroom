<?php
require_once("../db_connect.php");

if (!isset($_POST["email"])) {
    echo "請循正常管道進入此頁";
    exit;
}

$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];

// echo "$email,$name,$password,$repassword";


if (empty($email) || empty($name) || empty($password) || empty($repassword)) {
    echo "請輸入必填欄位";
    exit;
}

if ($password != $repassword) {
    echo "前後密碼不一致";
    exit;
}

$sql = "SELECT * FROM users WHERE email='$email'"; //撈部分欄位的資料

$result = $conn->query($sql);
$rowCount = $result->num_rows;
// echo $rowCount;
if ($rowCount > 0) {
    die("此帳號已經存在");
}

$password = md5($password); //加密密碼

$time = date('Y-m-d H:i:s');
$sql = "INSERT INTO users (name, password, email,created_at,valid)VALUES ('$name', '$password', '$email','$time',1)";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成,";

    $last_id = $conn->insert_id;
    echo "最新一筆為序號" . $last_id;
} else {
    echo "新增資料錯誤: " .
        $conn->error;
}
//尚未成功寫入資料庫
$conn->close();


header("location:sign-up.php");
