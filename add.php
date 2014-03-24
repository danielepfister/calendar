<?php
/*
    This file is a part of Basic PHP Event Lister.  Copyright (c) 2008 Mark MacCollin, Mevin Productions, www.mevin.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/ 

include('config.php'); 

?>

<h1>Add a New Event</h1>

<?php 
	
include ('db.php'); 

if (!isset($_POST['submit'])) {
	
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
	
	// Ensure the form data is being sent from YOUR server and not someone elses.   
	if (strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'])>7 || !strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']))
	die("<span class='error'>Error! Bad Referer</span> ");
	
	$validation_error = ($ud_schoolYear == "")||($ud_startMonth == "")||($ud_startYear == "")||($ud_eventTitle == "")||($ud_postToHome == "");
	
	if ($validation_error)
	{  echo "<p>It looks like you missed some values. Please go back and fill in all required fields.<br><br>
	<center><form><input type=\"button\" value=\" Back \" onClick=\"history.go(-1)\"></form> </center>
	";
	exit();
	}

	
	// Database connection
	
	mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname) or die( "Unable to select database");
	$query =  "INSERT INTO events VALUES (

	'',
	'$ud_eventTitle',
	'$ud_schoolYear',
	'$ud_location',
	'$ud_description',
	'$ud_link',
	'$ud_startMonth',
	'$ud_startDate',
	'$ud_startYear',
	'$ud_endMonth',
	'$ud_endDate',
	'$ud_endYear',
	'$ud_postToHome')";

	
	$rt=mysql_query($query);
	
	

	if ($rt) {
		
		$successAdd = "Congrats! Record added to database.";
		echo "<div class='alert'>" . $successAdd . "</div>";
		include ('form.php'); 
		
		}

	else { 

		mysql_error(); 
		
		} 

	mysql_close();

}

?>            
