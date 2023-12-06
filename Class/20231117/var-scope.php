<?php
$a=99;

function show(){
    $b=10;//區域變數
    $a=$GLOBALS["a"];//要用這個去拿全域變數
    static $c=1;// static靜態變數，在程式結束之前會紀錄變化 

    echo "a is $a.<br>";//無法直接拿全域變數
    echo "b is $b.<br>";
    echo "c is $c.<br>";
    echo "<hr>";
    $b++;//不會逐步加1
    $c++;//會逐步加1



    //雙引號單引號差別
    // 雙引號允許變數插值，即在字串中直接使用變數，PHP 會將其替換為變數的實際值。
    // 單引號不進行變數插值，會直接將變數名稱當作普通的字串。
}

show();
show();
show();