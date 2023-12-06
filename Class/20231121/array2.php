<!-- 關聯式陣列 -->
<?php 

$student["name"]="John";
$student["height"]=180;
$student["weight"]=83;
var_dump($student);
?>
<?=$student["name"]?>'s height is<?= $student["height"]?>cm,weight is <?=$student["weight"]?>kg.

<hr>

<?php
$student=[
"name"=>"Sam",
"height"=>173,
"weight"=>72
];
?>
<!-- // js的物件
// let student={
//     "name"=>"Sam",
//     "height"=>173,
//     "weight"=>72
// } -->

    <!-- // <pre>
    // <?php 
    // print_r($student);
    // ?>
    // </pre> -->

<hr>
<?php 
echo json_encode($student);
?>

<script>
    let student=<?=json_encode($student)?>;
    console.log(student);
</script>

<h2>多維關聯式陣列</h2>

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

    <pre>
        <?php 
        print_r($student);
        ?>
    </pre>
共<?=count($students)?>個學生

    <ul>
<?php for ($i=0;$i<count($students);$i++):?>
        <li>
            <?=$students[$i]["name"]?>'s height is<?= $students[$i]["height"]?>cm,weight is <?=$students[$i]["weight"]?>kg.

        </li>
        <?php endfor; ?>
    </ul>