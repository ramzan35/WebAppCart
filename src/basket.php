<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";
session_start();
include("db.php");
@$newprodid = $_POST['h_prodid'];
@$reququantity = $_POST['p_quantity'];
@$total = 0;

	echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

	//display window title
	echo "<title>".$pagename."</title>";
	//include head layout 
	include("headfile.html");

	echo "<p></p>";
	echo "<h2>".$pagename."</h2>";

	if(isset($reququantity)){
		$_SESSION['basket'][$newprodid] = $reququantity;
	}
	
	if(empty($_SESSION['basket'])){
		echo "Your basket is empty!";
		echo "<p></p>";
	}
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Product Name</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "<th>Subtotal</th>";
	echo "</tr>	";
	$total = 0;
	if(isset($_SESSION['basket'])){
	foreach($_SESSION['basket'] as $id => $qtys) {
		$prodSQL="select prodId,prodName,prodPrice from product where prodId=".$id;
		//execute SQL query
		$exeprodSQL=mysql_query($prodSQL) or die(mysql_error());
		//create array of records & populate it with result of the execution of the SQL query
		$thearrayprod=mysql_fetch_array($exeprodSQL);
		$total += $thearrayprod['prodPrice']*$qtys;
    echo "<tr><th>".$thearrayprod['prodName']."</th>";
	echo "<th>".$thearrayprod['prodPrice']*$qtys."</th>";
	echo "<th>".$qtys."</th>";
	echo "<th>".$thearrayprod['prodPrice']*$qtys."</th>";
	}
	}
	
	echo "<tr><th colspan = 3>Total</th>";
	echo "<th>$total</th>";
	echo "</table>";
	
	echo "<p></p>";
	echo "<a href=clearBasket.php>Clear the Basket</a>";
	echo "<p></p>";
	echo "New workedup customers";
	echo "<a href=login.php>Login</a>";
	echo "<br>";
	echo "Registered workedup members";
	echo "<a href=register.php>register</a>";
	
include("footfile.html");
?>
