<?php
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
	$required_fields = array('first_name', 'phone_number', 'email', 'address');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	if (empty($errors) === true) {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		}else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already in use';
		}else if (phone_exists($_POST['phone_number']) === true && $user_data['phone_number'] !== $_POST['phone_number']) {
			$errors[] = 'Sorry, the phone number \'' . $_POST['phone_number'] . '\' is already in use';
		}
	}		
}

?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    		<?php include 'includes/neutral.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php';?>
		<h1>Settings</h1>

<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'Your details have been updated!';
} else {
	if(empty($_POST) === false && empty($errors) === true) {
		//update user's details
		$update_data = array(
				'first_name'		=> $_POST['first_name'],
				'last_name'			=> $_POST['last_name'],
				'phone_number' 		=> $_POST['phone_number'],
				'email' 			=> $_POST['email'],
				'address' 			=> $_POST['address'],
				'allow_email' 	=> ($_POST['allow_email'] == 'on') ? 1 : 0
		);
		
		update_user($session_user_id, $update_data);
		header('Location: settings.php?success');
		exit();
		
	}else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>
	<form action="" method="post">
			<ul>
				<li>First name*: <br> 
					<input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>">
				</li>
				<li>Last name: <br> 
					<input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>">
				</li>
				<li>Phone number*: <br> 
					<input type="text" name="phone_number" value="<?php echo $user_data['phone_number']; ?>">
				</li>
				<li>Email*: <br> 
					<input type="text" name="email" value="<?php echo $user_data['email']; ?>">
				</li>
				<li>Address*: <br> 
					<textarea name="address" class="reg2"><?php echo $user_data['address']; ?></textarea>
				</li>
				<li>
				<input type="checkbox" name="allow_email" <?php if ($user_data['allow_email'] == 1 AND $user_data['type'] == 0) { echo 'checked="checked"'; } ?>> Would you like to receive email from us?
				</li>
				<li> 
					<input type="submit" value="Update">
				</li>
			</ul>
		</form>
		
<?php } ?>
</div> 

<?php include 'includes/footer.php'; ?>
</body>
</html>



