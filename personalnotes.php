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
			$msg = 'Your details have been saved!';
			echo '<script type="text/javascript"> alert("' . $msg. '")</script>';
		} else {if(empty($_POST) === false && empty($errors) === true) {
				//update patient's personal notes
				$insert_notes = array(
					'patient_id' 	=> $session_user_id,
					'username' 		=> $user_data['username'],
					'date_created'   => $_POST['date_created'],
					'title'			=> $_POST['title'],
					'notes'			=> $_POST['notes']
				
			);

					insert_personalnotes($session_user_id, $insert_notes);
					header('Location: personalnotes.php?success');
					exit();
					
		}else if (empty($errors) === false) {
				echo output_errors($errors);
		}
}
		?>
		
	
	  
	<form action="" method="post">
				<div class="fieldSet">
					<fieldset> 
						<legend>Personal Notes</legend>
						<p><label class="field" for="Date Created"><span>*</span>Date Created:</label><input type="date" name="date_created" value="" class="note_text" /></p>
						<p><label class="field" for="Last Updated"><span>*</span>Last Updated:</label><input type="datetime-local" name="last_updated" class="textbox3" /></p>
						<p><label class="field" for="Title"><span>*</span>Title:</label><input type="text" name="title" class="textbox1" /></p>
						<p><label class="field" for="Notes"><span>*</span>Notes:</label><textarea placeholder="Please enter your notes" name="notes" class="textbox-note"></textarea></p>
										
					</fieldset>
					<div class="notebutton">
						<button type="submit" name= "save_note" value="Save Note">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- <input type="submit" name= "update" value="Update Note">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name= "delete" value="Delete Note"> -->
					</div> <!-- end #button-->
				</div> <!-- end #fieldSet-->
			</form> <!-- end #form-->
		</div> <!-- end #personalNote-->
		</div> <!-- end #container-->
 
   <?php include 'includes/footer.php'; ?>
   
</body>
</html>