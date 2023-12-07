<?php

require_once("./borderless_connect.php");

if (!isset($_POST["name"])) {
    echo "請循正常管道進入此頁";
    die;
}

$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$price = $_POST["price"];
//??

$time = date('Y-m-d H:i:s');


echo "$id,$name,$address,$phone,$price";

if (empty($name) || empty($address) || empty($phone) || empty($price)) {
    echo "請輸入資料";
    die;
} //seems not work

// $sql = "INSERT INTO borderless_db(name, phone, email,created_at)
// VALUES ('$name', '$phone', '$email','$time')";
// echo $sql;
// exit;



// if ($conn->query($sql) === TRUE) {
//     echo "新增資料完成,";

//     $last_id = $conn->insert_id;
//     echo "最新一筆為序號" . $last_id;
// } else {
//     echo "新增資料錯誤: " .
//         $conn->error;
// }

// $conn->close();

// header("location:user-list.php"); //導回資料輸入頁面
