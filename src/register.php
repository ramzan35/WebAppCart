<?php
session_start();

//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";

	echo "<form action='getregister.php' method='POST'>";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>First Name</th>";
	echo "<th><input type=text name = fName></th></tr>";
	echo "<tr><th>Last Name</th>";
	echo "<th><input type=text name = lName></th></tr>";
	echo "<tr><th>Address</th>";
	echo "<th><input type=text name = address></th></tr>";
	echo "<tr><th>Postcode</th>";
	echo "<th><input type=text name = postCode></th></tr>";
	echo "<tr><th>Tel No</th>";
	echo "<th><input type=text name = telNo></th></tr>";
	echo "<tr><th>Email Address</th>";
	echo "<th><input type=text name = emailAdd></th></tr>";
	echo "<tr><th>Password</th>";
	echo "<th><input type=password name = pass></th></tr>";
	echo "<tr><th>Confirm Password</th>";
	echo "<th><input type=password name = conPass></th></tr>";
	echo "<tr><th><button type='submit' value='Submit'>Register</button></th>";
	echo "<th><button type='reset' value='Reset'>Reset</button></th></tr>";
	echo "</table>";
	echo "</form>";
	
	
		
//include head layout
include("footfile.html");
?>
