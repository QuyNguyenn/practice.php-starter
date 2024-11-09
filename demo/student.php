<?php
require "includes/db_connection.php";
require "includes/student.php";
?>

<?php
if (isset($_GET["id"])) {
	$conn = getDB();
	$id = htmlspecialchars($_GET['id']);
	$student = getStudentById($conn, $id);
} else {
	$student = null;
}
?>

<?php require "includes/header.php" ?>
<h3><a href="/demo/9_db_connect.php">Back</a></h3>
<h2 class="my-4">Student</h2>
<?php if ($student == null): ?>
	<p>Student not found</p>
<?php else: ?>
	<div class="student-details ml-0" style="max-width: 600px;">
		<div class="row">
			<div class="col-4 fw-bold">Name:</div>
			<div class="col-8">
				<?= htmlspecialchars($student["name"]) ?>
			</div>
		</div>
		<div class="row">
			<div class="col-4 fw-bold">Address:</div>
			<div class="col-8">
				<?= htmlspecialchars($student["address"]) ?>
			</div>
		</div>
		<div class="row">
			<div class="col-4 fw-bold">Date of Birth:</div>
			<div class="col-8">
				<?= htmlspecialchars($student["dob"]) ?>
			</div>
		</div>
		<div class="d-flex justify-content-end mt-4">
			<a href="/demo/deleteStudent.php?id=<?= $id ?>" class="btn btn-warning me-4">Delete</a>
			<a class="btn btn-primary px-4" href="/demo/update_student.php?id=<?= $id ?>">Update</a>
		</div>
	</div>
<?php endif; ?>
<?php require "includes/footer.php" ?>