<?php
	include 'core/init.php';

	$query="UPDATE personalnotes SET notes='".mysql_real_escape_string($_POST['notes'])."' WHERE patient_id ='".$_SESSION['user_id']."' LIMIT 1";

	mysql_query($link,$query);
	print_r($_SESSION);
	?>


<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/headerPat.php'; ?>
    <div id="container">
   	 <?php include 'pat_aside_panel/personalnote_aside.php';?>
		
		
			
						<p><label class="field" for="Notes"><span>*</span>Notes:</label><textarea name="notes" class="textbox-300"></textarea></p>
										
				






	</div>
   
   <?php include 'includes/footer.php'; ?>
   
</body>
</html>