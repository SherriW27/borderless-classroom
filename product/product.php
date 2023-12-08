<?php
require_once("../db_connect.php");

if (!isset($_GET["id"])) {
    header("location:/404.php");
    exit;
}

$id = $_GET["id"];

$sql = "SELECT * FROM product  
WHERE id =$id";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("location:/404.php");
    exit;
}


$rows = $result->fetch_assoc(); //查一下
var_dump($rows);

$sqlLikes = "SELECT user_like.*,users.*  FROM user_like 
JOIN users ON user_like.user_id=users.id 
WHERE user_like.product_id=$id";

$resultLikes = $conn->query($sqlLikes);
$rowLikes = $resultLikes->fetch_all(MYSQLI_ASSOC);


?>



<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    include("../user/css.php");

    ?>

</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/product/product-list.php">產品列表</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $row["name"] ?></li>
            </ol>
        </nav>
        <div class="row g-3">
            <div class="col-md-6">
                <img class="img-fluid" src="/images/<?= $row["img"] ?>" alt="<?= $row["name"] ?>">
            </div>
            <div class="col-md-6">
                <h1><?= $row["name"] ?></h1>
                <div class="h2 text-danger">$<?= number_format($row["price"]) ?></div>
                <h2 class="mt-3">已收藏使用者</h2>
                <ul>
                    <?php foreach ($rowLikes as $user) : ?>
                        <li><a href="/user/user.php?id=<?= $user["user_id"] ?>"><?= $user["name"] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>