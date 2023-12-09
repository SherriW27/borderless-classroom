<?php 
require_once("../db_connect.php");

$sqlTotal="SELECT * FROM users WHERE valid=1"; //算總比數
$resultTotal=$conn->query($sqlTotal);
$totalUser=$resultTotal->num_rows;//??
$perPage=4; 
//無條件進位相除結果，計算出總頁數
$pageCount=ceil($totalUser/$perPage);




if(isset($_GET["search"])){
    $search=$_GET["search"];
    $sql = "SELECT * FROM users WHERE name LIKE '%$search%'AND valid=1"; //還不能動 
    //這一部分表示在名字中搜索包含指定關鍵字的字串。
    }elseif(isset($_GET["page"])&& isset($_GET["order"])){//&&是要幹嗎？確認是否有排序參數
        $page=$_GET["page"]; //確認是否有分頁參數
        
    //  好像有缺東西
        $order=$_GET["order"];
        switch($order){
            case 1:
                $orderSql="id ASC";
                break;
             case 2:
                $orderSql="id DESC";
                break;
             case 3:
                $orderSql="name ASC";
                break;
             case 4:
                $orderSql="name DESC";
                break;
            default:
                $orderSql="id ASC";
                
        }


        $startItem=($page-1)*$perPage;

        $sql = "SELECT * FROM users WHERE valid=1 ORDER BY $orderSql LIMIT $startItem,$perPage";

    }else{
    $page=1;//如果以上兩者條件都不滿足，表示沒有進行搜尋、分頁或排序。
// 此時會設定 $page 為 1，並構建一個 SQL 查詢，用來擷取第一頁的資料。
    $order = 1;
    $sql = "SELECT * FROM users WHERE valid=1 ORDER BY id ASC LIMIT 0,$perPage";//SQL SELECT query //  valid=1軟刪除 //limit第三筆開始，抓四筆//ORDER BY id//ASC DSC


}

$result=$conn->query($sql); //Execute the query

?>

<!doctype html>
<html lang="en">

<head>
  <title>user_list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    include("css.php");
    ?>

</head>

<body>
    <!-- 搜尋功能沒做完！ -->
  <div class="container">
        <?php
            $userCount=$result->num_rows; //
        ?>
        <div class="py-2 d-flex justify-content-between align-items-center">
                <div>
                    <?php 
                    if(isset($_GET["search"])): 
                    ?>
                      <a class="btn btn-info text-white" href="user-list.php" title="回使用者列表"><i class="bi bi-arrow-left"></i></a>
                      
                <a class="btn btn-primary"href="add-user.php"><i class="bi bi-plus-circle-fill text-white" title="增加使用者"></i>
            
                搜尋<?=$_GET["search"]?>的結果,
                <?php endif;?>
                共<?=$totalUser?>人
                </div>
                
            <!-- 文字換符號 -->
                    </a>
                    $pageCount
            <div class="py-2">
                <form action="">

                </form>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search">
                    <button class="btn btn-primary text-white" type="submit" id=""><i class="bi bi-search"></i></button>
                    </div>
                    </form>
            </div>

        </div>
   <?php if(!isset($_GET["search"])): ?>
        <div class="pb-2 d-flex justify-content-end orders">
            <div class="btn-group">

              <a class="btn btn-primary <?php if($order==1)echo "active"?>" href="user-list.php?page=<?=$page?>&order=1">id<i class="bi bi-sort-up"></i></a>
                <a class="btn btn-primary <?php if($order==2)echo "active"?>" href="user-list.php?page=<?=$page?>&order=2">id<i class="bi bi-sort-down"></i></a>
                 <a class="btn btn-primary <?php if($order==3)echo "active"?>" href="user-list.php?page=<?=$page?>&order=3">name<i class="bi bi-sort-up"></i></a>
                  <a class="btn btn-primary <?php if($order==4)echo "active"?>" href="user-list.php?page=<?=$page?>&order=4">name<i class="bi bi-sort-down"></i></a>

             </div>          
                        <!-- ？？？？升冪降冪 -->
                        

        </div> 
        <!-- orders -->
        <?php endif; ?>
        <div>
            <!-- 顯示使用者列表 -->
            <?php
            $rows=$result->fetch_all(MYSQLI_ASSOC); //漏掉這個了
            // $row=$result->fetch_assoc(); //關聯式陣列
            // var_dump( $row);
            // echo "<br>";
            //fetch_row() 索引式陣列
            // $row=$result->fetch_assoc();
            // var_dump( $row);
            ?>
        </div>
         <?php if($userCount>0): ?>
            <!--   跑不出資料 -->
            <!-- 弄懂這個迴圈 -->
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
         <!-- Use foreach to iterate over rows -->
                <?php foreach($rows as $row):?>
                <tr>
                   <td><?=$row["id"]?></td>
                   <td><?=$row["name"]?></td>
                   <td><?=$row["email"]?></td>
                   <td><?=$row["phone"]?></td>
                    <td><a class="btn btn-primary"href="user.php?id=<?=$row["id"]?>"><i class="bi bi-info-circle-fill text-white" title="詳細資料"></i></a>
                    </td>

                 </tr> 
                <?php endforeach; ?>
                 <!--endwhile是配分號-->
                
               <!--endif是配分號-->
            </tbody>
        </table>
        <!-- 分頁連結 -->
        <?php if(isset($_GET["search"])): ?>
        <div class="py-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->

                   <?php for ($j = 1; $j <= $pageCount; $j++): ?>
                    <li class="page-item <?php if ($page == $j) echo "active"; ?>">
                        <a class="page-link" href="user-list.php?page=<?= $j ?>&order=<?=$order?>"><?=$j?></a>
                    </li>
                    <?php endfor; ?>
                    <!-- 還沒成功自動跳出分頁們 -->
                    <!-- 是等於 -->
                    <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --> 
                </ul>
            </nav>
        </div>
        <?php endif; ?>

         <?php else: ?>
            目前無使用者
        <?php endif; ?>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    let users=<?php echo json_encode($rows)?>;
    console.log(users);
  </script>
</body>

</html>