<html>
	<body>
	
	<p>
	<span align="right">
	<?php
	if(isset($_SESSION['userId'])){
		echo $_SESSION['userId']." ".$_SESSION['userFName']." ".$_SESSION['userSName']; 
	}?>
	</span>
	<span align="left">
	<a href="logout.php" text-align:left>Log Out</a>
	</span>
	</p>
</body>
</html>