<?php
include 'core/init.php';
protect_page();
?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    		<?php include 'includes/headerPat.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php';?>
        <h1>Patient</h1>
		<?php
/*
if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
	$username 			= $_GET['username'];
	
	if (user_exists($username) === true) {
		$user_id 		= user_id_from_username($username);
		$profile_data 	= patient_data($user_id, 'username', 'first_name', 'last_name', 'email');
		
	?>
	
<h1><?php echo $profile_data['first_name']; ?>'s Profile</h1>
<p>
	<label>Username:</label> 
				<?php echo $profile_data['username']; ?>
		</p>
<p>
	<label>Firstname: </label>
		<?php echo $profile_data['first_name']; ?>
		</p>
<p>
	<label>Lastname: </label>
		<?php echo $profile_data['last_name']; ?>
		</p>
<p>
	<label>Email: </label>
		<?php echo $profile_data['email']; ?>
		</p>
		
<?php
	} else {
		echo 'Sorry, that user doesn\'t exist!';
	}
} else {
	header('Location: profile.php');
	exit();
}
*/
	?>
	</div>
	<?php include 'includes/footer.php'; ?>
	
</body>
</html>
