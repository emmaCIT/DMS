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
   	 <?php include 'pat_aside_panel/personalnote_aside.php';?>
		
		<div class="personalNote">
			<form action="" method="post">
				<div class="fieldSet">
					<fieldset> 
						<legend>Personal Notes</legend>
						<p><label class="field" for="Title"><span>*</span>Title:</label><input type="text" name="title" class="textbox1" /></p>
						<p><label class="field" for="Date Created"><span>*</span>Date Created:</label><input type="date" name="datecreated" class="textbox2" /></p>
						<p><label class="field" for="Last Updated"><span>*</span>Last Updated:</label><input type="text" name="datecreated" class="textbox2" /></p>
						<p><label class="field" for="Notes"><span>*</span>Notes:</label><textarea name="notes" class="textbox-300"></textarea></p>
										
					</fieldset>
					<div class="notebutton">
						<button type="button" value="Save Note">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" value="Update Note">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" value="Delete Note">
					</div> <!-- end #button-->
				</div> <!-- end #fieldSet-->
			</form> <!-- end #form-->
		</div> <!-- end #personalNote-->












	</div>
   
   <?php include 'includes/footer.php'; ?>
   
</body>
</html>