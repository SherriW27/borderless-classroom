<?php
if(!isset($_GET["id"])){
   header("location: user-list.php");
}


$id=$_GET["id"];
echo $id;

require("../db_connect.php");

$sql="SELECT * FROM users WHERE id=$id";

$result=$conn->query($sql);
$userCount=$result->num_rows;

$row=$result->fetch_assoc();

$sqlLikes="SELECT user_like.*,product.*  FROM user_like 
JOIN product ON user_like.product_id=product.id 
WHERE user_like.user_id=$id";

$resultLikes=$conn->query($sqlLikes);
$rowLikes=$resultLikes->fetch_all(MYSQLI_ASSOC);

?>


<!doctype html>
<html lang="en">

<head>
  <title>User</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php
include("css.php");

?>
</head>

<body>

<div class="container">
     <div class="py-2">
        <a class="btn btn-primary text-white"href="user-list.php" title="回使用者列表"><i class="bi bi-arrow-left"></i></a>
    </div>
<?php if($userCount==0):?>
    <h1>使用者不存在</h1>
    <?php else:?> 
    <!-- 還沒弄完！！ -->

 

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td><?=$row["id"]?></td>
        </tr>
        <tr>
            <td>name</td>
            <th><?=$row["name"]?></th>
        </tr>
        
        <tr>
        <th>email</th>
        <td><?=$row["email"]?></td>
        </tr>
        
        <tr>
        <th>phone</th>
        <td><?=$row["phone"]?></td>
        </tr>
        
        <tr>
        <th>create time</th>
        <td><?=$row["created_at"]?></td>
        </tr>
    </table>
    <div class="py-2">
        <a class="btn btn-primary text-white" href="user-edit.php?id=<?= $row["id"]?>"title="修改資料"><i class="bi bi-pencil-fill"></i></a>

 <!-- 更新資料的連結超級不理解 -->
    </div>
       <?php endif; ?>

       <h2>收藏商品</h2> 
       <!-- 導product.php還沒做好-->
       <div class="row g-3">
        <?php
            $likeCount=$resultLikes->num_rows;
            if($likeCount>0):
        ?>
        <!-- 不要忘記他 -->
        <?php foreach($rowLikes as $row):?>
        <div class="col-lg-3 col-md-4 col-6">
             <a href="/product/product.php?id=<?=$row["product_id"]?>"></a>
            <div class="ratio ratio-4x3 mb-2">
           
                <img class="object-fit-cover" src="/Images/<?=$row["img"]?>" alt="">      
            </div>

            <h3>
 <a href="/product/product.php?id=<?=$row["product_id"]?>"></a>
                <?=$row["name"]?>
            </h3>
        </div>
        <?php endforeach; ?>
       </div>
       <?php else: ?>
        尚未收藏商品
        <?php endif; ?>
      
</div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>