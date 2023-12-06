<?php
require_once("../db_connect.php");


$sql="SELECT * FROM users WHERE id=2"; //撈部分資料
//用獨一無二的資料當篩選機制

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);//fetch all多維陣列

// var_dump($rows);
// echo"<br>";
// echo $rows[0]["name"]; //多維陣列的截取方式

$row=$result->fetch_assoc();
var_dump($row);
echo"<br>";
echo $row["name"];  //單筆資料可以直接用一維陣列的截取方式




?>