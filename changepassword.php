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
		if ($_POST['password'] === $_POST['password_again']) {
			
		}
	} else {
		$errors[] = 'Your current password is incorrect';
	}
	print_r($errors);
}

include 'patientInterface/includes/overall/header.php';
?>

<section>
	<h1>Change Password</h1>

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



