<?php
//CRUD的Ｕpdate

require_once("../../db_connect.php");

$sql = "UPDATE users SET phone='09123432423' WHERE id=2";


if ($conn->query($sql) === TRUE) {
    echo "更新成功,";
} else {
    echo "更新資料錯誤: " .
        $conn->error; //如果發生錯誤，這行程式碼會印出 "更新資料錯誤" 以及錯誤訊息。
}
$conn->close();


//還沒連回主要php不會有反應
