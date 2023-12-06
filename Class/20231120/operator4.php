<h2>條件運算子</h2>
<?php
$a=10;
$b=($a>0)?"Positive":"Negative";
echo $b;
?>
<h2>組合比較子</h2>
<?php
$a=5;
$b=10;
echo $a<=>$b;
// 若 $a < $b：回傳 -1
// 若 $a = $b：回傳 0
// 若 $a > $b：回傳 1

?>
<h2>邏輯運算子</h2>
<?php
$x=10;
$y=5;
var_dump($x==10 and $y==5);// true
echo"<br>";
var_dump($x==10 && $y==10);// false
echo"<br>";
var_dump($x==10 or $y==5);// true
echo"<br>";
var_dump($x==10 || $y==5);// true
?>

<h2>xor 運算子</h2>
<?php
$x=10;
$y=5;
var_dump(($x==10 xor $y==5));//false
echo"<br>";
var_dump(($x==5 xor $y==10));//false
echo"<br>";
var_dump(($x==10 xor $y==10));//true
?>
<!-- The XOR operator (xor) returns true if either $x or $y is true, but not both. -->

<h2>優先層級</h2>
<?php
$boolean=false||true; //這句話對的話就是true
var_dump($boolean);
echo"<br>";
$boolean=false or true; //這句話對的話就是true？？
var_dump($boolean);
?>

<h2>參考運算子</h2>
<?php
$m=10;
$n=$m;
echo "m is:$m<br>";
echo "n is:$n<br>";
$n=5; //覆蓋舊$n
echo "m is:$m<br>";
echo "n is:$n<br>";
echo"<hr>";

$o=10;
$p=&$o;//參考運算子 The reference operator (&) is used to create a reference to a variable. Any changes made to the referenced variable also affect the original variable.
echo"o is: $o<br>";
echo"p is: $p<br>";
$p=5;
echo "o is: $o"
?>
