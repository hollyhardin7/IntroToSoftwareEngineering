<!DOCTYPE html>
<!-- 
Authors: Holly (HH)
Generate Date: 1/30/2019
Function:
	This PHP file contain MySQL query to read all the events from the database
	By display all the events in a dropdown menu, it allow user to select the event to EDIT
	It gets information for adding an event and sends it to AddEventToDatabase.php OR redirects to DisplayCalendar.php
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
# Open database connection to MySQL server [2]
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');

# Start new session [1]
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
session_start();

# Get and pass along the index of the current month being displayed [3]
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;

# Display the purpose of the page (Edit Event)
echo "<font size ='16'><b>Edit Event</b></font>";
# Send ifnormation to EditEvent.php
echo "<form action='EditEvent.php' method ='POST'>";
# Prompt the user to select an event to edit
echo "<br>Choose an event to edit:<br>";

# Query to get events from the database
$query = "SELECT * FROM calendar.event";
# Submit query to database [5]
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
echo "<select name='event_id'>";
# Display a drop down menu to allow the user to select an event [8]
# Fetch result from the database [5]
while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
{
        # Display event's name
        echo "<option value='".$event['event_id']."'>".$event['name']."</option>";
}
echo "</select><br><br>";
# Display button for selecting an event to delete [7]
echo "<input type='submit' value='Select'></form>";
# Display button for cancelling the deletion of an event [7]
echo "<form action='DisplayCalendar.php' method='POST'>";
echo "<input type='submit' value='Cancel'></form><br>";

# Close database connection [4]
mysqli_close($conn);
?>

</body>
</html>
