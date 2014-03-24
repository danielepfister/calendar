<?php

$id=$_GET['id'];
include('config.php');
include ('db.php');


$startMonthName = $startMonth;
$ud_startMonth = date("F", mktime(0, 0, 0, $startMonthName, 10));



if (!isset($_POST['submit'])) {

	echo "<h1>Update Event:</h1>";
	include ('form.php'); 

}
 
else {

	$ud_schoolYear = $_POST['ud_schoolYear'] ;
	$ud_location = $_POST['ud_location'] ;
	$ud_startMonth = $_POST['ud_startMonth'] ;
	$ud_startDate = $_POST['ud_startDate'] ;
	$ud_startYear = $_POST['ud_startYear'] ;
	$ud_endMonth = $_POST['ud_endMonth'] ;
	$ud_endDate = $_POST['ud_endDate'] ;
	$ud_endYear = $_POST['ud_endYear'] ;
	$ud_eventTitle = $_POST['ud_eventTitle'] ;
	$ud_postToHome = $_POST['ud_postToHome'] ;
	$ud_description = $_POST['ud_description'] ;
	$ud_link = $_POST['ud_link'] ;

	$ud_eventTitle=preg_replace("/\'/","&#039;", ($ud_eventTitle));
	$ud_description=preg_replace("/\'/","&#039;", ($ud_description));

	include('config.php');
	mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname) or die( "Unable to select database");

	$query = "UPDATE events SET id = '$id', schoolYear = '$ud_schoolYear', location = '$ud_location', startMonth = '$ud_startMonth', startDate = '$ud_startDate', startYear = '$ud_startYear', endMonth = '$ud_endMonth', endDate = '$ud_endDate', endYear = '$ud_endYear', eventTitle = '$ud_eventTitle', postToHome = '$ud_postToHome', description = '$ud_description', link = '$ud_link' WHERE id = '$id'";

	$rt=mysql_query($query);

	if ($rt) {
		echo "<h1>Event Updated!</h1><p><a href='list-all.php'>Return to Events Home</a></p>"; 
	}

	else { 
		mysql_error(); 
	} 

	mysql_close();

}

?>