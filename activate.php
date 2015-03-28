<?php
include 'core/init.php';
?>

<!DOCTYPE HTML>
<html>
	
	<?php include 'includes/head.php'; ?>
	<body>
    		<?php include 'includes/header.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php';?>
        
        	<h1>Activate</h1>
        	<p>Activation Page.</p>

    <?php
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	?>
		<h2>Thank you, we've activated your account...</h2>
		<p>You're free to log in!</p>
	<?php
	} else if (isset($_GET['email'], $_GET['email_code']) === true) {
			$email 		= trim($_GET['email']);
			$email_code = trim($_GET['email_code']);
	
		if (email_exists($email) === false) {
				$errors[] = 'Oops, something went wrong, and we couldn\'t find that email address!';
		}else if (activate($email, $email_code) === false) {
				$errors[] = 'We had problems activating your account';
		}
	
		if (empty($errors) === false) {
		?>
			<h2>Oops...</h2>
		<?php 
			echo output_errors($errors);
		} else {
			header('Location: activate.php?success');
			exit();
		}
	
	} else {
			header('Location: login.php');
			exit();
	}
	//include 'includes/overall/footer.php';
	?>
	</div>
	<?php include 'includes/footer.php' ;?>
	</body>
	
</html>

