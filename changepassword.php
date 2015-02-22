<?php
include 'core/init.php';
include 'patientInterface/includes/overall/header.php';
?>

<section>
	<h1>Change Password</h1>

<form action="" method="post">
	<ul>
		<li>Current password*: <br> 
			<input type="text" name="current_password">
		</li>
		<li>New password*: <br> 
			<input type="text" name="password">
		</li>
		<li>New password again*: <br> 
			<input type="text" name="password_again">
		</li>
	</ul>
</form>
</section>

<?php include 'patientInterface/includes/overall/footer.php'; ?>



