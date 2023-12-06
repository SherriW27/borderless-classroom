<?php

session_start();

$_SESSION["name"]="Sherri";

echo $_SESSION["name"];

echo "<hr>";
var_dump($_SESSION["user"]);
echo "<hr>";
var_dump($_SESSION);
unset($_SESSION["name"]); //刪除特定 session
echo "<hr>";
var_dump($_SESSION);
?>