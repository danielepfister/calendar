<?php
//Connect To Database
include('config.php');
mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die( "Unable to select database");



$query="SELECT * FROM events WHERE 
(startYear >= $current_year AND startMonth > $current_month AND postToHome = 1) 
OR (startYear >= $current_year AND startMonth = $current_month AND startDate >= $current_day AND postToHome = 1) 
OR (endYear >= $current_year AND endMonth = $current_month AND endDate >= $current_day AND postToHome = 1) 
OR (startYear > $current_year AND postToHome = 1) 
 
ORDER BY startYear, startMonth, startDate LIMIT 0, $maxnum";

$result=mysql_query($query);
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
echo "<table>";
echo "
<tr><td valign='top'></td><td><p>$startMonth/$startDate/$startYear<br><em>$eventTitle $link</em></p></td>";
echo "</table>"; 
$i++;
}


// If there are no scheduled events, print the no events message
if (!mysql_num_rows($result)) {
echo "No results";
}


?>
</body>