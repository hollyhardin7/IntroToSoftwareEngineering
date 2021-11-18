<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function: 
    This is the Mysql query is called by "EditEventToDatabase.php".
    It delete event from database first for achieve the "Edit" moduel function.
Citation:
    [0]: Reference. URL: https://www.w3schools.com/php/php_mysql_insert.asp
-->

<?php
# Query to delete an event from the database
$sql = "DELETE FROM `calendar`.`event` WHERE (`event_id` = '$event_id');";
# Send query to database [0]
$conn->query($sql);
?>
