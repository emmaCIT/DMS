<?php
function email($to, $subject, $body) {
	mail($to, $subject, $body, 'From: emmaogbene@gmail.com');
}
function redirectUser() {
	if (logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}
function logged_in_redirect() {
	global $user_data;
	if ($user_data['type'] ==0) {
		header('Location: patient.php');	
	}else if ($user_data['type'] ==1){
		header('Location: doctor.php');
	}else {
		header('Location: index.php');
	}
		exit();
}
function protect_page() {
	if (logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}

function array_sanitize(&$item) {
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_errors($errors){
	$output = array();
	foreach ($errors as $error) {
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';
}

?>