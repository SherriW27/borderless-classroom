<?php
require_once("../db_conntect.php");

$sqlTotal = "SELECT * FROM users WHERE  valid=1";
$resultTotal = $conn->query($sqlTotal);
$totalUser = $resultTotal->num_rows;
$perPage = 6;
//無條件進位相除結果, 計算出總頁數
$pageCount = ceil($totalUser / $perPage);


if (isset($_GET["search"])) {
  $search = $_GET["search"];
  $sql = "SELECT * FROM users WHERE name LIKE '%$search%' AND valid=1";
} elseif (isset($_GET["page"]) && isset($_GET["order"])) {
  $page = $_GET["page"];
  $order = $_GET["order"];
  switch ($order) {
    case 1:
      $orderSql = "id ASC";
      break;
    case 2:
      $orderSql = "id DESC";
      break;
    case 3:
      $orderSql = "name ASC";
      break;
    case 4:
      $orderSql = "name DESC";
      break;
    default:
      $orderSql = "id ASC";
  }

  $startItem = ($page - 1) * $perPage;

  $sql = "SELECT * FROM users WHERE valid=1 ORDER BY $orderSql LIMIT $startItem,$perPage";
} else {
  $page = 1;
  $order = 1;
  $sql = "SELECT * FROM users WHERE valid=1 ORDER BY id ASC LIMIT 0,$perPage";
}

$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
  <title>User List</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  include("css.php");
  ?>
</head>

<body>
  <div class="container">
    <?php
    $userCount = $result->num_rows;
    ?>
    <div class="py-2 d-flex justify-content-between align-items-center">
      <div><?php
            if (isset($_GET["search"])) :
            ?>
          <a class="btn btn-info text-white" href="user-list.php" title="回使用者列表"><i class="bi bi-arrow-left"></i></a>
          搜尋<?= $_GET["search"] ?>的結果,
          <?php endif;
          ?>共 <?= $totalUser ?> 人
      </div>
      <a class="btn btn-info text-white" href="add-user.php" title="增加使用者"><i class="bi bi-person-fill-add"></i></a>
    </div>
    <div class="py-2">
      <form action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search.." name="search">
          <button class="btn btn-info text-white" type="submit" id=""><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
    <?php if (!isset($_GET["search"])) : ?>
      <div class="pb-2 d-flex justify-content-end orders">
        <div class="btn-group">
          <a class="btn btn-info text-white <?php
                                            if ($order == 1) echo "active"
                                            ?>" href="user-list.php?page=<?= $page ?>&order=1">id <i class="bi bi-sort-down-alt"></i></a>
          <a class="btn btn-info text-white <?php
                                            if ($order == 2) echo "active"
                                            ?>" href="user-list.php?page=<?= $page ?>&order=2">id <i class="bi bi-sort-down"></i></a>
                                            <a class="btn btn-info text-white <?php
                                            if ($order == 3) echo "active"
                                            ?>" href="user-list.php?page=<?= $page ?>&order=3">name <i class="bi bi-sort-down-alt"></i></a>
                                            <a class="btn btn-info text-white <?php
                                            if ($order == 4) echo "active"
                                            ?>" href="user-list.php?page=<?= $page ?>&order=4">name <i class="bi bi-sort-down"></i></a>
        </div>
      </div><!-- orders -->
    <?php endif; ?>
    <div>
      <?php
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      // var_dump($rows);
      ?>
    </div>
    <?php if ($userCount > 0) : ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $row) : ?>
            <tr>
              <td><?= $row["id"] ?></td>
              <td><?= $row["name"] ?></td>
              <td><?= $row["email"] ?></td>
              <td><?= $row["phone"] ?></td>
              <td>
                <a class="btn btn-info text-white" href="user.php?id=<?= $row["id"] ?>" title="詳細資料"><i class="bi bi-info-circle-fill"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
      <?php if (!isset($_GET["search"])) : ?>
        <div class="py-2">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
              <?php for ($i = 1; $i <= $pageCount; $i++) : ?>
                <li class="page-item <?php
                                      if ($page == $i) echo "active";
                                      ?>"><a class="page-link" href="user-list.php?page=<?= $i ?>&order=<?= $order ?>"><?= $i ?></a></li>
              <?php endfor; ?>
              <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
          </nav>
        </div>
      <?php endif; ?>
    <?php else : ?>
      目前無使用者
    <?php endif; ?>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script>
    let users = <?php echo json_encode($rows) ?>;
    // console.log(users);
  </script>
</body>

</html>