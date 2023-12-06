<?php
require_once("../db_connect.php");


$sql="SELECT * FROM users WHERE name LIKE '%Ji%'";//%正規表達式
//含有ji就算

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);

$conn->close();
?>