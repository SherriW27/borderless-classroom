<?php
//CRUD的Ｕpdate

require_once("../db_connect.php");

$sql="UPDATE users SET phone='09123432423' WHERE id=2";


if ($conn->query($sql) === TRUE) {
    echo "更新成功,";

} else {
    echo "更新資料錯誤: " . 
    $conn->error;
   
}
$conn->close();


//還沒連回主要php不會有反應
?>