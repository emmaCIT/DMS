<aside>
	<?php 
	if (logged_in() === true) {
			include 'profile.php';
	} else {
			include 'includes/widgets/login.php';
	}
	?>
</aside>







