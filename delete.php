<?php
// Include main congfig file
include('config.php');

// Get record ID number
$id=$_GET['id'];

// Connect to the database
mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die( "Unable to select database");
$query=" SELECT * FROM events WHERE id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();
$i=0;

while ($i < $num) {
	// grab the data from the specified id
	$id=mysql_result($result,$i,"id");
	$eventTitle=mysql_result($result,$i,"eventTitle");
	$i++;
}
if (!isset($_POST['submit'])) { ?>

	<h1>Delete Event</h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="post">
	<div class="message"><h1>Are you sure you want to proceed? This Action CANNOT be undone </h2> <p>You are trying to delete this event: <?php echo $eventTitle; ?></p></div>
	<br>
	<input type="hidden" name="ud_id" value="<?php echo $id; ?>">
	<center><input type="submit" name="submit" value="YES DELETE"> &nbsp; <input type=button value=" NO CANCEL " onClick="history.go(-1)"></center>
	</form>
	
<?php 
} 

else {

	$ud_id=$_POST['ud_id'];

	include('config.php');

	//Database connection
	mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname) or die( "Unable to select database");

	// here we limit the delection process to just one, so if we made a mistake, it only deletes one event and not the entire database.
	$query = "DELETE FROM events WHERE id='$ud_id' LIMIT 1";
	mysql_query($query);

	if ($query)
	{ echo "<h1>Event Deleted!</h1><p><a href='list-all.php'>Return to Events Home</a></p>"; }

	else { echo "Error!"; }

	mysql_close();

}

?>