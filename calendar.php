<?php 
include('config.php');

mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');

//Connect to database
mysql_select_db($dbname) or die( "Unable to select database");


function buildCalendar ($calendarStartMonth, $calendarStartYear, $calendarEndMonth, $calendarEndYear){

	// pull in constants 
	global $displayYear;
	$calendarDisplayYear = $calendarStartYear."-".$calendarEndYear;
	
	
	if ($calendarStartYear < $calendarEndYear) {
			if ($displayYear != $calendarDisplayYear) {
				echo ("The calendar build year does not match the display year in config.php"); 
			} else {
				// is the startYear less than endYear
				// if yes, than query for events from startMonth to december
				$startYearQuery="SELECT * FROM events WHERE startYear='$calendarStartYear' AND schoolYear='$displayYear' ORDER BY startDate ASC";
				$startYearResult=mysql_query($startYearQuery); 
				$startYearRows=mysql_num_rows($startYearResult);
				echo "Year:".$calendarStartYear;
				for ($i=0 ; $i<$startYearRows ; ++$i) {
					$row = mysql_fetch_row($startYearResult);
					echo $row[1];
					echo "hello";
				}
				// NEXT, query from January in endYear to the endMonth
				$endYearQuery="SELECT * FROM events WHERE startYear='$calendarEndYear' AND schoolYear='$displayYear' ORDER BY startDate ASC";
				$endYearResult=mysql_query($endYearQuery); 
				$endYearRows=mysql_num_rows($endYearResult);
				echo "Year:".$calendarEndYear;
				for ($i=0 ; $i<$endYearRows ; ++$i) {
					$row = mysql_fetch_row($endYearResult);
					echo $row[1];
					echo "hello";
				}
			}
		} else {
			
			// if no, 
				// query from January to the endMonth
				
					
					
					$singleYearQuery="SELECT * FROM events WHERE startYear='$calendarStartYear' AND schoolYear='$displayYear' ORDER BY startDate ASC";
					$singleYearResult=mysql_query($singleYearQuery); 
					$singleYearRows=mysql_num_rows($singleYearResult);
		
					
					for ($i=0 ; $i<$singleYearRows ; ++$i) {
						$row = mysql_fetch_row($singleYearResult);
						echo $row[1];
						echo "hello";
					} 
					
				
			
			}
	
	
	
	
	
	
	
	 
			
}
?>

<?php buildCalendar (4, 2013, 4, 2014); ?>

<p>hello</p>

<?php mysql_close(); ?>
