<?php
include 'core/init.php';
include 'patientInterface/includes/overall/header.php';

if (empty($_POST) === false) {
	$required_fields = array('first_name', 'email');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	
}
?>
<h1>Settings</h1>
<form action="" method="post">
		<ul>
			<li>First name*: <br> 
				<input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>">
			</li>
			<li>Last name: <br> 
				<input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>">
			</li>
			<li>Email*: <br> 
				<input type="text" name="email" value="<?php echo $user_data['email']; ?>">
			</li>
			<li> 
				<input type="submit" value="Update">
			</li>
		</ul>
	</form>


<?php
include 'patientInterface/includes/overall/footer.php'; 
?>



