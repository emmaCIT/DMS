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
        
	        <div class="left-container">
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
						
					
				</div> <!-- end #left-container-->
				 
				<div class="buttons">
						<form action="" method="post" enctype="multipart/form-data">
							<input type="file" name="profile"> <input type="submit">
						</form>
					</div> <!-- end #buttons--> 

				
				
				<!-- This is to display the Patient's Information Details -->
				<?php
	
					$profile_data 	= patient_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'DOB', 'gender', 'phone_number', 'address', 'email', 'password_recover', 'type', 'profile');
				?>
				<div class="center-container">
				<fieldset> 
						<legend>Personal Information</legend>
						<p><label class="field" for="username">Username:</label><input type="text" name="username" class="infor" value="<?php echo $profile_data['username']; ?>"/></p>
						<p><label class="field" for="firstname">First Name:</label><input type="text" name="firstname" class="infor" value="<?php echo $profile_data['first_name']; ?>" /></p>
						<p><label class="field" for="lastname">Last Name:</label><input type="text" name="lastname" class="infor" value="<?php echo $profile_data['last_name']; ?>" /></p>
						<p><label class="field" for="dob">Date of Birth:</label><input type="text" name="dob" class="infor" value="<?php echo $profile_data['DOB']; ?>" /></p>
						<p><label class="field" for="gender">Gender:</label><input type="text" name="gender" class="infor" value="<?php echo $profile_data['gender']; ?>" /></p>
						<p><label class="field" for="phone_number">Phone Number:</label><input type="text" name="phone_number" class="infor" value="<?php echo $profile_data['phone_number']; ?>" /></p>
						<p><label class="field" for="email">Email:</label><input type="text" name="email" class="infor" value="<?php echo $profile_data['email']; ?>" /></p>
						<p><label class="field" for="address">Address:</label><textarea name="address" class="infor2" ><?php echo $profile_data['address']; ?></textarea></p>
						
				</fieldset>
				</div> <!-- end #center-container--> 	
				
	</div> <!-- end #container-->
	
	
	<?php include 'includes/footer.php'; ?>
	
</body>
</html>