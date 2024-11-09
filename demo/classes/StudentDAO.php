<?php

class Student
{
	public string $id;
	public string $name;
	public string $address;
	public string $dob;
}

class StudentDAO
{
	public static function getAll(PDO $conn)
	{
		$query = "SELECT id, name, address, dob FROM student";
		$result = $conn->query($query);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function getById(PDO $conn, string $id): Student
	{
		$query = "SELECT id, name, address, dob FROM student as s WHERE s.id = :id";

		$stmt = $conn->prepare($query);
		$stmt->bindValue("id", $id, PDO::PARAM_STR);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Student');
		$stmt->execute();

		return $stmt->fetch();
	}

	public static function update(PDO $conn, Student $student): bool
	{
		$query = "UPDATE student SET name = :name, address = :address, dob = :dob WHERE id = :id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(":id", $student->id, PDO::PARAM_STR);
		$stmt->bindValue(":name", $student->name, PDO::PARAM_STR);
		$stmt->bindValue(":address", $student->address, PDO::PARAM_STR);
		$stmt->bindValue(":dob", $student->dob, PDO::PARAM_STR);
		return $stmt->execute();
	}

	public static function validate(Student $student): array
	{
		$errors = [];

		if ($student->name == "") {
			$errors[] = "Title is required";
		}

		if ($student->address == "") {
			$errors[] = "Address is required";
		}

		if ($student->dob == "") {
			$errors[] = "Date of birth is required";
		} else {
			$date_time = date_create_from_format("Y-m-d", $student->dob);

			if ($date_time === false) {
				$errors[] = "Invalid date and time" . $student->dob;
			} else {
				$date_errors = date_get_last_errors();

				if ($date_errors) {
					$errors[] = "Invalid date and time";
				}
			}
		}

		return $errors;
	}
}