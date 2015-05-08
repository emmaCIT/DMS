<?php
include 'core/init.php';
protect_page ();
?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/headerPat.php'; ?>
    <div id="container">
		<?php include 'pat_aside_panel/appointment_aside.php';?>
		<form action="" method="post">
				<div class="fieldSet2">
					<fieldset> 
						<legend class="appointment">Book an Appointment</legend>							
						<p><label for="fullname">Your Full name <span class="span_appt">*</span><br></label><input type="text" placeholder="Full Name" autocomplete="off" name="fullname" class="appointment" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>" /></p>
						<p><label for="email">Doctor's Email Address <span class="span_appt">*</span><br></label><input type="email" placeholder="Email Address" autocomplete="off" name="email" class="appointment" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
						<p><label for="subject">Subject <span class="span_appt">*</span><br></label><input type="text" placeholder="Subject" name="subject" class="appointment" value="<?php if(isset($_POST['subject'])) echo $_POST['subject']; ?>" /></p>
						<p><label for="message">Your Message <span class="span_appt">*</span><br></label><textarea class="textbox-300" placeholder="Please enter your messages here" name="message"><?php if(isset($_POST['message'])) echo $_POST['message']; ?></textarea></p>
														
					</fieldset>
					<div class="appointment_button">
						<button type="submit" name="appointment">Send Email</button>
					</div> <!-- end #button-->
				
				</div> <!-- end #fieldSet-->
				
				
			</form> <!-- end #form-->
	</div> <!-- end #container-->
		
<?php include 'includes/footer.php'; ?>

</body>
</html>