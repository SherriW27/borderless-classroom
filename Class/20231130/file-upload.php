<?php
require_once('../db_connect.php');

$sql="SELECT * FROM images ORDER BY id DESC";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
//使用 fetch_all 方法檢索查詢結果的所有行，並以關聯數組的形式存儲在 $rows 中。
?>


<!doctype html>
<html lang="en">

<head>
  <title>file-upload</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php include("../user/css.php") ?>

</head>

<body>
  <div class="container">
    <form action="doUpload.php" method="post" enctype="multipart/form-data">
    <!-- multipart/form-data -->
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">名稱</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="file" class="col-sm-2 col-form-label">檔案</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
        </div>
        <button type="submit" class="btn btn-info text-white">確定</button>
        
    </form>
        <h2 class="mt-3">目前相片</h2>
        <div class="row g-3">
            <?php foreach($rows as $row): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="ratio ratio-1x1">
                    <img class="img-fluid" src="/images/<?=$row["name"]?>" alt="<?=$row["title"]?>">
                </div>
                <h3><?=$row["title"]?></h3>
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