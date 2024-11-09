<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p>
		<a href="/demo">Home</a>
	</p>
	<?php 
		echo "<h2>Submit successful</h2>";
		echo "Name: " . $_POST["name"] . "<br>";
		echo "Email: " . $_POST["email"] . "<br>";
	?>
</body>
</html>