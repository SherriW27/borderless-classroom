<h2>算術運算子</h2>
<?php
$a=3;
$b=2;
echo -$a."<br>";
echo "$a+$b=";
echo $a+$b;
echo"<br>";

echo "$a-$b=";
echo $a-$b;
echo"<br>";

echo "$a*$b=";
echo $a*$b;
echo"<br>";

echo "$a/$b=";//顯示
echo $a/$b;//計算
echo"<br>";

echo "$a%$b=";
echo $a%$b;
echo"<br>";

echo "$a**$b=";
echo $a**$b;
echo"<br>";

echo "\$a++:";//避免讓 PHP 誤解 $a 是一個變數
$a++;//Post-increment
echo $a;
echo "<br>";

echo"++\$a:"; // Pre-increment 
++$a;
echo $a;
echo "<br>";

echo"\$a*5:";
$a*=5;
echo $a;
echo"<br>";


$string="Hello"; // Concatenate and assign
$string.="World";
echo $string;

?>