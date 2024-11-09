<?php require "includes/header.php" ?>
<?php
echo "<h2>If Statement</h2>";
if (3 < 5) {
	echo "3 < 5";
} else {
	echo "3 > 5";
}
?>

<h2>Alternative If Statement</h2>
<?php
$rand = rand(0, 100);
echo "Random $rand";
?>
<?php if ($rand < 25): ?>
	<p>Less than 25</p>
<?php elseif ($rand < 50): ?>
	<p>Greater than or equal 25 and less than 50</p>
<?php elseif ($rand < 75): ?>
	<p>Greater than or equal 50 and less than 75</p>
<?php else: ?>
	<p>Greater than or equal 75 and less than 100</p>
<?php endif; ?>

<?php
echo "<h2>Comparison and Logical Operators</h2>";
echo "equal " . "==" . "<br>";
echo "identical " . "===" . "<br>";
echo "compare " . "> < >= <= <>" . "<br>";
echo "not equal " . "!=" . "<br>";
echo "not identical " . "!==" . "<br>";
echo "4 == \"4\": " . ((4 == "4") ? "true" : "false") . "<br>";
echo "4 === \"4\": " . ((4 === "4") ? "true" : "false") . "<br>";

echo "<h2>Logical Operators</h2>";
echo "and " . "&&";
echo "or " . "||";
echo "not " . "!";

echo "<h2>Switch Statement</h2>";
$value = 30;
switch ($value) {
	case 10:
		echo "value is 10";
		break;
	case 20:
		echo "value is 20";
		break;
	case 30:
		echo "value is 30";
		break;
	case 40:
		echo "value is 40";
		break;
	default:
		echo "default";
		break;
}

echo "<h2>While Loop</h2>";
$count = 0;
while ($count < 5) {
	$count++;
	echo "count " . $count . "<br>";
}

echo "<h2>For Loop</h2>";
for ($index = 0; $index < 5; $index++) {
	echo "index: " . $index . "<br>";
}

echo "<h2>Foreach</h2>";
$students = [
	["name" => "Marlene", "age" => 22],
	["name" => "Rochell", "age" => 21],
	["name" => "Leupold", "age" => 20],
	["name" => "Charlene", "age" => 23]
];
foreach ($students as $student) {
	echo $student["name"] . ", age: " . $student["age"] . "<br>";
	echo "<br>";
}
?>
<?php require "includes/footer.php" ?>