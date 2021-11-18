<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function: 
    This page define all the session variable for passing all the data may require by different moduels.
Citation:
    [0]: Reference. URL: http://php.net/manual/en/reserved.variables.post.php
    [1]: Reference. URL: http://php.net/manual/en/mysqli.real-escape-string.php
-->


<?php
# Get name of event from previous page (AddEvent.php or EditEvent.php) [0]
$name = $_POST['name'];
# Create an SQL string [1]
$name = mysqli_real_escape_string($conn, $name);
# Get year of event from previous page (AddEvent.php or EditEvent.php) [0]
$start_year = $_POST['start_year'];
# Create an SQL string [1]
$start_year = mysqli_real_escape_string($conn, $start_year);
# Get month of event from previous page (AddEvent.php or EditEvent.php) [0]
$start_month = $_POST['start_month'];
# Create an SQL string [1]
$start_month = mysqli_real_escape_string($conn, $start_month);
# Get day of event from previous page (AddEvent.php or EditEvent.php) [0]
$start_day = $_POST['start_day'];
# Create an SQL string [1]
$start_day = mysqli_real_escape_string($conn, $start_day);
# Create a date variable that is in the correct format for SQL
$start_date = $start_year."-".$start_month."-".$start_day;
# Get hour of event from previous page (AddEvent.php or EditEvent.php) [0]
$start_hour = $_POST['start_hour'];
# Create an SQL string [1]
$start_hour = mysqli_real_escape_string($conn, $start_hour);
# Get minute of event from previous page (AddEvent.php or EditEvent.php) [0]
$start_minute = $_POST['start_minute'];
# Create an SQL string [1]
$start_minute = mysqli_real_escape_string($conn, $start_minute);
# Get description of event from previous page (AddEvent.php or EditEvent.php) [0]
$description = $_POST['description'];
# Create an SQL string [1]
$description = mysqli_real_escape_string($conn, $description);
# Get category of event from previous page (AddEvent.php or EditEvent.php) [0]
$category = $_POST['category'];
# Create an SQL string [1]
$category = mysqli_real_escape_string($conn, $category);
# Get priority of event from previous page (AddEvent.php or EditEvent.php) [0]
$priority = $_POST['priority'];
# Create an SQL string [1]
$priority = mysqli_real_escape_string($conn, $priority);
?>
