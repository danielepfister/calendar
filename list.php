<?php


$status=$_GET['status'];
if($status ==null) {
	$status = 'all';
}


//Connect To Database
include('config.php');
mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die( "Unable to select database");


$queryActive="SELECT * FROM events WHERE 
(startYear >= $current_year AND startMonth > $current_month AND postToHome = 1) 
OR (startYear >= $current_year AND startMonth = $current_month AND startDate >= $current_day AND postToHome = 1) 
OR (endYear >= $current_year AND endMonth = $current_month AND endDate >= $current_day AND postToHome = 1) 
OR (startYear > $current_year AND postToHome = 1) 
 
ORDER BY startYear, startMonth, startDate LIMIT 0, $maxnum";

$queryAll="SELECT * FROM events ORDER BY startYear DESC";

$queryCalendar="SELECT * FROM events WHERE schoolYear = '$displayYear' ORDER BY startYear DESC";


if ($status=='active') {
	$result=mysql_query($queryActive); 
}
else if ($status=='all') { 
	$result=mysql_query($queryAll); 
}
else if ($status=='calendar') { 
	$result=mysql_query($queryCalendar); 
}
else { 
	$result=mysql_query($queryAll); 
}


$num=mysql_numrows($result);
mysql_close();

$i=0;
while ($i < $num) {

//Get all the data and assign variables
$id=mysql_result($result,$i,"id");
$schoolYear=mysql_result($result,$i,"schoolYear");
$location=mysql_result($result,$i,"location");
$startMonth=mysql_result($result,$i,"startMonth");
$startDate=mysql_result($result,$i,"startDate");
$startYear=mysql_result($result,$i,"startYear");
$endMonth=mysql_result($result,$i,"endMonth");
$endDate=mysql_result($result,$i,"endDate");
$endYear=mysql_result($result,$i,"endYear");
$eventTitle=mysql_result($result,$i,"eventTitle");
$postToHome=mysql_result($result,$i,"postToHome");
$location=mysql_result($result,$i,"location");
$description=mysql_result($result,$i,"description");
$link=mysql_result($result,$i,"link");
// removes slashes
$description=stripslashes($description);

//replaces carriage returns with html line breaks
if ($html =="0") {
$description=preg_replace("/\n/","<br>", ($description));
}

// Here is where we actually print out the events.  
echo "<p>$startMonth/$startDate/$startYear<br><em>$eventTitle $link</em></p>";
echo "<a href='update.php?id=$id'>update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='delete.php?id=$id'>delete</a>"; 
$i++;
}


// If there are no scheduled events, print the no events message
if (!mysql_num_rows($result)) {
echo "No results";
}


?>
</body>