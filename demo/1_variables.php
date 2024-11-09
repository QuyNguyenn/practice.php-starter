<?php require "includes/header.php" ?>
<h2>Using variable</h2>
<?php
$title = "Hello World!";
$name = "Quy";
$strong = "<strong>Strong</strong>";

$intVal = 10;
$floatVal = 5.8;
$stringVal = "Hello";
$booleanVal = TRUE;
$nullVal = null;
var_dump($intVal);
var_dump($floatVal);
var_dump($stringVal);
var_dump($booleanVal, $nullVal);
?>

<p>
	<?php echo "$title, I'm {$name}" ?>
</p>
<?= $name ?>
<p>Variable contains tag:
	<?php echo $strong ?>
</p>
<?php require "includes/footer.php" ?>