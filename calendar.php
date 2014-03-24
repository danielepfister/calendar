<?php
// Connect to the server
include('config.php');
mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');

//Connect to database
mysql_select_db($dbname) or die( "Unable to select database");

// Function to see if there is anything in a particular field
function checkField ($fieldInput, $fieldName) {
	if (!$fieldInput) {
	}	
	else {
		echo $fieldName . ': ' . $fieldInput . '<br/>';
	}
}

// Display Events Function
// $displayMonth = month that you want to query and display
// $#displayYear = current year you want to pull
function displayEvents ($displayMonth, $sectionYear) {
	global $displayYear;
	$query="SELECT * FROM events WHERE startMonth='$displayMonth' AND startYear = $sectionYear AND schoolYear='$displayYear'";
	$result=mysql_query($query); 
	$rows=mysql_num_rows($result);
	for ($i=0 ; $i<$rows ; ++$i)
	{
		$row = mysql_fetch_row($result);
		echo 'ID: ' . $row[0] . '<br/>';
		echo 'Event Title: ' . $row[1] . '<br/>';
		echo 'School Year: ' . $row[2] . '<br/>';
		
		checkField ($row[3], 'Location');
		checkField ($row[4], 'Description');
		if (!$row[5]) {
		}	
		else {
			echo 'Link: <a href="' .$row[5]. '"> Event Link</a> <br/>';
		}
		
		echo 'Start: ' . date('F', mktime(0, 0, 0, $row[6], 1, 2000));

		// Checks to see if there is a start date
		if ($row[7] == 0) {
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
			echo ', '. $row[8] . ' &ndash; ' . date('F', mktime(0, 0, 0, $row[9], 1, 2000)) . ' ' . $row[10];
		}

		echo ', ' . $row[8] . '<br/>'; // Print the year

		echo 'Post to Home: ' . $row[12];

		echo '<br/><br/>';
	}
}
?> 

<!-- April Events -->
<h1>April</h1>
<?php displayEvents ('4', 2013); ?>

<!-- March Events -->
<h1>March</h1>
<?php displayEvents ('3', 2013); ?>

<!-- July Events -->
<h1>July</h1>
<?php displayEvents ('7', 2013); ?>

<!-- October Events -->
<h1>October</h1>
<?php displayEvents ('10', 2014); ?>

<?php mysql_close(); ?>
