<?php
$DB_HostName = "69.166.62.8";
$DB_Name = "bo.wang";
$DB_User = "bo.wang";
$DB_Pass = "password"; //need authentication
$DB_Table0 = "Student";

$sID = $_GET["sid"];
$email = $_GET['email'];

$con = mysql_connect($DB_HostName,$DB_User,$DB_Pass) or die(mysql_error()); 
mysql_select_db($DB_Name,$con) or die(mysql_error());


?>

<html>
<form action='' method ='GET'>
	<p>Email
		<input type="hidden" name="sid" value="<? echo $sID ?>">
		<input type="text" name="email"><input type="submit" name="submit" value="Update">
	</p>
</form>

<?
if ($email != ''){
	$sql = "UPDATE $DB_Table0 SET email='$email' WHERE sID=$sID";
	$res = mysql_query($sql,$con) or die(mysql_error());

	if ($res) {
		echo "success";
	}else{
		echo "faild";
	}
}	
?>
</html>