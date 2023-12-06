<?php
$fruit=["apple","banana","peach","orange","pomelo"]
?>

原始：
<?php
print_r($fruit);
?>

<h2>array-shift</h2>

<?php
array_shift($fruit);
?>
<?php print_r($fruit)?>

<h2>array-unshift</h2>

<?php
array_unshift($fruit,"apple");
?>
<?php print_r($fruit)?>

<h2>array-pop</h2>

<?php
array_pop($fruit);
?>
<?php print_r($fruit)?>


<h2>array-push</h2>

<?php
array_push($fruit,"mango");
array_push($fruit,"grape");
array_push($fruit,"pineapple");
?>
<?php print_r($fruit)?>

<h2>array-slice</h2>
<!-- extract a portion of an array. -->
<?php
$fruit2=array_slice($fruit,0);
print_r($fruit2);

echo"<br>";

$fruit3=array_slice($fruit,1,4);
print_r($fruit3);
?>

<h2>array-splice</h2>
<!-- remove a portion of the original array and, optionally, replace it with new elements -->
<?php
array_splice($fruit,2,1);
print_r($fruit);

echo"<br>";

array_splice($fruit,3,0,"peach");
print_r($fruit);
?>

<h2>array_rand</h2>
<!-- randomly pick one or more keys from an array -->
<?php
$array_rand=array_rand($fruit,2);
print_r($array_rand);

echo"<br>";

//??
for($i=0;$i<count($array_rand);$i++){
    echo $fruit[$array_rand[$i]]. "<br>";
   
}
?>

<!-- //?? -->
<h2>array_flip</h2>
<?php
$cars=["BMW","Toyota","Tesla"];
$flipCars=array_flip($cars)

