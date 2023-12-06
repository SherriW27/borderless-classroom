<?php 
require_once("../db_connect.php");

$sql = "SELECT * FROM users"; //SQL SELECT query
$result=$conn->query($sql); //Execute the query

?>



<!doctype html>
<html lang="en">

<head>
  <title>use_list</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
        <?php
            $userCount=$result->num_rows; //
        ?>
        <div class="py-2 d-flex justify-content-between">
            共<?=$userCount?>人
        </div>
        <a class="btn btn-primary"href="add-user.php">增加使用者</a>
        <div>
            <?php
            // $row=$result->fetch_assoc(); //關聯式陣列
            // var_dump( $row);
            // echo "<br>";
            //fetch_row() 索引式陣列
            // $row=$result->fetch_assoc();
            // var_dump( $row);
            ?>
        </div>
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
                <?php if($userCount>0): ?> 
                    <!-- 弄懂這個迴圈 -->
                <?php while($row=$result->fetch_assoc()):?>
                    <!-- 只能使用一次 -->
                <tr>
                   <td><?=$row["id"]?></td>
                   <td><?=$row["name"]?></td>
                   <td><?=$row["email"]?></td>
                   <td><?=$row["phone"]?></td>
                 </tr> 
                <?php endwhile; ?>
                 <!--endwhile是配分號-->
                 <?php else: ?>
                    目前無使用者
               <?php endif; ?>
               <!--endif是配分號-->
            </tbody>
        </table>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>