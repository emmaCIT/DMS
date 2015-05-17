<aside>
	 <?php
			if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			?>
					<p>Email has been sent to your doctor</p>
			<?php
				} else {
					if (empty($_POST) === false){
						if (empty($_POST['fullname']) === true) {
							$errors[] = 'Your Fullname is required';
						}
						if (empty($_POST['email']) === true) {
							$errors[] = 'Doctor\'s email is required';
						}
						if (empty($_POST['subject']) === true) {
							$errors[] = 'Subject is required';
						}
						if (empty($_POST['message']) === true) {
							$errors[] = 'Message is required';
						}
						if (empty($errors) === false) {
							echo output_errors($errors);
						} else {
						//Here, we send email.
						 mail_doctor($_POST['fullname'], $_POST['email'], $_POST['subject'], $_POST['message'],"From: " . $user_data['email']);
						 header('Location: appointment.php?success');
						  exit();
					}
				}
		
		}	
	?>    

</aside>
