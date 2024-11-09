<?php
require "includes/header.php";
require "classes/Database.php";
require "classes/StudentDAO.php";
?>

<?php
$database = new Database();
$conn = $database->getConn();
$students = StudentDAO::getAll($conn);
?>

<h2>Connecting Database - Using PDO</h2>
<h3>Students</h3>
<ul class='student-list'>
	<?php foreach ($students as $student): ?>
		<li class='student-item'>
			<a href="student_pdo.php?id=<?= $student["id"] ?>">
				<?= htmlspecialchars($student["name"]) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<a href="insert_student.php">Create Student</a>

<?php require "includes/footer.php" ?>