<?php
require "includes/http.php";
require "includes/db_connection.php";
require "includes/student.php";
?>

<?php
$errors = [];
$id = "";

$conn = getDB();

if (isset($_GET["id"])) {
	$id = $_GET["id"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST["id"];
	deleteStudentById($conn, $id);
	redirect("/demo/9_db_connect.php");
}
?>

<?php require "includes/header.php" ?>
<h2>Delete Student</h2>
<p>Are you sure to Delete</p>
<form method="POST" class="d-flex justify-content-end">
	<input type="hidden" name="id" value="<?= $id ?>">
	<button onclick="history.back()" type="button" class="btn me-4 btn-secondary">
		<a>Back</a>
	</button>
	<button type=submit class="btn btn-primary">Yes</button>
</form>
<?php require "includes/footer.php" ?>