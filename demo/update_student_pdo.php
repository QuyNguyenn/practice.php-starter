<?php
require "includes/http.php";
require "classes/Database.php";
require "classes/StudentDAO.php";
?>

<?php
$errors = [];

$database = new Database();
$conn = $database->getConn();

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	$student = StudentDAO::getById($conn, $id);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$student->name = trim($_POST["name"]);
		$student->address = trim($_POST["address"]);
		$student->dob = trim($_POST["dob"]);
	
		$errors = StudentDAO::validate($student);
	
		if (empty($errors)) {
			if (StudentDAO::update($conn, $student)) {
				redirect("/demo/student_pdo.php?id=$id");
			} else {
				$errors[] = "Update fail!";
			}
		}
	}
}
?>

<?php require "includes/header.php" ?>
<h3><a href="/demo/9_db_connect.php">Back</a></h3>
<h2>Update Student</h2>

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
			<input class="form-control" type="text" name="name" id="name" value="<?= htmlspecialchars($student->name) ?>">
		</div>
	</div>
	<div class="row mb-4">
		<label class="col-4 col-form-label" for="address">Address:</label>
		<div class="col-8">
			<textarea class="form-control" name="address" id="address"><?= htmlspecialchars($student->address) ?></textarea>
		</div>
	</div>
	<div class="row mb-4">
		<label class="col-4 col-form-label" for="dob">Date of Birth:</label>
		<div class="col-8">
			<input class="form-control" type="date" name="dob" id="dob" value="<?= htmlspecialchars($student->dob) ?>">
		</div>
	</div>
	<div class="form-actions d-flex justify-content-end">
		<button class="btn btn-primary" type="submit">Update</button>
	</div>
</form>
<?php require "includes/footer.php" ?>