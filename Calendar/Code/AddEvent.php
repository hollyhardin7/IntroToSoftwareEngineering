<!DOCTYPE html>
<!-- 
Authors: Holly (HH), Daniel (DB)
Generate Date: 1/30/2019
Function: 
    This PHP file gets information for adding an event. It is invoked when then usuer click "Add Event"
in the main page (DisplayCalendar.php) 
    This PHP file gets information for adding an event and sends it to AddEventToDatabase.php OR redirects to DisplayCalendar.php
Citation:
    [0]: Reference. URL: https://www.w3schools.com/html/html_tables.asp
    [1]: Reference. URL: https://blackswan.ch/archives/811
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
# Open database connection to MySQL server [2]
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');

# Start new session [1]
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
session_start();

# Get and pass along the index of the current month being displayed [3]
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;

# Display the purpose of the page (Add Event)
echo "<font size ='16'><b>Add Event</b></font>";

# Include input to get event info
include 'getaddinfo.php';

# Close database connection [4]
mysqli_close($conn);
?>

</body>
</html>
