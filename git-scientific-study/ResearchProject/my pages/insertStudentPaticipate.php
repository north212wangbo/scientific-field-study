<?php
$DB_HostName = "69.166.62.8";
$DB_Name = "bo.wang";
$DB_User = "bo.wang";
$DB_Pass = "password"; //need authentication 
$DB_Table1 = "Student_participate_Event";
$DB_Table2 = "Event";
$DB_Table0 = "Student";

$sID = $_GET["id"];
$eID = $_GET["eid"];

$con = mysql_connect($DB_HostName,$DB_User,$DB_Pass) or die(mysql_error()); 
mysql_select_db($DB_Name,$con) or die(mysql_error());


?>


<html>

	<h2>
		<?
		$sql = "INSERT INTO $DB_Table1 VALUES ($sID, $eID)";
		$res = mysql_query($sql,$con) or die(mysql_error());

		if ($res) {
			echo "You have successfully registered";
		}else{
			echo "Registration faild";
		}// end else
		
		?>
	</h2>
	


</html>