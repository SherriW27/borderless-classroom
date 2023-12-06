<h2>if else</h2>
<!-- not done yet~~ -->

<?php
$john_score=90;
$Sam_score=90;

// Using curly braces
if($john_score>$Sam_score){
    echo"John is better";
}elseif($john_score==$Sam_score){
    echo"John and Sam are equal";
}else{
echo"Sam is better";
    
}

// Using colon syntax 少了大括號和echo
if($john_score>$Sam_score) :?>
    John is better
<?php elseif($john_score==$Sam_score):
?>
John amd Sam are equal
<?php else:?>
    Sam is Better


 <?php endif; ?>