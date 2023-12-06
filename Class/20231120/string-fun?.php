<h2>strlen()</h2>
<!-- 字串長度  -->
<!-- This function is used to get the length of a string. -->
<?php
$string="Hello World";
echo strlen($string); //Output: 11 
?> 

<h2>str_word_count()</h2>
<!-- This function is used to count the number of words in a string. -->
<?php
$string="Hello World";
echo str_word_count($string);//Output: 2
?>

<h2>substr</h2> 
<!-- This function is used to extract parts of a string. -->
<?php
$name="ABCDEF";
echo substr($name,2);// Outputs: CDEF
//提取從位置2開始到字串結尾的所有字元
echo "<br>";

$name="ABCDEFG";
echo substr($name,-2);// Outputs: FG
//提取結尾數來第2個開始到結尾的所有字元
echo "<br>";

$name="ABCDEFG";
echo substr($name,2,4);// Outputs: CDEF
//提取從位置2開始的4個字元
echo "<br>";
?>

<h2>strstr</h2>
<!-- This function is used to find the first occurrence of a string inside another string. -->
<?php
$email="Sherri@test.com";
echo strstr($email,'@');
echo "<br>";
echo strstr($email,'@',true); 
// Find the first occurrence of '@' and return the part before it
// If needle is not found, strstr returns false
// Outputs: Sherri 

?>

<h2>strpos</h2>
<!-- This function is used to find the position of the first occurrence of a substring in a string. -->
<?php
echo strpos($string,'World');// Outputs: 6
echo "<br>";
$ifExist= strpos($string,'world');
// Outputs: false
var_dump($ifExist);
?>

<h2>explode</h2>
<!-- Output: An array containing each word from the string. -->
<?php
$saying="Hello Sherri,how are you today?";
$sayArr=explode("",$saying);
var_dump($sayArr);

?>

<h2>str_replace</h2>
<!-- This function is used to replace all occurrences of a search string with a replacement string in a given string. -->
<?php
$output=str_replace("World","kitty",$string);
echo $output;//string放哪裡？
//還沒弄完～把kitty替換成world
?>