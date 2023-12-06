<?php
require_once('../db_connect.php');

$title = $_POST['title'];
// echo $name;

// var_dump($_FILES["file"]);

if($_FILES["file"]["error"]==0)
//表示檔案成功上傳。
{
    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/",$_FILES["file"]["name"]))
    //使用 move_uploaded_file 函數將上傳的檔案移動到指定目錄。這裡的目錄是 ../upload/，檔案名稱使用 $_FILES["file"]["name"]。
    {
        echo "アップロード成功";

        $filename=$_FILES["file"]["name"];
        $time=date('Y-m-d H:i:s');

$sql="INSERT INTO images(title,name,created_at) VALUES('title','filename','$time')";

if ($conn->query($sql) === TRUE) 
// 執行 SQL 插入語句，並檢查是否成功
{
    echo "新增資料完成,";
    $last_id=$conn->insert_id;//獲取插入的最後一條記錄的 ID。
    echo "最新一筆序號".$last_id;//顯示最後一條記錄的 ID。
    header( "location:file.upload.php");//重定向到 file.upload.php，可能是重新載入包含上傳表單的頁面。
} else {
    echo "新增資料錯誤: " . 
    $conn->error;
   
}

        // echo $sql;

    }else{
        echo "アップロード失敗";
    }
}

// print_r( $_FILES["file"]);
?>
<!-- 還沒成功 -->