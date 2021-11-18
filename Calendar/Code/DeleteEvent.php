<!DOCTYPE html>
<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function:
	Invoked by "ChooseEventToDelete.php", after user select the event, this will display the event one more time for user to double check.
   If the user confirm and click "submit" it will invoke next page "DeleteEventToDatabase.php" to delete event from database
   This php file adds information to the database and displays the updated calendar
Citation:
	[0]: Reference. URL:  https://www.w3schools.com/html/html_tables.asp
	[1]: Reference. URL:  https://blackswan.ch/archives/811 
   [2]: Reference. URL: https://www.w3schools.com/php/func_mysqli_connect.asp 
   [3]: Reference. URL: http://php.net/manual/en/reserved.variables.session.php 
   [4]: Reference. URL: http://php.net/manual/en/mysqli.close.php 
   [5]: Reference. URL: http://php.net/manual/en/mysqli.query.php 
   [6]: Reference. URL: http://php.net/manual/en/mysqli-result.fetch-array.php 
   [7]: Reference. URL: https://www.w3schools.com/tags/att_button_formmethod.asp 
   [8]: Reference. URL: https://www.w3schools.com/tags/tag_select.asp 
   [9]: Reference. URL: http://php.net/manual/en/reserved.variables.post.php 
   [10]: Reference. URL: http://php.net/manual/en/mysqli.real-escape-string.php
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

# Get event id from previous page (ChooseEventToDelete.php) [9]
$event_id = $_POST['event_id'];
# Create an SQL string [10]
$event_id = mysqli_real_escape_string($conn, $event_id);
# Pass along the event id [3]
$_SESSION['event_id'] = $event_id;

# Query to get event from database according to event id
$query = "SELECT * FROM calendar.event WHERE event_id = ".$event_id;
# Submit query to database [5]
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
# Fetch results from the database [5]
$event = mysqli_fetch_array($result, MYSQLI_BOTH);

# Display the purpose of the page (Delete Event)
echo "<font size ='16'><b>Delete Event</b></font>";
# Display the event's name
echo "<br>Event name: ".$event['name'];
# Display the event's date
echo "<br>Event date: ".$event['start_date'];
# Display event's time
# If the minute is a single digit, then print a 0 before it
if ($event['start_minute'] < '10')
   echo "<br>Event time (24 Hour Clock): ".$event['start_hour'].":0".$event['start_minute'];
else
   echo "<br>Event time (24 Hour Clock): ".$event['start_hour'].":".$event['start_minute'];
# Display event's description
echo "<br>Event description: ".$event['description'];
# Displays event's priority
echo "<br>Event priority: ".$event['priority'];
# Display event's category
echo "<br>Event category: ".$event['categories'];

# Display button for deleting the event [7]
echo "<br><br><form action='DeleteEventToDatabase.php' method ='POST'><input type='submit' value='Delete Event'></form>";
# Display button for cancelling the deletion of an event [7]
echo "<form action='DisplayCalendar.php' method='POST'><input type='submit' value='Cancel'></form><br>";

# Close database connection [4]
mysqli_close($conn);
?>

</body>
</html>
