<?php

require_once("../db_connect.phpdbconne");



session_start();


if(!isset($_POST["email"])){
    echo"請循正常管道進入此頁";
   exit;
}

$email=$_POST["email"];
$password=$_POST["password"];

if(empty($email))
{
    // echo"請輸入email";
    $message="請輸入email";
    $_SESSION["error"]["message"]=$message;
    header("Location: sign-in.php");
    exit;

}

if(empty($password))
{
    // echo"請輸入密碼";
    $message="請輸入password";
    $_SESSION["error"]["message"]=$message;
    header("Location: sign-in.php");
    exit;
    
}

$password=md5($password);


// echo $email.",".$password;

$sql="SELECT id,name,email,phone FROM user WHERE email='$email' AND password='$password'AND valid=1";

$result=$conn->query($sql);

if($result->num_rows==0)
{
    if(isset($_SESSION["error"]["times"])){
        $_SESSION["error"]["times"]++ ;
    }
    else{
        $_SESSION["error"]["times"]=1;
    }
   exit;
}
{
    $message="帳號密碼錯誤";
    $_SESSION["error"]["message"]=$message;
    header("Location: sign-in.php");
    exit;
}
echo "登入成功";

$row=$result->fetch_assoc();

$_SESSION["user"]=$row;
// var_dump($row);
header("Location: dashboard.php");
exit;



$conn->close();

?>