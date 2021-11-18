<!DOCTYPE html>
<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function:
	Invoked by "DeleteEvent.php", after get user's confirmation, this php file talks to database to delete the event.
Citation:
	[0]: Reference. URL:  https://www.w3schools.com/html/html_tables.asp
	[1]: Reference. URL:  https://blackswan.ch/archives/811 
	[2]: Reference. URL: https://www.w3schools.com/php/func_mysqli_connect.asp 
    [3]: Reference. URL: http://php.net/manual/en/reserved.variables.session.php 
    [4]: Reference. URL: http://php.net/manual/en/mysqli.close.php 
    [5]: Reference. URL: http://php.net/manual/en/mysqli.query.php 
    [6]: Reference. URL: http://php.net/manual/en/mysqli-result.fetch-array.php
-->
<html>
<body>

<!-- Style for calendar [0] -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
th { text-align: right; }
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
</style>

<?php
# Connection data [2]
$server = "ix.cs.uoregon.edu";
$user = "guest";
$pass = "guest";
$dbname = "calendar";
$port = "3728";
# Open database connection [2]
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');

# Start new session [1]
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

# Get and pass along the index of the current month being displayed [3]
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;

# Get event id [3]
$event_id = $_SESSION['event_id'];

# Include the query that deletes an event
include 'deletequery.php';

# Query to get the current month from database
$current_query = "SELECT * FROM calendar.month WHERE month_id = ".$current_index;
# Submit query to database [5]
$current_result = mysqli_query($conn, $current_query) or die (mysqli_error($conn));
# Fetch result from the database [6]
$current_month = mysqli_fetch_array($current_result, MYSQLI_BOTH);

# Get the index of the previous month being displayed
$prev_index = $current_index - 1;
# Query to get the previous month from database
$prev_query = "SELECT * FROM calendar.month WHERE month_id = ".$prev_index;
# Submit query to database [5]
$prev_result = mysqli_query($conn, $prev_query) or die (mysqli_error($conn));
# Fetch result from the database [6]
$prev_month = mysqli_fetch_array($prev_result, MYSQLI_BOTH);

# Get the index of the next month being displayed
$next_index = $current_index + 1;
# Query to get the next month from the database
$next_query = "SELECT * FROM calendar.month WHERE month_id = ".$next_index;
# Submit query to database [5]
$next_result = mysqli_query($conn, $next_query) or die (mysqli_error($conn));
# Fetch result from the database [6]
$next_month = mysqli_fetch_array($next_result, MYSQLI_BOTH);

# Include the calendar
include 'calendar.php';
# Include buttons (next month, previous month, add event, edit event, delete event
include 'buttons.php';

# Close database connection [4]
mysqli_close($conn);
?>

</body>
</html>
