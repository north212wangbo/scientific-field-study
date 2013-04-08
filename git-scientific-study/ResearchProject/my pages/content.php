<?php
$DB_HostName = "69.166.62.8";
$DB_Name = "bo.wang";
$DB_User = "bo.wang";
$DB_Pass = "password"; //need authentication
$DB_Table1 = "Sample";
$DB_Table2 = "Event";
$DB_Table0 = "Student";
$DB_Table3 = "Student_collect_Sample";

$sID = $_GET["id"];

$con = mysql_connect($DB_HostName,$DB_User,$DB_Pass) or die(mysql_error()); 
mysql_select_db($DB_Name,$con) or die(mysql_error());
?>

<html>
<head>
<title>HTML Frames Example - Content</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;
	margin:30px;
	background-color:#ffffff;
	}
</style>
</head>
<body>
<h1>Student Center</h1>
<h2>My Profile</h2>
<ul>
	<form action='updateStudentInfo.php' method ='GET'>
		<p>
			<button name="sid" type="submit" value=<? echo $sID ?>>Edit</button>
		</p>
	</form>
</ul>

<h2>Upcoming Events</h2>
<ul>
	<?
	$sql = "SELECT * FROM $DB_Table2 WHERE DATE(time) > CURDATE()";
	$res = mysql_query($sql,$con) or die(mysql_error());
	
	while($row = mysql_fetch_array($res))
	{
		echo "<p>"."<li><a href=\"tripInfo.php?id=".$row['eID']."\" target=\"content\">".$row['name']."</a></li>"; 
		echo "<br/> Location:".$row['location'];
		echo "<br/>Description:".$row['desc'];
		echo "</p>";?>
		<form action='insertStudentPaticipate.php' method ='GET'>
			<p>
				<input name="eid" type="hidden" value="<? echo $row['eID'] ?>"/>
				<button name="id" type="submit" value="<? echo $sID ?>">Register</button>
			</p>	
		</form>
		
		<form action='deleteStudentPaticipate.php' method ='GET'>
			<p>
				<input name="eid" type="hidden" value="<? echo $row['eID'] ?>"/>
				<button name="id" type="submit" value="<? echo $sID ?>">Drop</button>
			</p>	
		</form>
	<?
	}
	?>

	
</ul>

<h2>My Samples</h2>
<ul>
	<?
	$sql = "SELECT * FROM $DB_Table3 NATURAL JOIN $DB_Table1 WHERE sID=$sID";
	$res = mysql_query($sql,$con) or die(mysql_error());
	$samples = array();
	while($row = mysql_fetch_array($res))
	{
		echo "<p>"."<li><a href=\"sampleInfo.php?id=".$row['saID']."\" target=\"content\">".$row['name']."</a></li>"; 
		echo "<br/> Amount:".$row['amount'];
		echo "<br/>Description:".$row['desc'];
		echo "</p>";
	}
	?>
</ul>
<!--
<h2>Replacing the Whole Frameset</h2>
<p>When you click on any of the following links, the whole frameset is replaced with the new website. This is because we're using <code>target="_top"</code> in the anchor links.</p>
<ul>
	<li><a href="http://www.quackit.com" target="_top">Quackit</a></li>
	<li><a href="http://www.quackit.com/html/templates/frames/" target="_top">HTML Frames Templates</a></li>
	<li>Learn more about frames with the <a href="http://www.quackit.com/html/tutorial/html_frames.cfm" target="_top">frames tutorial</a><//li>
</ul>

<h2>Open a New Window</h2>
<p>These links open in a new browser window. This is because we use <code>target="_blank"</code>.</p>
<ul>
	<li><a href="http://www.code-generator.net" target="_blank">Code Generator</a></li>
	<li><a href="http://www.zappyhost.com" target="_blank">ZappyHost</a></li>
	<li><a href="http://www.natural-environment.com" target="_blank">Natural Environment</a></li>
	<li><a href="http://www.great-workout.com" target="_blank">Great Workout</a></li>
</ul> 
-->

</body>
</html>
