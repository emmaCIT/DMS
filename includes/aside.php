<aside>
	<?php 
	if (logged_in() === true) {
			include 'patientRecord.php';
	} else {
			include 'includes/widgets/login.php';
	}
	?>
</aside>







