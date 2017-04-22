<?php
/**
 * Created by PhpStorm.
 * User: Ramzan Dieze
 * Date: 22/04/2017
 * Time: 19:35
 */
include("db.php");
include("adminmenu.html");
echo "<h1>New Product Confirmation</h1>";

echo "The product has been added";
$pName = $_POST['pName'];
$picName = $_POST['picName'];
$descrip = $_POST['descrip'];
$price = $_POST['price'];
$qty = $_POST['qty'];

echo "Product Name : ".$_POST['pName'];
echo  "<br />";
echo "Picture Name : ".$_POST['picName'];
echo  "<br />";
echo "Description : ".$_POST['descrip'];
echo  "<br />";
echo "Price : ".$_POST['price'];
echo  "<br />";
echo "Initial Quantity : ".$_POST['qty'];
echo  "<br />";

$SQl = "INSERT INTO product values(7,'$pName','$picName','$descrip','$price','$qty')";
$exeSQl = mysql_query($SQl) or die();