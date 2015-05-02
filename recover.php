<?php
include 'core/init.php';
redirectUser();
?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/header.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php';?>
		<h1>Recover</h1>

		<?php
			if (isset ( $_GET ['success'] ) === true && empty( $_GET ['success'] ) === true) {
			?>
					<p>Thanks, we've emailed you.</p>
			<?php
			} else {
				$mode_allowed = array ('username', 'password');
				if (isset ( $_GET ['mode'] ) === true && in_array ( $_GET ['mode'], $mode_allowed ) === true) {
				if (isset ( $_POST ['email'] ) === true && empty ( $_POST ['email'] ) === false) {
						if (email_exists ( $_POST ['email'] ) === true) {
							// Creating a generic function called [recover()], which will take two parameters.
							recover ( $_GET ['mode'], $_POST ['email'] );
							header ( 'Location: recover.php?success' );
							exit ();
						} else {
							echo '<p>Oops, we couldn\'t find that email address!</p>';
						}
					}
		
		?>
				<form action="" method="post">
				<ul>
					<li>Please enter your email address: <br>
						<input type="text" name="email">
					</li>
					<li><input type="submit" value="Recover"></li>
				</ul>
			</form>
			<?php
			} else {
				header ('Location: index.php');
				exit ();
			}
		}
		 ?>
</div>
	<?php include 'includes/footer.php'; ?>

</body>
</html>

