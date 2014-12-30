<?php

//$contact = $_POST['ContactID'];
//$eventID = $_POST['EventID'];

$contact="3";
$eventID="4";

$con = mysqli_connect('flop.atleusdigital.com','flopper','flopper123','flopmysql');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
//INSERT INTO INVITE LIST
mysqli_select_db($con, dbname);
//$string = /*SQL QUERY IN A STRING*/"SELECT b.* FROM eventTime a, response b WHERE a.eventID=b.eventID and a.userID= '".$q."'";
$string= "INSERT INTO InviteList (EventID,ContactID)
VALUES('".$contact."','".$eventID."')";

$result = mysqli_query($con,$string);
//UPDATE CONTACTS
$string = "SELECT * FROM ContactList a WHERE ContactID=".$contact;
$result = mysqli_query($con,$string);

while($row = mysqli_fetch_array($result)) {
	$v=$row['TimesInvited']+1;
	
	$s = "UPDATE Customers
SET TimesInvited='".$v."'
WHERE ContactID='".$contact."'";
}


$result = mysqli_query($con,$string);
mysqli_close($con);
?>