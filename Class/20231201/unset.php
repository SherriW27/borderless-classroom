<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unset</title>
</head>

<body>

</body>

</html>

<?php


$user = [
    "name" => "John",
    "email" => "John@altostrat.com",


];
var_dump($user);

unset($user["email"]);
echo "<br>";
var_dump($user);




?>