<h2>Catch error</h2>
<?php
$var = 1;

try {
    $var->method();
} catch (Error $e) {
    echo "Error";
}

?>
<h2>DivisionByZeroError</h2>
<?php
try {
    $d = 0;
    $result = 1 / $d;
} catch (DivisionByZeroError $e) {
    echo "DivisionByZeroError:";
    echo  $e->getMessage();
}

?>
<h2>TypeError</h2>
<?php
function add(int $a, int $b)
{
    return $a + $b;
}
try {
    $result = add("one-cat", "two-cat");
} catch (TypeError $e) {
    echo  $e->getMessage();
}
?>
<h2>Exception</h2>
<?php

$score = -3;
try {
    if ($score < 0) {
        throw new Exception("Exception:Score is less than 0");
    }
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
    echo "code:" . $e->getCode();
}

?>