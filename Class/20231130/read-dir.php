<?php
$path="/Applications/XAMPP/xamppfiles/htdocs/20231130";

$handle=opendir($path);

while($file=readdir($handle)){
     echo $file."<br>";
}

closedir($handle);
    
?>