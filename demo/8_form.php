<?php require "includes/header.php" ?>
<h2>Form Handling</h2>
<form action="form.php" method="POST" novalidate>
	<div class="control">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
	</div>
	<div class="control">
		<label for="email">Email</label>
		<input type="email" name="email" id="email">
	</div>
	<div class="form-actions">
		<button type="submit">Submit</button>
	</div>
</form>

<h2>Form Validation</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" novalidate>
	<div class="control">
		<label>Name*</label>
		<input type="text" name="name">
	</div>
	<div class="control">
		<label>Email*</label>
		<input type="email" name="email">
	</div>
	<div class="form-actions">
		<button type="submit">Submit</button>
	</div>
</form>
<?php
$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "Successful" . "<br>";

	$name = test_input($_POST["name"]);
	$email = test_input($_POST["email"]);

	echo "Name: " . $name . "<br>";
	echo "Email: " . $email . "<br>";
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<?php require "includes/footer.php" ?>