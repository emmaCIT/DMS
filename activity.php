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
    		<aside>
         		<?php include 'includes/widgets/notify.php'; ?> 
         	 </aside> 
			<h1>Activities</h1>
					
					
					
					<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'Your details have been updated!';
} else {
	if(empty($_POST) === false && empty($errors) === true) {
		//update user's details
		$update_data = array(
		
				'first_name'		=> $_POST['first_name'],
				'last_name'			=> $_POST['last_name'],
				'phone_number' 		=> $_POST['phone_number'],
				'email' 			=> $_POST['email'],
				'address' 			=> $_POST['address'],
				'allow_email' 	=> ($_POST['allow_email'] == 'on') ? 1 : 0
		);
		
		update_user($session_user_id, $update_data);
		header('Location: activity.php?success');
		exit();
		
	}else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>
	<form action="" method="post">
			<ul>
				
				<li>
				<input type="checkbox" name="allow_email" <?php if ($user_data['allow_email'] == 1) { echo 'checked="checked"'; } ?>> Would you like to receive email from us?
				</li>
				<li> 
					<input type="submit" value="Update">
				</li>
			</ul>
		</form>
		
<?php } ?>

					
					
					
					
	</div> <!-- end #container--> 	
	
	<?php include 'includes/footer.php';?>

	
</body>
</html>
