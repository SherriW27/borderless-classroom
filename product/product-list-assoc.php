<?php
require_once("../db_connect.php");

$sqlCategory = "SELECT * FROM product_category";
$resultCategory = $conn->query($sqlCategory);
$rowsCategory = $resultCategory->fetch_all(MYSQLI_ASSOC); //從資料庫中取得商品分類的資訊，以關聯陣列形式存儲在 $rowsCategory 中。
$categories = [];
foreach ($rowsCategory as $category) {
    $categories[$category["id"]] = $category["name"];
} //將商品分類轉換成以分類 ID 為鍵，分類名稱為值的形式，存在 $categories 陣列中。

if (isset($_GET["price-min"]) && isset($_GET["price-min"])) {
    $min = $_GET["price-min"];
    $max = $_GET["price-max"];

    $sql = "SELECT product. * FROM product WHERE product.price > $min AND  product.price < $max ORDER BY product.id ASC";
} else {

    $sql = "SELECT product. * FROM product ORDER BY product.id ASC";
} //檢查是否有設定價格範圍，如果有，則使用該範圍進行商品的篩選。

$result = $conn->query($sql);
$productCount = $result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC); //MYSQLI_ASSOC??
//執行 SQL 查詢，並將查詢結果存儲在 $rows 中，同時獲得商品總數
?>


<!doctype html>
<html lang="en">

<head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include("../user/css.php");

    ?>

</head>

<body>
    <div class="container">
        <?php var_dump($categories) ?>
        <div class="py-2">
            <form action="">
                <div class="row g-3 align-items-center">
                    <?php
                    if (isset($_GET["price-min"])) :
                    ?>
                        <div class="col-auto">
                            <a class="btn btn-info text-white" href="product-list.php"><i class="bi bi-arrow-left"></i></a>
                        </div>
                    <?php endif; ?>
                    <!-- 注意結尾 -->
                    <div class="col-auto">
                        <label for="" class="col-form-label">價錢</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control text-end price-input" name="price-min" value="<?php $priceMin = isset($_GET["price-min"]) ? $min : 0;
                                                                                                                echo $priceMin;
                                                                                                                ?>">
                    </div>
                    <div class="col-auto">
                        ~
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control text-end price-input" name="price-max" value="<?php $priceMax = isset($_GET["price-max"]) ? $max : 99999;
                                                                                                                echo $priceMax;
                                                                                                                ?>">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info text-white" type="submit">Go</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="py-2">
            共<?= $productCount ?>筆
        </div>
        <!-- <pre> -->
        <!-- <?php print_r($rows); ?>  -->
        <!-- </pre> -->
        <div class="row g-3 product-list">
            <?php foreach ($rows as $row) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="ratio ratio-4x3 ">
                            <img class="object-fit-cover card-img-top" src="/images/<?= $row["img"] ?>" alt="<?= $row["name"] ?>">
                        </div>
                        <div class="card-body">
                            <div class=""><?php $categories[$row["category_id"]] ?></div>
                            <!--    跑不出來 -->
                            <h3 class="card-title"><?= $row["name"] ?></h3>
                            <div class="text-end text-danger
                        fs-5">$<?= $row["price"] ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>