<?php require "includes/header.php" ?>
<?php
echo "<h2>Function</h2>";
function calculate($number1, $number2)
{
	return $number1 + $number2;
}
echo "10 + 15 = " . calculate(10, 15);
echo "<br>";

function saySomething($words = "Hello World") {
	echo $words . "<br>";
}
saySomething();

echo "<h2>Built-in Function</h2>";
echo "<h3>Math Function</h3>";
echo pow(3, 3) . "<br>";
echo rand(0, 10) . "<br>";
echo sqrt(64) . "<br>";
echo ceil(5.2) . "<br>";
echo floor(4.9) . "<br>";

echo "<h3>String Function</h3>";
$string = "Lorem ipsum dolor sit amet.";
echo "String: " . $string . "<br>";
echo "strlen: " . strlen($string) . "<br>";
echo "strtoupper: " . strtoupper($string) . "<br>";
echo "strtolower: " . strtolower($string) . "<br>";

echo "<h3>Array Function</h3>";
$list = [213, 534, 324, 345, 345];
echo "List: " . print_r($list, true) . "<br>";
echo "max: " . max($list) . "<br>";
echo "min: " . min($list) . "<br>";
?>
<?php require "includes/footer.php" ?>