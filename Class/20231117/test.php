<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>

    <h1><?php echo "Hello World" ?> </h1>

    <?php echo "<h1>Hello World</h1>" ?>

    <h1><?= "Hello World" ?></h1>

    <h2>id:<?=$_GET["id"] ?></h2> 
    <!-- ??為什麼要在網址上再打 --> 

    <h2>name:<?=$_GET["name"] ?></h2>
</body>
</html>