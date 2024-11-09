<?php require "gen_uuid.php" ?>

<?php


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



function deleteStudentById($conn, $id)
{
	$query = "DELETE FROM student WHERE id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $id);
	$stmt->execute();
	return $stmt->affected_rows;
}
?>