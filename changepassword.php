<?php
include 'core/init.php';

if(empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;	
		}
	}
	
	if (md5($_POST['current_password']) === $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your new passwords do not match';
		}else if (strlen($_POST['password']) < 8) {
			$errors[] = 'Your password must be at least 8 characters';
		}
	} else {
		$errors[] = 'Your current password is incorrect';
	}
}

include 'patientInterface/includes/overall/header.php';

?>

<section>
	<h1>Change Password</h1>

<?php 
if (empty($_POST) === false && empty($errors) === true) {
	//posted the form and no errors.
	change_password();
}else if (empty($errors) === false) {
	//output errors
	echo output_errors($errors);
}

?>
<form action="" method="post">
	<ul>
		<li>Current password*: <br> 
			<input type="text" name="current_password">
		</li>
		<li>New password*: <br> 
			<input type="text" name="password">
		</li>
		<li>New password again*: <br> 
			<input type="text" name="password_again">
		</li>
		<li> 
			<input type="submit" value="Change password">
		</li>
	</ul>
</form>
</section>

<?php include 'patientInterface/includes/overall/footer.php'; ?>



