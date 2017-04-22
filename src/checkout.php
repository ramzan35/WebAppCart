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
$id = $_SESSION['userId'];
$total = $_SESSION['total'];
$subtotal = 0;
$sDate = date("Y-m-d H:i:s");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>" . $pagename . "</h2>";
$SQL = "INSERT INTO ORDERS(`userId`, `orderDateTme`, `oderTotal`)  values($id,'$sDate' ,'$total')";
//Create a new variable containing the execution of the SQL query i.e. select the records or get out
$exeSQL = mysql_query($SQL) or die (mysql_error());

if($exeSQL){
    $SQL = "SELECT MAX(orderNo) AS MAX FROM orders WHERE userId = $id";// = ".$_SESSION['userId'];
//    $SQL = "SELECT * FROM orders";
    $exeSQL = mysql_query($SQL) or die (mysql_error());
    $thearrayprod=mysql_fetch_array($exeSQL);
    $maxOrderNo = $thearrayprod['MAX'];

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
            $subtotal = $thearrayprod['prodPrice']*$qtys;
            $SQL = "INSERT INTO order_line(`orderNo`, `prodId`, `quantityOrdered`, `subTotal`) values ($maxOrderNo,$id,$qtys,$subtotal)";
            $exeSQL = mysql_query($SQL) or die(mysql_error());
        }
    }

    echo "<tr><th colspan = 3>Total</th>";
    echo "<th>$total</th>";
    echo "</table>";

}



//include head layout
include("footfile.html");
?>
