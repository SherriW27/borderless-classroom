<?php
require_once("../db_connect.php");

// $sql="SELECT * FROM users"; //＊撈全部資料
$sql="SELECT id,name FROM users"; //撈部分欄位的資料

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);

?>