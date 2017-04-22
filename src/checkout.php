<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename = "Check Out Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>" . $pagename . "</title>";
//include head layout 
include("headfile.html");
include("detectlogin.php");

$total = 0;
$subtotal = 0;
$sDate = date("Y-m-d H:i:s");

$SQL = "INSERT INTO ORDERS values(1,2,'$sDate' ,10)";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL = mysql_query($SQL) or die (mysql_error());

echo "<p></p>";
//display name of the page and some random text
echo "<h2>" . $pagename . "</h2>";
echo "<p> Text Here";

//include head layout
include("footfile.html");
?>
