<?php

$sn = $_GET["id"];

$EventID="1";
$con = mysqli_connect('flop.atleusdigital.com','flopper','flopper123','flopmysql') or   die('Could not connect: ' . mysqli_error($con));;

$string="SELECT TimeAvailable, COUNT('TimeAvailable') 
FROM ResponseList
WHERE SN='".$sn."'
GROUP BY TimeAvailable
ORDER BY COUNT('TimeAvailable') DESC
LIMIT 0 , 30";

$result = mysqli_query($con,$string);

$row = mysqli_fetch_array($result);
$bestDate=$row['TimeAvailable'];

$row = mysqli_fetch_array($result);
$secondBest=$row['TimeAvailable'];

$row = mysqli_fetch_array($result);
$thirdBest=$row['TimeAvailable'];

echo $bestDate.",".$secondBest.",".$thirdBest;

  mysqli_close($con);
?>