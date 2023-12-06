<h2>array_diff</h2>
<!-- $diff contains the values from $array1 that are not present in $array2. -->
<?php 
$array1 = [1, 2, 3, 4, 5];
$array2 = [3, 4, 5, 6, 7];

$diff = array_diff($array1, $array2);
print_r($diff);

?>
<h2>array_diff_assoc</h2>
<!-- considering both keys and values. -->

<h2>array_diff_intersect</h2>
<!-- $intersect contains the values that are common to both $array1 and $array2. -->

<h2>array_diff_intersect_assoc</h2>
<!-- returns the values that are common to both arrays, considering both keys and values. -->


<h2>array_sum</h2>
<!-- calculate the sum of all the values in an array.  -->
<?php
$arr=[2,4,5];
echo array_sum($arr);
?>

<h2>array_unique</h2>
<!-- emove duplicate values from an array. It returns a new array with only the unique values from the original array.

 -->
<?php

$input=[
    "a"=>"John",
    "Sam",
      "b"=>"John",
    "Sam","Mary"

];
$result=array_unique($input);
print_r($result);


?>


<h2>array_pad</h2>
<!-- pad an array to a specified length with a specified value. If the specified length is positive, the array is padded on the right; if it's negative, the array is padded on the left. -->
<?php


$inputArray = [1, 2, 3];
$paddedArray = array_pad($inputArray, 5, 0);

print_r($paddedArray);

?>

<h2>in_array()</h2>
<!-- check if a specified value exists in an array -->
<?php
$cars=["BMW","Toyota","Tesla","Honda"];
var_dump(in_array($car,$cars));
echo "<br>";
var_dump(in_array("Audi",$cars));
?>

<h2>array_search()</h2>
<?php
echo array_search($car,$cars);

?>

<h2>array_key_exists()</h2>
<!-- used to search for a value in an array and return the corresponding key if the value is found. If the value is not found, it returns false.

 -->
<?php
$students=[
    "John"=>101,
    "May"=>102

];
var_dump(array_key_exists("John",$students));
?>


<h2>asort</h2> vs <h2>arsort()</h2>
<!-- sort an associative array in ascending order according to its values while maintaining the key-value associations.  -->
<?php
$cars=[
    "Toyota"=>"Altis",
    "BMW"=>"530i",
    "Tesla"=>"Model S",
];
print_r($cars);
echo"<br>";
asort($cars);
print_r($cars);
?>

<h2>rsort</h2> 
<!-- according to its key -->
<?php
$cars=[
    "Toyota"=>"Altis",
    "BMW"=>"530i",
    "Tesla"=>"Model S",
];

print_r($cars);
echo"<br>";
rsort($cars);
print_r($cars);
?>

<h2>natsort</h2>
<!-- sorted based on the natural order of the numeric parts within the strings. -->
<?php
$files = ['file2.txt', 'file10.txt', 'file1.txt'];

// Perform a natural order sort on the array
natsort($files);

// Display the sorted array
print_r($files);

echo"<br>";

asort($files);//regular alphabetical sort 
print_r($files);
?>
