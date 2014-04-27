<?php






// Function to see if there is anything in a particular field
function checkField ($fieldInput, $className) {
	if (!$fieldInput) {
	}	
	else {
		echo '<div class="' .$className. '">' . $fieldInput . '</div>';
	}
}

// Display Events Function
// $displayMonth = month that you want to query and display
// $#displayYear = current year you want to pull
function displayEvents ($displayMonth, $sectionYear) {
	global $displayYear;
	$query="SELECT * FROM events WHERE startMonth='$displayMonth' AND startYear = $sectionYear AND schoolYear='$displayYear' ORDER BY startDate ASC";
	$result=mysql_query($query); 
	$rows=mysql_num_rows($result);
	
	echo '<tr class="empty"><td colspan="2"><h4>' .date('F', mktime(0, 0, 0, $displayMonth, 1, 2000)).' '.$sectionYear. '</h4></td></tr>';
	
	for ($i=0 ; $i<$rows ; ++$i)
	{
		$row = mysql_fetch_row($result);
		echo '<tr>';
		echo '<td width="15%" valign="top">';

		// Checks to see if there is a start date
		if ($row[7] == 0) {
			echo ' TBD';
		} 
		else {
			 echo ' '. $row[7];
		}
		
		// Logic for displaying events that have an end date
		if ($row[9] == 0) { // Checks to see if there is an end date. If not, then print nothing 
		}
		elseif ($row[6] == $row[9]) { // If there is an end date, check to see if it's in the same month as the start month. If so, print as continuation.
			echo ' &ndash; ' . $row[10];			
		} 
		else { // If end date is in a different month than the start date, print end month name
			echo ' &ndash; ' . date('F', mktime(0, 0, 0, $row[9], 1, 2000)) . ' ' . $row[10];
		}
 		
		echo '</td>';
		
		echo '<td><div class="event">'. $row[1] . '</div> ';
				
		checkField ($row[3], 'location');
		checkField ($row[4], 'description');
		if (!$row[5]) {
		}	
		else {
			echo '<a href="' .$row[5]. '">More Information</a> <br/>';
		}
		
		echo '</td>';
		echo '</tr>';
	}
}
?> 

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
