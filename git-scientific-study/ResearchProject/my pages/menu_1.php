<?php
$DB_HostName = "69.166.62.8";
$DB_Name = "bo.wang";
$DB_User = "bo.wang";
$DB_Pass = "password"; //need authentication
$DB_Table1 = "Student_participate_Event";
$DB_Table2 = "Event";
$DB_Table0 = "Student";

$sID = $_GET["id"];


$con = mysql_connect($DB_HostName,$DB_User,$DB_Pass) or die(mysql_error()); 
mysql_select_db($DB_Name,$con) or die(mysql_error());
?>

<html>
<head>	
<title>HTML Frames Example - Menu 1</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;
	margin:10px;
	background-color:#C7EDCC;
	}
</style>
</head>
<body>
<h3>
	<?
	$sql = "SELECT * FROM $DB_Table0 WHERE sID=$sID";
	$res = mysql_query($sql,$con) or die(mysql_error());
	
	$row = mysql_fetch_array($res);
	echo $row['f_name']." ".$row['l_name'];
	?>
</h3>
<p>My Events:</p>

<?php
	$sql = "SELECT * FROM $DB_Table2 NATURAL JOIN $DB_Table1 WHERE sID=$sID";
	$res = mysql_query($sql, $con) or die(mysql_error());
	
	while($row = mysql_fetch_array($res))
	{
		echo "<p>".$row['name'] ."<br/> Location:".$row['location'];

		echo "<br/>Description:".$row['desc'];
		echo "</p>";
	}
	
?>

<!-- 
<a href="http://www.quackit.com/html/templates/frames/frames_example_1.html" target="_top">Example 1</a><br />
<a href="http://www.quackit.com/html/templates/frames/frames_example_2.html" target="_top">Example 2</a><br />
<a href="http://www.quackit.com/html/templates/frames/frames_example_3.html" target="_top">Example 3</a><br />
<a href="http://www.quackit.com/html/templates/frames/frames_example_4.html" target="_top">Example 4</a><br />
<a href="http://www.quackit.com/html/templates/frames/frames_example_5.html" target="_top">Example 5</a><br />
-->
</body>
</html>
