<?php
// require_once("../db_connect.php");

// $sql = "ALTER TABLE users CHANGE COLUMN  userName name VARCHAR(30)";

// if ($conn->query($sql) === TRUE) {
//     	echo "資料表 users 修改完成";
//   } else {
//     	echo "修改資料表錯誤: " . 
//         $conn->error;
//   }

// $conn->close();
?>

<?php
require_once("../db_connect.php");

$sql = "ALTER TABLE users CHANGE COLUMN userName name VARCHAR(30), ADD INDEX(name)";

if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
    // 選擇性地，你可以將錯誤記錄到檔案以供進一步調查
    error_log("MySQL 錯誤: " . $conn->error);
}

$conn->close();
?>
