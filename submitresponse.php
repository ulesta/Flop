<?php 
$date = $_POST['passedArray'];
$date = explode(',', $date);
$passedSN = $_POST['passedSN'];

$con = mysqli_connect('flop.atleusdigital.com','flopper','flopper123','flopmysql');
if (!$con) {
	echo "Could not connect to db! :(";
  die('Could not connect: ' . mysqli_error($con));
}
// echo "HI THERE".$date[0];
// echo "OH HELLO".$date[1];
//mysqli_select_db($con, dbname);

$r="INSERT INTO ResponseList (TimeAvailable, personID, sn) VALUES ";
foreach($date as $v)
{
	$r.="('".$v."','0','".$passedSN."'),";
}
rtrim($r, ",");
$r = substr_replace($r ,"",-1);

echo $r;
if (!mysqli_query($con,$r)) {
	die('Error: ' . mysqli_error($con));
	echo "BAD BOY!";
} else {
	echo "insert succeeded!";
}

mysqli_close($con);

 ?>