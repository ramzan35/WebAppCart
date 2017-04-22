<html>
	<body>
	<span align="left">
	<?php
	if(isset($_SESSION['userId'])){
		echo $_SESSION['userFName']." ".$_SESSION['userSName']." / Customer No. ".$_SESSION['userId'];
	}?>
	</span>
<!--	<span align="left">-->
<!--	<a href="logout.php" text-align:left>Log Out</a>-->
<!--	</span>-->
</body>
</html>