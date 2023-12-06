<?php
require_once("../pdo-connect.php");

$stmt = $conn->prepare("SELECT * FROM users WHERE valid=1");

//還沒完成
try {
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($rows);
    echo "資料庫連線成功";
} catch (PDOException $e) {
    echo "資料庫連線失敗: " . $e->getMessage();
}
$conn = null;
