<?php require "includes/header.php" ?>
<?php
echo "<h2>Array</h2>";
$numberList1 = array(1, 2, 3, 4, 5, "777", "<span>Span element</span>");
$numberList2 = [1, 2, 3, 4, 5];

echo $numberList1[6] . "<br>";
print_r($numberList2);
echo "<br>";
var_dump($numberList2);
echo "<br>";

echo "<h2>Associative Array</h2>";
$student = ["firstName" => "John", "lastName" => "Michael"];
print_r($student);
echo "<br>";
echo $student["firstName"] . " " . $student["lastName"];
echo "<br>";
?>
<?php require "includes/footer.php" ?>