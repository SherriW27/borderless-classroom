<?php

session_start();

$_SESSION["name"]="Sherri";

echo $_SESSION["name"];
echo "<hr>";

$_SESSION["user"]=[
    "name"=>"Diana",
    "email"=>"Diana@test.com",
     "phone"=>"0912345678",
];// 注意此處的分號

var_dump($_SESSION["user"]);
?>