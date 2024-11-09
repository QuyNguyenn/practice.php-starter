<?php
require "includes/http.php";
require "includes/db_connection.php";
require "includes/student.php";
?>

<?php
$errors = [];
$name = "";
$address = "";
$dob = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$conn = getDB();

	$name = trim($_POST["name"]);
	$address = trim($_POST["address"]);
	$dob = trim($_POST["dob"]);

	$errors = validateStudent($name, $address, $dob);

	if (empty($errors)) {
		$id = insertStudent($conn, $name, $address, $dob);
		mysqli_close($conn);

		redirect("/demo/student.php?id=$id");
	}
}
?>

<?php require "includes/header.php" ?>
<h3><a href="/demo/9_db_connect.php">Back</a></h3>
<h2>New Student</h2>
<?php if (!empty($errors)): ?>
	<ul>
		<?php foreach ($errors as $error): ?>
			<li>
				<?= $error ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
<form method="post" style="max-width: 600px;">
	<div class="row mb-4">
		<label class="col-4 col-form-label" for="name">Name:</label>
		<div class="col-8">
			<input class="form-control" type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>">
		</div>
	</div>
	<div class="row mb-4">
		<label class="col-4 col-form-label" for="address">Address:</label>
		<div class="col-8">
			<textarea class="form-control" name="address" id="address"><?= htmlspecialchars($address) ?></textarea>
		</div>
	</div>
	<div class="row mb-4">
		<label class="col-4 col-form-label" for="dob">Date of Birth:</label>
		<div class="col-8">
			<input class="form-control" type="date" name="dob" id="dob" value="<?= htmlspecialchars($dob) ?>">
		</div>
	</div>
	<div class="form-actions d-flex justify-content-end">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</form>
<?php require "includes/footer.php" ?>