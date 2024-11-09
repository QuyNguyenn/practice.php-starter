<?php require "includes/http.php" ?>
<?php
session_start();

if (isset($_SESSION['count'])) {
	$_SESSION['count']++;
} else {
	$_SESSION['count'] = 1;
}

if (isset($_GET["clearSession"])) {
	detroy_session();
}

session_status();
?>
<?php require "includes/header.php" ?>
<h2>Session</h2>
<?= session_id() != "" ? var_dump($_SESSION['count']) : "" ?>
<div class="d-flex my-4">
	<a href="/demo/10_session.php" class="btn btn-success me-4">Reload</a>
	<form action="?clearSession" method="POST">
		<button class="btn btn-primary">Clear Session</button>
	</form>
</div>
<?php require "includes/footer.php" ?>