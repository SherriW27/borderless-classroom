<?php
$a=77;
$b="77";


var_dump($a==$b);//數字等於字串
echo "<br>";

var_dump($a>=$b);//一樣認為數字等於字串
echo "<br>";

var_dump($a===$b);//連型別一起判斷
echo "<br>";

$a=77;
$b="77";
var_dump($a!=$b);//the values are equal after type coercion
echo "<br>"; 

var_dump($a!==$b);//their types are different
echo "<br>";

?>