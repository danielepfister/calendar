<?php
include('config.php');
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}


$sql = <<<SQL
    SELECT *
    FROM `events`
    WHERE `schoolYear` = '2013-2014' 
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
} 

while($row = $result->fetch_assoc()){
    echo $row['eventTitle'] . '<br />';
}

echo 'Total results: ' . $result->num_rows;

?>