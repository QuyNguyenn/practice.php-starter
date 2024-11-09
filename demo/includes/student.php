<?php require "gen_uuid.php" ?>

<?php
function validateStudent($name, $address, $dob)
{
	$errors = [];

	if (trim($name) == "") {
		$errors[] = "Title is required";
	}

	if (trim($address) == "") {
		$errors[] = "Address is required";
	}

	if ($dob == "") {
		$errors[] = "Date of birth is required";
	} else {
		$date_time = date_create_from_format("Y-m-d", $dob);

		if ($date_time === false) {
			$errors[] = "Invalid date and time" . $dob;
		} else {
			$date_errors = date_get_last_errors();

			if ($date_errors) {
				$errors[] = "Invalid date and time";
			}
		}
	}

	return $errors;
}

function insertStudent($conn, $name, $address, $dob)
{
	$id = gen_uuid();
	$query = "INSERT INTO student (id, name, address, dob) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($query);

	if ($stmt === false) {
		echo $conn->error;
		exit();
	} else {
		$stmt->bind_param("ssss", $id, $name, $address, $dob);
		$stmt->execute();
		return $id;
	}
}

function getStudentById($conn, $id)
{
	$query = "SELECT id, name, address, dob FROM student as s WHERE s.id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$student = $result->fetch_assoc();
	return $student;
}

function getAllStudents($conn)
{
	$query = "SELECT id, name, address, dob FROM student";
	$result = $conn->query($query);

	if ($result == false) {
		echo $conn->error;
		$conn->close();
		exit();
	} else {
		$students = $result->fetch_all(MYSQLI_ASSOC);
		$conn->close();
		return $students;
	}
}

function updateStudentById($conn, $id, $name, $address, $dob)
{
	echo $id . ";" . $name . ";" . $address . ";" . $dob;
	$query = "UPDATE student SET name = ?, address = ?, dob = ? WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ssss", $name, $address, $dob, $id);
	$stmt->execute();
	return $stmt->affected_rows;
}

function deleteStudentById($conn, $id)
{
	$query = "DELETE FROM student WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $id);
	$stmt->execute();
	return $stmt->affected_rows;
}
?>