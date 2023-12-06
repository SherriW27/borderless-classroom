<?php
//$array=array(1,2,3,4,5); 舊寫法
$array=[1,2,3,4,5];
var_dump($array);
echo"<br>";
$arr2[0]="apple";
$arr2[1]="banana";
$arr2[2]="peach";
var_dump($arr2);
echo"<br>";
$users[]="Joe";//也可以不要填序數，會有類似push自動填入的功能
$users[]="Sherri";
$users[]="Mandy";
$users[]="Will";
var_dump($users);
?>

<h2>多維陣列</h2>
<?php
$arr3[0][0]="00";
$arr3[0][1]="01";
$arr3[1][0]="10";
$arr3[1][1]="11";
var_dump($arr3);
echo"<br>";

$arr4=[
    ["00","01"],
    ["10","11"],
];
var_dump($arr4);
?>
<hr>

<?php
$name=["John","Sam","Mery"];
$height=["188","173","165"];
$weight=["83","72","50"];
$students=[$name,$height,$weight];
var_dump($students);
echo "<br>"

?>
<!-- 可以看得清楚一些 -->
<pre>
    <?php print_r($students); ?> 
</pre>

<?php 
echo 
$students[0][0]."'s height is". $students[1][0]."cm,weight is ".$students[2][0]."kg";
?>