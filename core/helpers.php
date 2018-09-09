<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function convert($size)
{
	$unit=array('b','kb','mb','gb','tb','pb');
	return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

function csrf_token() {
	if (empty($_SESSION['token'])) {
		$_SESSION['token'] = bin2hex(random_bytes(32));
	}
	$token = $_SESSION['token'];
	echo <<<CSRF
	<input type="hidden" name="csrf_token" value="$token">
CSRF;
}

function verify_token($post_token) {
	if (!empty($post_token)) {
		if (hash_equals($_SESSION['token'], $post_token)) {
         // Proceed to process the form data
			return true;
		} else {
         // Log this as a warning and keep an eye on these attempts
			return false;
		}
	}
}

function config($key) {
    $config = require(CONFIG_PATH . 'app.php');
    if (array_key_exists($key, $config)) {
        return $config[$key];
    }
}

function view($view) {
    require VIEW_PATH . $view . '.php';
}
