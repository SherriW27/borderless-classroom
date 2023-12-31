<?php

// if (!isset($_GET["id"])) {
//     header("location: tables.php");
// }

// $id = $_GET["id"];

// echo $id;

// require_once("../borderless_connect.php");

// $sql = "SELECT * FROM classroom WHERE id=$id AND valid=1";
// echo $sql;

// // var_dump($sql);

// $result = $conn->query($sql);
// $classroomCount = $result->num_rows;

// $row = $result->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Classroom-edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>

<body>
    <!-- modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">警告</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確認刪除?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="tables.php?id=<?= $row["id"] ?>" class="btn btn-danger">確認</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-2">
            <a class="btn btn-info text-white" href="tables.php" title="回使用者列表"><i class="bi bi-arrow-left"></i></a>
        </div>
        <?php //if ($classroomCount == 0) : 
        ?>
        <h1>教室不存在</h1>
        <?php //else : 
        ?>
        <form action="doUpdateUser.php" method="post">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <table class="table table-bordered">

                <tr>
                    <th>name</th>
                    <td>
                        <input type="text" class="form-control" name="name" value="<?= $row["name"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>address</th>
                    <td>
                        <input type="text" class="form-control" name="address" value="<?= $row["address"] ?>">

                    </td>
                </tr>
                <tr>
                    <th>phone</th>
                    <td><input type="tel" class="form-control" name="phone" value="<?= $row["phone"] ?>"></td>
                </tr>
                <tr>
                    <th>phone</th>
                    <td><input type="text" class="form-control" name="phone" value="<?= $row["price"] ?>"></td>
                </tr>
            </table>
            <div class="py-2 d-flex justify-content-between">
                <div>
                    <button class="btn btn-info text-white" type="submit">儲存</button>
                    <a class="btn btn-info text-white" href="tables.php?id=<?= $row["id"] ?>">取消</a>
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#alertModal" class="btn btn-danger">刪除</button>
                </div>
            </div>
        </form>
        <?php //endif; 
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>