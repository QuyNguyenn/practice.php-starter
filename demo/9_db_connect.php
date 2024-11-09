<?php
require "includes/header.php";
require "includes/db_connection.php";
require "includes/student.php";
?>

<?php
$conn = getDB();
$students = getAllStudents($conn);
?>

<h2>Connecting Database</h2>
<h3>Students</h3>
<ul class='student-list'>
	<?php foreach ($students as $student): ?>
		<li class='student-item'>
			<a href="student.php?id=<?= $student["id"] ?>">
				<?= htmlspecialchars($student["name"]) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<a href="insert_student.php">Create Student</a>

<?php require "includes/footer.php" ?>