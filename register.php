<?php 
include 'core/init.php';
redirectUser();

if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'DOB', 'gender', 'phone_number', 'email', 'address');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
			
		}
	}
	
	if (empty($errors) === true) {
		if(user_exists($_POST['username']) === true) {
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';	
		}
		if(preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces.';
		}
		if(strlen($_POST['password']) < 8) {
			$errors[] = 'Your password must be at least 8 characters';		
		}
		if($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Your passwords do not match';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		}
		if(email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
		}
		if(preg_match("/\\s/", $_POST['phone_number']) == true) {
			$errors[] = 'Your phone number must not contain any spaces.';
		}
		if(phone_exists($_POST['phone_number']) === true) {
			$errors[] = 'Sorry, the phone number \'' . $_POST['phone_number'] . '\' is already in use';
		}
	}
}

?>

<!DOCTYPE HTML>
<html>

	<?php include 'includes/head.php'; ?>
	<body>
			<?php include 'includes/header.php'; ?>
		<div id="container">
			<?php include 'includes/aside.php'; ?>
				<h1>Register</h1>

<?php
	if (isset($_GET['success']) && empty($_GET['success'])) {
		$msg = 'You\'ve been registered successfully! Please check your email to activate your account.';
		echo '<script type="text/javascript"> alert("' . $msg. '")</script>';
	}else {
		if (empty($_POST) === false && empty($errors) === true) {
			$register_data = array(
					'username' 		=> $_POST['username'],
					'password' 		=> $_POST['password'],
					'first_name'	=> $_POST['first_name'],
					'last_name'		=> $_POST['last_name'],
					'DOB'			=> $_POST['DOB'],
					'gender'		=> $_POST['gender'],
					'phone_number'	=> $_POST['phone_number'],
					'email' 		=> $_POST['email'],
					'address'		=> $_POST['address'],
					'type'			=> $_POST['type'],
					'email_code' 	=> md5($_POST['username'] + microtime())
			);
				register_user($register_data);
				header('Location: register.php?success');
				exit();
		} else if (empty($errors) === false){
			echo output_errors($errors);
		}
	}
	?>

		<?php include 'pat_aside_panel/registerform.php';?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>

   