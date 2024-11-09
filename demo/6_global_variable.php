<?php require "includes/header.php" ?>
<?php
echo "<h2>Global Variable</h2>";
$text = "Global";
function change()
{
	global $text;
	$text = "Changed by local";
}
echo $text . "<br>";
change();
echo $text . "<br>";
?>
<?php require "includes/footer.php" ?>