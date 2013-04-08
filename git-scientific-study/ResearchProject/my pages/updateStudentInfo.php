<?php
$DB_HostName = "69.166.62.8";
$DB_Name = "bo.wang";
$DB_User = "bo.wang";
$DB_Pass = "password"; //need authentication
$DB_Table1 = "Student_participate_Event";
$DB_Table2 = "Event";
$DB_Table0 = "Student";

$sID = $_GET["sid"];


$con = mysql_connect($DB_HostName,$DB_User,$DB_Pass) or die(mysql_error()); 
mysql_select_db($DB_Name,$con) or die(mysql_error());


?>


<html>

	<h2>
		<?
		$sql = "SELECT * FROM $DB_Table0 WHERE sID=$sID";
		$res = mysql_query($sql,$con) or die(mysql_error());

		$row = mysql_fetch_array($res);
		echo $row['f_name']." ".$row['l_name'];
		?>
	</h2>
	
	<p>Email:
		<?
		echo $row['email'];
		?>
		<form action='editEmail.php' method ='GET'>
			<button name="sid" type="submit" value=<? echo $sID ?>>Update</button><button name="sid" type="submit" value=<? echo $sID ?>>Add</button>
		</form>
	</p>
	<p>Phone:
		<?
		echo $row['phone'];
		?>
		<button name="sid" type="submit" value=<? echo $sID ?>>Update</button><button name="sid" type="submit" value=<? echo $sID ?>>Add</button>
	</P>


</html>
