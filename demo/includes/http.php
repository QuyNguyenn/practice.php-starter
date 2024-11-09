<?php
/**
 * Redirect to anothe URL on the same site
 * 
 * @param string $path The absolute path to redirect to
 * @return void
 */
function redirect($path)
{
	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
		$protocol = 'https';
	} else {
		$protocol = 'http';
	}

	header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
	exit;
}

function detroy_session()
{
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
		$param = session_get_cookie_params();
		setcookie(session_name(), "", time() - 42000,
			$param["path"], $param["domain"],
			$param["secure"], $param["httponly"]
		);
	}

	session_destroy();
}
?>