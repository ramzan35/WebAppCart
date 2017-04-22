<?php
/**
 * Created by PhpStorm.
 * User: Ramzan Dieze
 * Date: 22/04/2017
 * Time: 19:36
 */
include("adminmenu.html");
echo "<form action='getproduct.php' method='POST'>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th><input type=text name = pName></th></tr>";
echo "<tr><th>Picture Name</th>";
echo "<th><input type=text name = picName></th></tr>";
echo "<tr><th>Description</th>";
echo "<th><input type=text name = descrip></th></tr>";
echo "<tr><th>Price</th>";
echo "<th><input type=text name = price></th></tr>";
echo "<tr><th>Initial Quantity</th>";
echo "<th><input type=text name = qty></th></tr>";
echo "<tr><th><button type='submit' value='Submit'>Add Product</button></th>";
echo "<th><button type='reset' value='Reset'>Clear Form</button></th></tr>";
echo "</table>";
echo "</form>";