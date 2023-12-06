<?php
//通常用在顯示資料，會直接顯示在網址
$email=$_GET["email"];
$password=$_GET["password"];

//避免使用者從網址進入
//加驚嘆號的用意？

//檢查是否存在名為 "email" 的 GET 參數
if(!isset($_GET["email"])){
    echo"請循正常管道進入此頁";
    exit;
}


// isset 和empty  的差別？？
if(empty($email)){
    echo"email 不可為空";
    exit;
}

if(empty($password)){
    echo"password 不可為空";
    exit;
}


echo "$email,$password";