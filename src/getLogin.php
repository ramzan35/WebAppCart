<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename = "Login Confirmation";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>" . $pagename . "</title>";
//include head layout 
include("headfile.html");

echo "<p></p>";
$userName = $_POST['uName'];
$passWord = $_POST['pass'];

if (empty($userName) || empty($passWord)) {
    echo "Fields cant be empty";
    echo "<p></p>";
    echo "Go back to ";
    echo "<a href=login.php>Login</a>";
} else {
    $sql = "SELECT `userId`,`userType`,`userFName`, `userSName`,`userEmail`, `userPassword` FROM `users` WHERE `userEmail`='$userName'";
    $exeprodSQL = mysql_query($sql) or die(mysql_error());
    $num_rows = mysql_num_rows($exeprodSQL);
    if ($num_rows == 0) {
        echo "email couldn't be found, plz enter a valid email";
        echo "<p></p>";
        echo "Go back to ";
        echo "<a href=login.php>Login</a>";
    } else {
        $thearrayprod = mysql_fetch_array($exeprodSQL);
        $_SESSION["userFName"] = $thearrayprod["userFName"];
        $_SESSION['userSName'] = $thearrayprod['userSName'];
        $_SESSION['userId'] = $thearrayprod['userId'];
        $_SESSION['userType'] = $thearrayprod['userType'];
        if ($thearrayprod['userPassword'] != $passWord) {
            echo "Password didn't match";
            echo "<p></p>";
            echo "Go back to ";
            echo "<a href=login.php>Login</a>";
        } else if($thearrayprod['userType']!='C'){
            echo "Hello " . $_SESSION["userFName"] . " " . $_SESSION['userSName'];
            echo "<br />";
            echo "You have successfully logged into the system!";
            echo "<br />";
            echo "The email you entered is " . $userName;
            echo "<br />";
            echo "The passWord you entered is secret";
            echo "<br />";
            echo "<p></p>";
            echo "To continue shopping ";
            echo "<a href=index.php>Product Index</a>";
            echo "<br />";
            echo "To view yourbasket";
            echo "<a href=basket.php>My Basket</a>";
        }else{
            echo "Hello " . $_SESSION["userFName"] . " " . $_SESSION['userSName'];
            echo "<br />";
            echo "You have successfully logged into the system as an Administrator!";
            echo "<br />";
            echo "<p></p>";
            echo "Access the ";
            echo "<a href=adminmenu.php>Admin Menu</a>";
            echo "<br />";
        }
    }
}
//include head layout
include("footfile.html");
?>
