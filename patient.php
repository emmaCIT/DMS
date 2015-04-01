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
        
	        <div class="profile">
					<?php
					if (isset($_FILES['profile']) === true) {
						if (empty($_FILES['profile'] ['name']) === true) {
							echo 'Please choose a file!';
						} else {
							$allowed = array('jpg', 'jpeg', 'gif', 'png');
							
							$file_name = $_FILES['profile'] ['name'];
							$file_extn = strtolower(end(explode('.', $file_name)));
							$file_temp = $_FILES['profile'] ['tmp_name'];
							
							if (in_array($file_extn, $allowed) === true) {
								//upload file
								change_profile_image($session_user_id, $file_temp, $file_extn);
								header('Location: ' . $current_file);
								exit();
							} else {
								echo 'Incorrect file type. Allowed: ';
								echo implode(', ', $allowed);
							}
						}
					}
					
						if (empty($user_data['profile']) === false) {
								echo '<img src="', $user_data['profile'], '" alt="', $user_data['first_name'], '\'s Profile Image">';
						}
						?>
						
						<form action="" method="post" enctype="multipart/form-data">
							<input type="file" name="profile"> <input type="submit">
						</form>
				</div>
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
