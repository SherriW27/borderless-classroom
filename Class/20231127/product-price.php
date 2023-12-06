<?php
require_once("../db_connect.php");

$sql="SELECT * FROM product WHERE price > 500"; //從名為 "product" 的資料表中選擇所有價格大於 500 的行

    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);//將查詢結果轉換為一個關聯數組（Associative Array）的數組，其中每一行數據都被表示為一個關聯數組。這樣，$rows 變數就包含了所有滿足條件的產品數據。
    var_dump($rows);

    $conn->close();


?>