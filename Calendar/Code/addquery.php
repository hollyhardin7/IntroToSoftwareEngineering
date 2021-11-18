<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function: 
    This is the Mysql query to send the session variable to the database (i.e. add event to database)
Citation:
    [0]: Reference. URL: https://www.w3schools.com/php/php_mysql_insert.asp 
-->

<?php
# Query to insert an event into the database
$sql = "INSERT INTO `calendar`.`event` (`event_id`, `name`, `start_date`, `start_hour`, `start_minute`, `description`, `priority`, `categories`) VALUES ('$event_id', '$name', '$start_date', '$start_hour', '$start_minute', '$description', '$priority', '$category');";
# Send query to database [0]
$conn->query($sql);
?>
