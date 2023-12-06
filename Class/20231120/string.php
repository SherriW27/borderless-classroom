<h2>單引號</h2>
<!-- 使用單引號時，字串中的變數名稱不會被解析，會直接顯示變數名稱本身 -->
<?php
$foo='This is a string.';
echo'foo is $foo.';
echo "<br>";
echo 'I said "go home"!';//不需要\
echo "<br>";
echo 'The path is C:\newpath';//跳脫序列會被直接視為普通字元
echo "<br>";
echo 'The path is C:\\newpath';//沒差
?>

<h2>雙引號</h2>
<!-- 使用雙引號時，可以在字串中直接包含變數，並且 PHP 會解析變數的值 -->
<?php
echo "foo is $foo."; 
echo "<br>";
echo "I said \"go home\"!"; //需要\
echo "<br>";
echo "The path is C:\newpath"; //會辨識\為跳行符號，\n表示換行
echo "<br>";
echo "The path is C:\\newpath"; //寫兩次\\跳脫
echo "<br>";
$time="a day";
echo "I earn \$10 dollars $time";
?>


<h2>字串連結</h2>
<?php
$num1=4+"3";
echo $num1;
echo "<br>";

$string="Hello";
$string=$string."World";
echo $string;
?>