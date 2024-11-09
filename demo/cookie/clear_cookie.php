<?php require "../includes/header.php" ?>
<h4><a href="../11_cookie.php">Back</a></h4>
<h2>Clear Cookie</h2>
<?php 
	setcookie("example", "", time() - 30,"/");
	echo "Cookie is cleared successfully";
?>
<?php require "../includes/footer.php" ?>