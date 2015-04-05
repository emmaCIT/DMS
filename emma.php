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
      
			<div class="l_c">
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
						
			</div>
			
			
			<div class="c_c">
               rttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
            ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
            tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
            tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
			
			</div>
	</div>
<?php include 'includes/footer.php'; ?>

</body>
</html>

