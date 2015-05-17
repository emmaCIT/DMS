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

		<h1>Your Record Details</h1>

		<!-- Now ADD Blood Glucose Level Table -->
		<div class="tablestyle">
			
			<?php
			if (isset($_POST['save_history'])) {
				$ID = mysql_real_escape_string($_POST['id']);
				$medical_history = mysql_real_escape_string($_POST['medical_history']);
		
				
				$sql = "UPDATE patient SET
				id ='$ID',
				medical_history ='$medical_history'		
				WHERE id=$ID";
				
				if (mysql_query($sql)) {
					echo "Updated successfully";
				}
				header ('Location: patient.php');
				exit ();
			}
			?>
		</div> <!-- end #tablestyle-->
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>