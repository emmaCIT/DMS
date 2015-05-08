<?php
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
	$required_fields = array('medical_history');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] ='The Field medical history is required';
			break 1;
		}
	}

}
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

				<?php
					if(isset($_GET['success'])=== true && empty($_GET['success'])=== true) {
					$msg = 'Your medical history have been saved!';
					echo '<script type="text/javascript"> alert("' . $msg. '")</script>';
					}else {
						if(empty($_POST)=== false && empty($errors)=== true) {
							//insert patient's medical history into the database
							$insert_medicaldata= array(
							'patient_id' 			=> $session_user_id,
							'username' 				=> $user_data['username'],
							'medical_history' 		=> $_POST['medical_history']			
					);

					insert_medicalhistory($session_user_id, $insert_medicaldata);
					header('Location: patient.php?success');
					exit();
					
					}else if (empty($errors) === false) {
						echo output_errors($errors);
					}
				}
				?>
				
				<!-- This is to display the Patient's Information Details -->
				<div class="center-container">
				<fieldset> 
						<legend>Personal Information</legend>
						<p><label class="field" for="username">Username:</label><input type="text" name="username" class="infor" value="<?php echo $user_data['username']; ?>"/></p>
						<p><label class="field" for="firstname">First Name:</label><input type="text" name="firstname" class="infor" value="<?php echo $user_data['first_name']; ?>" /></p>
						<p><label class="field" for="lastname">Last Name:</label><input type="text" name="lastname" class="infor" value="<?php echo $user_data['last_name']; ?>" /></p>
						<p><label class="field" for="dob">Date of Birth:</label><input type="text" name="dob" class="infor" value="<?php echo $user_data['DOB']; ?>" /></p>
						<p><label class="field" for="gender">Gender:</label><input type="text" name="gender" class="infor" value="<?php echo $user_data['gender']; ?>" /></p>
						<p><label class="field" for="phone_number">Phone Number:</label><input type="text" name="phone_number" class="infor" value="<?php echo $user_data['phone_number']; ?>" /></p>
						<p><label class="field" for="email">Email:</label><input type="text" name="email" class="infor" value="<?php echo $user_data['email']; ?>" /></p>
						<p><label class="field" for="address">Address:</label><textarea name="address" class="infor2" ><?php echo $user_data['address']; ?></textarea></p>
						
						<form action="" method="post">
							<p><label class="field" for="medical_history">Medical History:</label><textarea placeholder="Please enter your medical history" name="medical_history" class="medicalHistory"><?php if(isset($_POST['medical_history'])) echo $_POST['medical_history']; ?></textarea></p><button type="submit" name="save_history">Save Medical History</button>
						</form> <!-- end #form-->
				</fieldset>
				</div> <!-- end #center-container--> 	
				
	</div> <!-- end #container-->
	
	
	<?php include 'includes/footer.php'; ?>
	
</body>
</html>