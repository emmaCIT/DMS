<?php
include 'core/init.php';
protect_page ();

if (empty($_POST) === false) {
	$required_fields = array('date_created', 'title', 'notes');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

}
?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/headerPat.php'; ?>
    <div id="container">
   	 <?php include 'pat_aside_panel/personalnote_aside.php';?>
		
		<div class="personalNote">
		
		<?php
		if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
			echo 'Your details have been saved!';
		} else {
			if(empty($_POST) === false && empty($errors) === true) {
				//update patient's blood glucose level record details
				$insert_notes = array(
					'patient_id' 	=> $session_user_id,
					'username' 		=> $user_data['username'],
					'date_created'   => $_POST['date_created'],
					'title'			=> $_POST['title'],
					'notes'			=> $_POST['notes']
				
			);

					insert_personalnotes($session_user_id, $insert_notes);
					//header('Location: personalnotes.php?success');
					//exit();
		
		}else if (empty($errors) === false) {
		echo output_errors($errors);
		}
		?>
		

	
	  
	 function myFunction() {
		<?php  		
					$query = "SELECT * FROM personalnotes WHERE `patient_id` = $session_user_id AND YEAR(date_created) = YEAR(NOW()) AND MONTH(date_created)=MONTH(NOW()) ";
					$QueryResult = mysql_query($query);
						
					while($rep = mysql_fetch_assoc($QueryResult)){
						echo "<form action= method=post>";
				
						echo  "<input type=date name=date_created value=". $rep['date_created']."";
						 
						echo 	"</form>";
					}				
					
			
					?>
	 }
	
	 
			 </div> <!-- end #personalNote-->


	</div>
   <?php } ?>
   <?php include 'includes/footer.php'; ?>
   
</body>
</html>