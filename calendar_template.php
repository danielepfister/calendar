<?php
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
?>