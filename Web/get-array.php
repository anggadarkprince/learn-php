<?php
// get-array.php?numbers[]=1&numbers[]=2
// get-array.php?numbers[0]=1&numbers[1]=2
$numbers = $_GET['numbers'];
$total = 0;

foreach ($numbers as $number){
    $total += $number;
}
?>
<html>
<body>
<h1>Total = <?= $total ?></h1>
</body>
</html>