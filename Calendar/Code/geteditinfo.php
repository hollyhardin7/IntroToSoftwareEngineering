<!-- 
Authors: Holly (HH), Daniel (DB)
Generate Date: 1/30/2019
Function: 
    To keep the consistancy, "getaddinfo.php" edit event has the same interface with add moduel.
Citation:
    [0]: Reference. URL: https://www.w3schools.com/tags/att_button_formmethod.asp
    [1]: Reference. URL: https://www.w3schools.com/tags/tag_select.asp
    [2]: Reference. URL: https://www.w3schools.com/html/html_forms.asp 
-->


<?php
# Send information to EditEventToDatabase.php [0]
echo "<form action='EditEventToDatabase.php' method ='POST'>";
# Display text field to allow the user to input the name of an event [2]
echo "<br>Event Name:<br><input type='text' name='name'><br>";
# Display a drop down menu to allow the user to select a year [1]
echo "<br>Date (YYYY/MM/DD):<br>
<select name='start_year'>
  <option value='2019'>2019</option>
  <option value='2020'>2020</option>
  <option value='2021'>2021</option>
  <option value='2022'>2022</option>
</select>";
# Display a drop down menu to allow the user to select a month [1]
echo
"<select name='start_month'>
  <option value='01'>January</option>
  <option value='02'>February</option>
  <option value='03'>March</option>
  <option value='04'>April</option>
  <option value='05'>May</option>
  <option value='06'>June</option>
  <option value='07'>July</option>
  <option value='08'>August</option>
  <option value='09'>September</option>
  <option value='10'>October</option>
  <option value='11'>November</option>
  <option value='12'>December</option>
</select>";
# Display a drop down menu to allow the user to select a day [1]
echo
"<select name='start_day'>
  <option value='01'>1</option>
  <option value='02'>2</option>
  <option value='03'>3</option>
  <option value='04'>4</option>
  <option value='05'>5</option>
  <option value='06'>6</option>
  <option value='07'>7</option>
  <option value='08'>8</option>
  <option value='09'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
  <option value='13'>13</option>
  <option value='14'>14</option>
  <option value='15'>15</option>
  <option value='16'>16</option>
  <option value='17'>17</option>
  <option value='18'>18</option>
  <option value='19'>19</option>
  <option value='20'>20</option>
  <option value='21'>21</option>
  <option value='22'>22</option>
  <option value='23'>23</option>
  <option value='24'>24</option>
  <option value='25'>25</option>
  <option value='26'>26</option>
  <option value='27'>27</option>
  <option value='28'>28</option>
  <option value='29'>29</option>
  <option value='30'>30</option>
  <option value='31'>31</option>
</select>";
# Display a drop down menu to allow the user to select an hour [1]
echo
"<br>Time: <br>
<select name='start_hour'>
  <option value='00'>12 AM</option>
  <option value='1'>1 AM</option>
  <option value='2'>2 AM</option>
  <option value='3'>3 AM</option>
  <option value='4'>4 AM</option>
  <option value='5'>5 AM</option>
  <option value='6'>6 AM</option>
  <option value='7'>7 AM</option>
  <option value='8'>8 AM</option>
  <option value='9'>9 AM</option>
  <option value='10'>10 AM</option>
  <option value='11'>11 AM</option>
  <option value='12'>12 PM</option>
  <option value='13'>1 PM</option>
  <option value='14'>2 PM</option>
  <option value='15'>3 PM</option>
  <option value='16'>4 PM</option>
  <option value='17'>5 PM</option>
  <option value='18'>6 PM</option>
  <option value='19'>7 PM</option>
  <option value='20'>8 PM</option>
  <option value='21'>9 PM</option>
  <option value='22'>10 PM</option>
  <option value='23'>11 PM</option>
</select>";
# Display a drop down menu to allow the user to select a minute [1]
echo
"<select name='start_minute'>
  <option value='00'>00</option>
  <option value='15'>15</option>
  <option value='30'>30</option>
  <option value='45'>45</option>
</select>";
# Display a text field to allow the user to enter a description for the event [2]
echo 
"<br><br>Description:<br><input type='text' name='description'>";
# Display a drop down menu to allow the user to enter a priority for the event [1]
echo
"<br><br>Priority:<br>
<select name='priority'>
  <option value='Low'>Low</option>
  <option value='Medium'>Medium</option>
  <option value='High'>High</option>
</select>";
# Display a drop down menu to allow the user to enter a category for the event [1]
echo
"<br>Category:<br>
<!-- A drop down menu allowing the user to select a category for the event -->
<select name='category'>
  <option value='Work'>Work</option>
  <option value='Home'>Home</option>
  <option value='Play'>Play</option>
</select>";
# Display button for adding the event [0]
echo
"<br><br><input type='submit' value='Update Event'></form>";
# Display button for cancelling the edit of event [0]
echo "<form action='DisplayCalendar.php' method='POST'>";
echo "<input type='submit' value='Cancel'></form><br><br>";
