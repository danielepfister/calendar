<?php
// Connect to the server
include('config.php');
mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');

//Connect to database
mysql_select_db($dbname) or die( "Unable to select database");

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





<table  width="605" border="0" cellspacing="0" cellpadding="8" id="calendar">

<?php displayEvents ('6', 2013); ?>

<?php displayEvents ('7', 2013); ?>

<?php displayEvents ('8', 2013); ?>

<?php displayEvents ('9', 2013); ?>

<?php displayEvents ('10', 2013); ?>

<?php displayEvents ('11', 2013); ?>

<?php displayEvents ('12', 2013); ?>

<?php displayEvents ('1', 2014); ?>

<?php displayEvents ('2', 2014); ?>

<?php displayEvents ('3', 2014); ?>

<?php displayEvents ('4', 2014); ?>

<?php displayEvents ('5', 2014); ?>

<?php displayEvents ('6', 2014); ?>

<?php displayEvents ('7', 2014); ?>

</table>

<?php mysql_close(); ?>
