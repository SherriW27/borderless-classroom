
<?php

$arr=[1,2,3,4];

foreach($arr as $value){
    echo "$value<br>";
}
?>
<hr>
<?php
$cars=["BMW","Toyota","Tesla"];

foreach($cars as $index => $car){
    echo "$index.$car<br>";
}
?>

<hr>

<?php
$students=[ //修一下
    ["name"=>"Sam",
    "height"=>173,
    "weight"=>72
    ],

     ["name"=>"Sam",
    "height"=>173,
    "weight"=>72
    ],

     ["name"=>"Sam",
    "height"=>173,
    "weight"=>72
    ],
    ];


  

    ?>

    <ul>
        <?php foreach($students as $student): ?> 
            <!-- 在students裡的 student-->
        <li>
        <?=$student["name"]?>'s height is<?= $student["height"]?>cm,weight is <?=$student["weight"]?>kg.
        </li>

        <?php endforeach; ?>
    </ul>