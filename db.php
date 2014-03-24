<?php

$page_name = basename($_SERVER['PHP_SELF']);

if ($page_name == 'add.php') { $submit_label = 'Add Event'; }
if ($page_name == 'update.php') { $submit_label = 'Update Event'; }
if ($page_name == 'copy.php') { $submit_label = 'Copy Event'; }

if ($page_name == 'add.php') {

$id='';
$schoolYear= ($schoolYear);
$location='';
$startMonth='';
$startDate='';
$startYear=($current_year);
$endMonth='';
$endDate='';
$endYear='';
$eventTitle='';
$postToHome='';
$description='';
$link='';

}

else {

mysql_connect($dbhost,$dbuser,$dbpass) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname) or die( "Unable to select database");

$query=" SELECT * FROM events WHERE id='$id'";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

$i=0;
while ($i < $num) {

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

$i++;
}
}

?>