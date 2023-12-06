<h2>While</h2>
<?php
$i=0;

// Using curly braces
// while($i<10){
//     echo "$i<br>";
//     $i++;
// }

// Using colon syntax
while($i<10):
    echo"$i<br>";
    $i++;
endwhile;
?>


<?php
$j=1;
?>


<ul>
    <?php while($j<=10): ?>
    <li> item<?=$j?> </li> 
    
    <?php
    $j++;
    endwhile;
    ?>
    <!-- 變數混HTML -->
</ul>

<h2>do while</h2>

<?php 
$k=1;
do{
    echo"$k<br>";
    $k++;
}while($k<10); 
?>

<h2>for</h2>
<?php
for($i=1;$i<10;$i++){
    echo $i."<br>";
}
?>

<ul>
    <?php for ($i=1;$i<=10;$i++):?>
        <li> item<?=$i?> </li>
        <?php endfor;?>
</ul>

<h2>break</h2>
<?php
for($i=0;$i<10;$i++){
    if($i===4)break;
    echo"$i<br>";
}
?>

<h2>continue</h2>

<?php
for($i=0;$i<20;$i++){
    if($i%3!=0)continue; // $i 不是 3 的倍數），則使用 continue 關鍵字跳過後面的代碼，進入下一次迴圈迭代。
    echo"$i<br>"; //這是在滿足條件的情況下執行的代碼
}

