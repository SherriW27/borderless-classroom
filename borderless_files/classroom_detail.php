<?php
require_once("../borderless_connect.php");

$sql = "SELECT * FROM classroom";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// var_dump($rows);

$classroomCount = count($rows);

$id = "id";
$name = "name";
$address = "address";
$phone = "phone";
$price = "price";

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>練團室資訊</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

    <!-- bootstrap@5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column align-items-center mt-5">
            <h2>練團室資訊</h2>

            <form action="edit_product.php" method="post">
                <label for="product_name">店名:</label>
                <input type="text" id="product_name" name="product_name" required><br>

                <label for="price">價格:</label>
                <input type="number" id="price" name="price" required><br>

                <label for="description">描述:</label>
                <textarea id="description" name="description" rows="4" required></textarea><br>

                <input type="hidden" name="product_id" value="在這裡放置你的商品ID">

                <input type="submit" value="更新商品資訊">
            </form>
        </div>
    </div>

</body>

</html>