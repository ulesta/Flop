<?php
	
	$sn = $_GET["id"];

	$con = mysqli_connect('flop.atleusdigital.com','flopper','flopper123','flopmysql');
	if (!$con) {
		echo "Could not connect to db! :(";
	  die('Could not connect: ' . mysqli_error($con));
	}

	$result = mysqli_query($con,"SELECT DISTINCT * FROM EventDateTime WHERE SN='".$sn."'");


	$output = "";
	while($row = mysqli_fetch_array($result)) {
  		$output .= "".$row['EventTime'].",";
	}

	$output = substr_replace($output,"",-1);

	echo $output;

	mysqli_close($con);

?>