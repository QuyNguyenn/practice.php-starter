<?php require "../includes/header.php" ?>
<h4><a href="../11_cookie.php">Back</a></h4>
<h2>Set Cookie</h2>
<?php 
	setcookie("example","Example Cookie Value", 0, "/");
	echo "Cookie is set successfully";
?>
<?php require "../includes/footer.php" ?>