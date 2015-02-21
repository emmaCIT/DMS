<aside>
	<?php 
	if (logged_in() === true) {
			include 'patientData.php';
	} else {
			include 'includes/widgets/login.php';
	}
	?>
</aside>







