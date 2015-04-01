<?php 
include 'core/init.php';
logged_in_redirect2();


if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
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
		echo 'You\'ve been registered successfully! Please check your email to activate your account.';
	}else {
		if (empty($_POST) === false && empty($errors) === true) {
			$register_data = array(
					'username' 		=> $_POST['username'],
					'password' 		=> $_POST['password'],
					'first_name'	=> $_POST['first_name'],
					'last_name'		=> $_POST['last_name'],
					'email' 		=> $_POST['email'],
					'email_code' 	=> md5($_POST['username'] + microtime())
			);
				register_user($register_data);
				header('Location: register.php?success');
				exit();
		} else if (empty($errors) === false){
			echo output_errors($errors);
		}
	?>

	<form action="" method="post">
		<ul>
			<li>Username*: <br> <input type="text" name="username">
			</li>
			<li>Password*: <br> <input type="password" name="password">
			</li>
			<li>Password again*: <br> <input type="password" name="password_again">
			</li>
			<li>First name*: <br> <input type="text" name="first_name">
			</li>
			<li>Last name: <br> <input type="text" name="last_name"> <!-- Don't forget to use the html5 email field that enables clients side validation -->
			</li>
			<li>Email address*: <br> <input type="text" name="email">
			</li>
			<li>I am a*:
				<select name="type" <?php if ($user_data['type'] == 1) { echo 'checked="checked"'; } ?>>
					<option value="patient">Patient</option>
					<option value="doctor">Doctor</option>
				</select>
			</li>
			<li><input type="submit" value="Register"></li>
		</ul>
	</form>
	
	<?php } ?>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>

   