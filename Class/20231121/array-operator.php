<?php
$a=["0","1","2"];
$b=[0,1,2];


var_dump($a==$b);
echo "<br>";
var_dump($a===$b);
echo "<br>";
var_dump($a!=$b);
echo "<br>";
var_dump($a<>$b);
echo "<br>";
var_dump($a!==$b);
echo "<br>";
?>

<h2>陣列的聯集</h2>
<?php

$c=[
    "john"=>["john",1],  
    "Sam"=>["Sam",2]
    
    ];

$d=[
"john"=>["john",3],
"Mary"=>["Mary",4]

];

$e=$c+$d;

// the values from the left operand ($c) will be used, and duplicate values from the right operand ($d) will be ignored.
?>
<pre>
    <?php
    print_r($e); 
    ?>
</pre>
