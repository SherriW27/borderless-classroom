<h2>is_array()</h2> 
<!-- checks if the variable is an array  -->
<?php
 $arr=[1,2,3];
 echo is_array($arr)?
 "true":"false";
 ?>

 <h2>list</h2>
 <!-- unpacks the values from the array into the variables -->
 <?php
 $user=["john",28,"sales"];
 list ($name,$age,$job)=$user;
 echo "$name";
 ?>

 <h2>range</h2>
<!-- generates an array starting from 2, incrementing by 2, and ending at 20. -->
 <?php
 $r=range(2,20,2);
 var_dump($r);
 ?>

 <h2>array_values()</h2>
 <?php
 $student=[
    "name"=>"Sam",
     "height"=>173,
      "weight"=>72,
 ];//Make sure to include semicolons (;) at the end of statements
print_r(array_values($student));
 ?>

 <h2>array_count_values()</h2>
 <!-- Counts all the values of an array -->
 <!-- output:
 Array ( [joe] => 1 [Sherri] => 2 [Diana] => 2 [Fish] => 1 ) -->
 <?php 
 $users=["joe","Sherri","Diana","Fish","Sherri","Diana"];
 print_r(array_count_values($users));
 
 ?>

 <h2>Browse</h2>
 <!-- Demonstrates the use of array pointer functions: current(), next(), prev(), and reset(). -->
 <?php
$arr=["one","two","three","four"];
echo current($arr);
echo "<br>";

next ($arr);//moves the array pointer to the next element.
next ($arr);
echo current($arr);
echo "<br>";

prev($arr);//moves the array pointer to the previous element.
echo current($arr);
echo "<br>";

reset($arr);
echo current($arr);//Moves the array pointer to the first element.
 ?>

<hr>
<?php
//executes the block of code inside the do part and then checks the while condition.
do{ 
    echo current($arr);
    echo "<br>";
}while(next($arr));
//The loop will continue executing as long as next($arr) returns a truthy value (i.e., there is a next element in the array).
?>
