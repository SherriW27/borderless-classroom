<h1>預設常數</h1>
<?php
echo PHP_VERSION."<br>";
echo PHP_OS;
?>


<h1>魔術常數</h1>
<h2>__LINE__</h2> 
<?php
echo __LINE__;//程式中的目前行號
?>
<h2>__FILE__</h2>
<?php
echo __FILE__; //Outputs the full path and filename of the file

?>
<h2>__DIR__</h2>

<?php
echo __DIR__;//Outputs the directory of the file
?>

<h2>__FUNCTION__</h2>

<?php
function test(){
 echo __FUNCTION__;//is a magic constant in PHP that represents the name of the current function.
}
test()
?>