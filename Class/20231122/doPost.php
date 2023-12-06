<?php

// 將數據隱藏在 HTTP 請求的消息主體中，對用戶不可見。
if(!isset($_POST["email"])||!isset($_POST["password"])){
    echo"請循正常管道進入此頁";
    exit;
}
 
$email=$_POST["email"];
$password=$_POST["password"];
$phones=$_POST["phones"];//為什麼會有兩個phone
$gender=$_POST["gender"];
$telecom=$_POST["telecom"];


//過濾掉陣列中的空值??
$phones=array_filter($phones);
// var_dump($phones);
// exit;


if(empty($email)){
    echo"email 不可為空";
    exit;
}

if(empty($password)){
    echo"password 不可為空";
    exit;
}

switch($telecom){
    case 1:
        $telecomName ="中華電信";
        break;
    case 2:
        $telecomName ="台灣大哥大";
    break;
    case 3:
        $telecomName ="遠傳電信";
    break;
}

echo "Email:$email, 
Password: $password,
Telecom is $telecomName,
Gender:$gender,
Phones:";


// foreach($phones as $phone){
//     echo $phone.",";
// }

//方法一
// for($i=0;$i<count($phones);$i++){
//     if($i==(count($phones)-1)){
//         echo $phones[$i];
//         break;
//     }
//     echo $phones[$i].",";
// }
//方法二???
echo implode(",",$phones);