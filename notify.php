<?php 
	 include 'core/init.php';
	 protect_page();
	 
?>

<!DOCTYPE HTML>
<html>
	
	<?php include 'includes/docHead.php'; ?>
<body>
    		<?php include 'includes/headerDoc.php'; ?>
    <div id="container">
          
          <aside>
         		<?php include 'includes/widgets/patient_count.php'; ?> 
          </aside>  
	        <?php
			if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			?>
					<p>Email has been sent successfully</p>
			<?php
				} else {	
						if (empty($_POST) === false) {
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
							mail_users($_POST['subject'], $_POST['message']);
							header('Location: notify.php?success');
							exit();		
						}
				}
}
		?>    
    	<div class="notifypatients">
    		<form action="" method="post">
			<fieldset> 
				<legend>Email your Patients</legend>
						<p><label class="field" for="subject">Subject*:</label><input type="text" name="subject" class="sub" /></p>
						<p><label class="field" for="message">Message*:</label><textarea name="message" class="infor3"></textarea>
						
			</fieldset>
			<input type="submit" value="Send" class="btn">
			</form> <!-- end #form--> 
		</div> <!-- end #notifypatients--> 				
	</div> <!-- end #container-->
      
      <?php include 'includes/footer.php';?>

</body>
</html>