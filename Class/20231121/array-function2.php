<h2>array_merge</h2>
<?php
$arr1=[
    "name"=>"Sherri",
    2,
    3
];

$arr2=[
    "a",
    "b",
    "name"=>"Diana",
    "age"=>25,
    4
];

$result=array_merge($arr1,$arr2);
?>

<pre>
    <?php
    print_r($result);
    ?>
</pre>

<!-- If there are duplicate keys, the values from the second array ($arr2) overwrite the values from the first array ($arr1). 其他的會依序排列-->

<h2>array_merge_recursive</h2>
<!-- duplicate keys are handled by creating an array that contains both values. This is why the values for "name" and "0" are now arrays. -->
<?php
$result2=array_merge_recursive($arr1,$arr2);
?>

<pre>
    <?php
    print_r($result2);
    ?>
</pre>


<h2>compact</h2> 
<!-- 使用變數名稱作為鍵，並將它們的值作為值，創建一個關聯數組。-->
<?php
$var1="green";
$var2="yellow";
$var3="blue";
$myArr=compact("var1","var2","var3");
var_dump($myArr);
echo "<br>";
?>


<?php
$user=[
    "name"=>"Sherri",
    "email"=>"Sherri@test.com"
    ];
$products=[
    [
        "id"=>1,
        "name"=>"item1"
    ],
    [
        "id"=>2,
        "name"=>"item2"
    ],
    [
        "id"=>3,
        "name"=>"item3"
    ]
    
    ];
    $data=compact("user","products");
    ?>
<pre>
    <?php print_r($data)  ?>
</pre>

<div>
    hi, <?= $data["user"]
    ["name"]
    ?>.
</div>

<!-- Creates an associative array using the variable names provided as arguments to compact. The keys of the array will be the variable names, and the values will be the values of those variables. -->

<h2>array_chunk</h2>
<?php
$arr3=["a","b","","c","d","e"];
$result_chunk=array_chunk($arr3,3);
?>
<pre>
    <?php print_r($result_chunk)
    
    ?>
</pre>

<h2>array_combine()</h2>
<?php 
$c=["Sherri","Diana"];
$d=[28,32];
$result_combine=array_combine($c,$d);
var_dump($result_combine);
?>
