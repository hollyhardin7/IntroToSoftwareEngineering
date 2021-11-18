<!DOCTYPE html>
<!-- 
Authors: Holly (HH), Daniel (DB), Linshu (LH)
Generate Date: 1/30/2019
Function:
    This PHP file mainly read the current month events from the database. 
    Meanwhile, the calendar grid may contain few days from the last month and this month. This file also handle these considerations.
    It gets information for adding an event and sends it to AddEventToDatabase.php OR redirects to DisplayCalendar.php
Citation:
    [0]: Reference. URL:  https://www.w3schools.com/html/html_tables.asp 
    [1]: Reference. URL: https://blackswan.ch/archives/811
    [2]: Reference. URL: https://www.w3schools.com/php/func_mysqli_connect.asp
    [3]: Reference. URL: http://php.net/manual/en/reserved.variables.session.php
    [4]: Reference. URL: http://php.net/manual/en/mysqli.close.php
    [5]: Reference. URL: http://php.net/manual/en/mysqli.query.php
    [6]: Reference. URL: http://php.net/manual/en/mysqli-result.fetch-array.php
    [7]: Reference. URL: https://www.w3schools.com/tags/att_button_formmethod.asp
    [8]: Reference. URL: https://www.w3schools.com/tags/tag_select.asp
-->

<!-- Style for calendar [0] -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
th { text-align: right; }
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
re { width:100px; height:100px; text-align: right; float:right; margin-top:0px;}
</style>

<?php
# Display the month and year
echo "<font size ='16'><b>".$current_month['name']."</b> ".$current_month['year']."</font>";
# Start a new table for the month [0]
echo "<table>";
# Start a new row for the headers [0]
echo "<tr>";
# Start and end a cell for each day of the week [0]
echo "<th>Sun</th>";
echo "<th>Mon</th>";
echo "<th>Tue</th>";
echo "<th>Wed</th>";
echo "<th>Thu</th>";
echo "<th>Fri</th>";
echo "<th>Sat</th>";
# End the new row the headers [0]
echo  "</tr>";

# Display the 'key' of priorities
echo "<re><p align='left' style='background-color:red;'>High Priority</p></re>";
echo "<re><p align='left' style='background-color:orange;'>Medium Priority</p></re>";
echo "<re><p align='left' style='background-color:lightsalmon;'>Low Priority</p></re>";

# Start a new row for a week in the month [0]
echo "<tr>";
# Display the days in a month that are from the previous month
# For example, we know there are 31 days in January 2019 (num_days)
# We also know the last 5 days of January 2019 (Jan 27 -31) are shown in February 2019 (days_before)
# So, we want to print the last five days of January 2019 before printing the days in February 2019
# i = Jan19[num_days] - Feb19[days_before] + 1
# i = 31 - 5 + 1
# i = 27
# Additionally, i should stop when it hits the number of days in the previous month
# i = 31
for ($i = ($prev_month['num_days'] - $current_month['days_before']) + 1; $i <= $prev_month['num_days']; $i++)
{
    # Start a new cell for the day [0]
    echo "<td>";
    # Display the day number of the previous month
    echo "<font color='grey'>".$i;

    # Query to get events from the database that happen on the day being displayed
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$prev_month['year']."-".$prev_month['month']."-".$i."'";
    # Submit query to database [5]
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    # Fetch results from the database [5]
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
	# If the event's priority is high, then print the event with a red background
	if ($event['priority'] == 'High')
	{
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
        }
        # If the event's priority is medium, then print the event with an orange background
	elseif ($event['priority'] == 'Medium')
	{
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
	}
        # If the event's priority is low, then print the event with a light salmon background
	elseif ($event['priority'] == 'Low')
	{
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }    
    }
    echo "</font>";

    # End the cell for the day [0]
    echo "</td>";
}

# Display the days in the current month
for ($i = 1; $i <= $current_month['num_days']; $i++)
{
    # End the previous row and start a new row for a new week when 7 days have been displayed
    # For example, we want to start a new row when i == 3 if the current month being displayed is February (2019)
    # So, if i == 3, end and start a new row
    # Or in other words..
    # if (Feb19[days_before] + 3 - 1 ) % 7) == 0
    # if (5 + 3 - 1) % 7 == 0
    # if (7 % 7) == 0
    # then end and start a new row
    if (($current_month['days_before'] + $i - 1) % 7 == 0)
    {
        # End the row of the previous week [0]
	echo "</tr>";
        # Start a new row for the week [0]
        echo "<tr>";
    }
    # Start a new cell for the day [0]
    echo "<td>";
    # Display the day number of the previous month
    echo $i;

    # Query to get events from the database that happen on the day being displayed
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$current_month['year']."-".$current_month['month']."-".$i."'";
    # Submit q uery to database [5]
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    # Fetch results from the database [5]
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        # If the event's priority is high, then print the event with a red background
	if ($event['priority'] == 'High')
	{
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
	}
	# If the event's priority is medium, then print the event with an orange background
	elseif ($event['priority'] == 'Medium')
	{
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
	}
	# If the event's priority is low, then print the event with a light salmon background
	elseif ($event['priority'] == 'Low')
	{
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }
    }
    # End the cell for the day [0]
    echo "</td>";
}

# Display the days in the next month
for ($i = 1; $i <= $current_month['days_after']; $i++)
{
    # Start a new cell for a day [0]
    echo "<td>";
    # Display the day number of the next month
    echo "<font color='grey'>".$i;
    
    # Query to get events from the database that happen on the day being displayed
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$next_month['year']."-".$next_month['month']."-".$i."'";
    # Submit q uery to database [5]
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    # Fetch results from the database [5]
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
	# If the event's priority is high, then print the event with a red background
	if ($event['priority'] == 'High')
	{
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
	}
	# If the event's priority is medium, then print the event with an orange background
	elseif ($event['priority'] == 'Medium')
	{
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
	}
	# If the event's priority is low, then print the event with a light salmon background
	elseif ($event['priority'] == 'Low')
	{
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }    
    }
    echo "</font>";

    # End the cell for the day [0]
    echo "</td>";
}
# End the row for the week [0]
echo "</tr>";
# End the table for the month [0]
echo "</table>";

# Close database connection
mysqli_close($conn);

?>
