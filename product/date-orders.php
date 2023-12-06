<?php  

require_once("../db_connect.php");

if(!isset($_GET["date"])){ //一定要帶id
    header( "location:product-orders.php" );
    exit;
}

$date=$_GET["date"];

$sql="SELECT user_order. * ,product.name AS product_name, product.price, users.name AS user_name FROM user_order 
JOIN product ON product.id = user_order.product_id 
JOIN users ON users.id = user_order.user_id 
WHERE user_order.order_date = '$date'

ORDER BY order_date  DESC";   //意思？？

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

$pageTitle=$rows[0]["order_date"]."銷售紀錄"

?>
<!doctype html>
<html lang="en">

<head>
  <title><?=$pageTitle?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <?php
include("../user/css.php");
?>

</head>

<body>
 <div class="container">

<!-- <pre>               
<?php 
print_r($rows)
?>
</pre> -->
<div class="py-2">
    <a class="btn btn-info text-white" href="product-orders.php">回所有銷售資料</a>
</div>
<h1><?=$pageTitle?></h1>
    <div class="table-responsive"> 
        <!-- 防暴版 -->
        <table class="table table-bordered">
            <thead>
                <tr class="text-nowrap"> 
                    <!-- 不要換行 -->
                    <th>編號</th>
                    <th>品名</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>總價</th>
                    <th>消費者</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalTotal=0;
                foreach($rows as $row): ?>
                <tr>
                <td><?=$row["id"]?></td>
      
                <td><?=$row["product_name"]?></td>
                <td class="text-end"><?=$row["amount"]?></td>
                <td class="text-end"><?=number_format($row["price"])?></td>
                <td class="text-end"><?php          
                $total=$row["amount"]*$row["price"]; 
                $totalTotal+=$total; 
                echo number_format($total);
                ?></td>
                <td><?=$row["user_name"]?></td>
                 <!-- 可刪除 -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">總銷售額:<?=number_format($totalTotal)?></div>
    </div>
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