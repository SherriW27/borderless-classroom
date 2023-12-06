<?php

echo $_SERVER["PHP_SELF"];///20231130/file.php
echo "<br>";
echo $_SERVER["SCRIPT_FILENAME"];///Applications/XAMPP/xamppfiles/htdocs/20231130/file.php
echo "<br>";
echo __FILE__;///Applications/XAMPP/xamppfiles/htdocs/20231130/file.php
echo "<br>";
echo __DIR__;///Applications/XAMPP/xamppfiles/htdocs/20231130
echo "<br>";
echo "Current Path is:".realpath(".");//Current Path is:/Applications/XAMPP/xamppfiles/htdocs/20231130
echo "<hr>";
$path=__FILE__;
//PATHINFO_DIRNAME :/Applications/XAMPP/xamppfiles/htdocs/20231130

//__要按兩次？
echo "PATHINFO_DIRNAME :".pathinfo($path,PATHINFO_DIRNAME).
//
"<br>";
echo "PATHINFO_BASENAME :".pathinfo($path,PATHINFO_BASENAME).
//PATHINFO_BASENAME :file.php
"<br>";
echo "PATHINFO_EXTENSION :".pathinfo($path,PATHINFO_EXTENSION).
"<br>";
echo "PATHINFO_FILENAME :".pathinfo($path,PATHINFO_FILENAME)."<br>";

?>