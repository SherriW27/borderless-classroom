<?php

$input = "I loves my mother";
$pattern = "/(fa|mo)ther/";

if (preg_match($pattern, $input)) {
    echo "Match found";
} else {
    echo "Match not found";
}
?>

<h2>preg_split()</h2>
<?php
$email = "james.moore.wayne@example-pet-store.com";

$pattern2 = "/\.@/";
$output = preg_split($pattern2, $email);

var_dump($output);
//好像沒有成功ㄋㄟ

?>