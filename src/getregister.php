<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include("headfile.html");

echo "<p></p>";

	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$address = $_POST['address'];
	$postcode = $_POST['postCode'];
	$telNo = $_POST['telNo'];
	$emailAdd = $_POST['emailAdd'];
	$pass = $_POST['pass'];
	$conPass = $_POST['conPass'];
	
	if(empty($fName))
		echo "Enter the first name please";
	else if(empty($lName))
		echo "Enter the last name please";
	else if(empty($address))
		echo "Enter the address please";
	else if(empty($postcode))
		echo "Enter the postcode please";
	else if(empty($telNo))
		echo "Enter the Telephone number please";
	else if(empty($emailAdd))
		echo "Enter the email address please";
	else if(empty($pass))
		echo "Enter the password please";
	else if(empty($conPass))
		echo "Enter the confirmation password please";
	else{
	$email = $emailAdd;
	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) {
	echo "email is not valid";
	echo "<p></p>";
	echo "Go back to ";
	echo "<a href=register.php>register</a>";
	}
	else if($pass != $conPass){
		echo "Password doesn't match";
		echo "<p></p>";
		echo "Go back to ";
		echo "<a href=register.php>register</a>";
	}else{
	
	$prodSQL="INSERT INTO users(userType,userFName,userSName,userAddress,userPostcode,userTelNo,userEmail,userPassword) values('C',$fName','$lName','$address','$postcode','$telNo',
	'$emailAdd','$pass')";
	//execute SQL query
	$exeprodSQL=mysql_query($prodSQL);
	
	if(mysql_errno()!=0){
		if(mysql_errno()==1062){
			echo "email already taken error message";
			echo "<br />";
			echo "Go back to ";
			echo "<a href=register.php>register</a>";
		}	
	}
	else{
		echo "Successfully registered";
	}
	}
	}
//include head layout
include("footfile.html");
?>
