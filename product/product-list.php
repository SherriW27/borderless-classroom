<?php
    require_once("../db_connect.php");

        $sqlCategory="SELECT * FROM product_category";
    $resultCategory=$conn->query($sqlCategory);
    $rowsCategory=$resultCategory->fetch_all(MYSQLI_ASSOC); 

  if(isset($_GET["price-min"]) && isset($_GET["price-max"])){
    $min=$_GET["price-min"];
    $max=$_GET["price-max"];

     $sql="SELECT product. * , product_category.name AS category_name 
    -- 選取商品表中的所有欄位 (product.*)，並同時選取商品分類表中的名稱欄位 (product_category.name)，並將其別名為 category_name。
     FROM product JOIN product_category ON product.category_id =product_category.id 
    --  使用 JOIN 關鍵字連接商品表 (product) 和商品分類表 (product_category)，連接條件是product的 category_id 欄位與product_category的 id 欄位相等。
     WHERE product.price > $min AND  product.price < $max 
    -- 篩選出商品價格在指定範圍 ($min 到 $max 之間) 的商品。  
     ORDER BY product.id ASC";
     
} else if (isset($_GET["category"]))
// 這行程式碼使用 isset() 函數檢查 $_GET["category"] 是否存在，即檢查 URL 中是否包含名為 category 的參數。
{
    $category=$_GET["category"]; 
    // 如果 category 參數存在，則將其值儲存在 $category 變數中。

     $sql="SELECT product. * , product_category.name AS category_name 
    --  選擇商品表中的所有欄位 (product.*)，並同時選取product_category中的名稱欄位 (product_category.name)，並將其別名為 category_name。
     FROM product 
     JOIN product_category ON product.category_id =product_category.id 
    --  使用 JOIN 關鍵字連接 (product) 和 (product_category)，根據product的 category_id 和product_category的 id 進行連接。
     WHERE product.category_id=$category
    --  篩選出商品表中 category_id 與指定 category 參數相符的商品。
     ORDER BY product.id ASC";
    // 按照商品的 ID 升序排序結果
}
else{

    $sql="SELECT product. * , product_category.name AS category_name 
--     選取商品表 (product) 中的所有欄位。
-- product_category.name AS category_name 同時選取商品分類表 (product_category) 中的名稱欄位 (name)，並將其別名為 category_name。
    FROM product 
    JOIN product_category ON product.category_id =product_category.id 
--     使用 JOIN 關鍵字連接商品表 (product) 和商品分類表 (product_category)。
-- 連接條件是商品表的 category_id 欄位與商品分類表的 id 欄位相等。
    ORDER BY product.id ASC"; //wtf? 
}

$result=$conn->query($sql);
$productCount=$result->num_rows;
$rows=$result->fetch_all(MYSQLI_ASSOC); //MYSQLI_ASSOC??
   

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

        <div class="py-2"> 
            <form action="">
                <div class="row g-3 align-items-center">
                    <?php 
                    if(isset($_GET["price-min"])):
                    ?>
                    <div class="col-auto">
                        <a href="product-list.php" class="btn btn-info text-white"><i class="bi bi-arrow-left"></i></a>
                    </div>
                    <?php endif; ?> 
                    <!-- 注意結尾 -->
                    <div class="col-auto"><!-- 簡單的價格篩選表單，使用 GET 方法。 -->
                        <label for="" class="col-form-label">價錢</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control text-end price-input"
                        name="price-min" value="<?php $priceMin=isset($_GET["price-min"])? $min:0; 
                        echo $priceMin;
                        ?>"
                        >
                    </div>
                    ~
                    <div class="col-auto">
                       <input type="number" class="form-control text-end price-input"
                        name="price-max" value="<?php $priceMax=isset($_GET["price-max"])? $max:99999; 
                        echo $priceMax;
                        ?>"
                        >
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info text-white"
                        type="submit">Go</button>
                    </div> 
                </div>
            </form>
        </div>
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                    <a class="nav-link 
                    <?php 
                    if(!isset($_GET["category"]))echo "active"; 
                    ?>" 
                    aria-current="page" href="product-list.php">全部</a>
                    </li>  
                    <!-- 如果 URL 中沒有包含 category 參數，表示目前是顯示全部商品，則給予 "active" 類別，使其顯示為選定狀態。 -->

                <?php foreach($rowsCategory as $category): ?>                  
                    <li class="nav-item">
                    <a class="nav-link 
                    <?php
                        if(isset($_GET["category"]) && $_GET["category"]==$category["id"])echo "active";//沒到完全理解
                        ?>" 
                        href="product-list.php?category=<?=$category["id"]?>"><?=$category["name"]?></a>
                    </li>

                <?php endforeach; ?>
                </ul>
            </div>
            <!-- 使用 PHP 的 foreach 迴圈，遍歷商品分類 ($rowsCategory)，為每一個分類建立一個導覽標籤列表項。
對於每個分類，建立一個超連結 (a)，其 href 屬性包含分類的 id 參數，這樣點擊時就能夠在 URL 中加入分類的識別碼。
如果 URL 中的 category 參數與目前迴圈中的分類 id 相符，表示目前正在顯示該分類的商品，則給予 "active" 類別，使其顯示為選定狀態。 -->
         <div class="py-2">
                共<?=$productCount?>筆
        </div>

        <div class="row g-3 product-list"> 
            <!-- 使用 PHP 迴圈顯示商品列表。 -->
            <?php foreach ($rows as $row) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="product.php?id=<?=$row["id"]?>">
                            <div class="ratio ratio-4x3 ">
                                <img class="object-fit-cover card-img-top" src="/images/<?= $row["img"]?>"
                                
                            alt="<?= $row["name"] ?>">
                            </div>
                        </a>
                        <div class="card-body">
                            <!-- 加連結？？-->
                           <div class="category">
                            <a href="product-list.php?category=<?= $row["category_id"] ?>"><?= $row["category_name"] ?></a>
                        </div>
                            <h3 class="card-title"> 
                                <a href="product.php?id=<?=$row["id"]?>"><?= $row["name"] ?>
                        </a>
                        </h3> 
                            <div class="text-end text-danger
                        fs-5">$<?= $row["price"] ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
 


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>