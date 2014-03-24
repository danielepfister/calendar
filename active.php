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


		echo '<p><strong>' .$eventTitle. '</strong><br />';
		
		echo date('F', mktime(0, 0, 0, $startMonth, 1, 2000));
		
		// Checks to see if there is a start date
		if ($startDate == 0) {
			echo 'TBD';
		} 
		else {
			 echo ' '. $startDate;
		}
		
		// Logic for displaying events that have an end date
		if ($endMonth == 0) { // Checks to see if there is an end date. If not, then print nothing 
		}
		elseif ($startMonth == $endMonth) { // If there is an end date, check to see if it's in the same month as the start month. If so, print as continuation.
			echo ' &ndash; ' . $endDate;			
		} 
		else { // If end date is in a different month than the start date, print end month name
			echo ', '. $row[8] . ' &ndash; ' . date('F', mktime(0, 0, 0, $row[9], 1, 2000)) . ' ' . $endDate;
		}
 		
		echo ', ' .$startYear;
		
		echo '<br/>';
		
		echo '<em>';
		
		echo $location;
		
		echo '</em></p>';



$i++;
}


// If there are no scheduled events, print the no events message
if (!mysql_num_rows($result)) {
echo "No results";
}


?>
</body>