<?php
$name = $_POST['name'];
$watts = $_POST['watt'];
$bill = 0;

echo "Hello ".$name;
if($watts<=50){
    $bill = $watts*3.5;
}
elseif($watts>50 && $watts<=150){
    $bill = 50*3.5;
    $watts = $watts-50;
    $bill = $bill + $watts*4;

}
elseif($watts>150 && $watts<=250){
    $bill = 50*3.5 + 100*4;
    $watts = $watts - 150;
    $bill = $bill + $watts*5.2;
}
else{
    $bill = 50*3.5 + 100*4 + 100*5.2;
    $watts = $watts - 250;
    $bill = $bill + $watts*6.5;
}

echo "<h1>Your bill is: Rs".$bill."</h1>";


?>