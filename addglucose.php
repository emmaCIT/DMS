<?php
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
	$required_fields = array('date', 'bfb', 'afb', 'bfl', 'afl', 'bfd', 'afd', 'bfbed', 'night', 'breakfast', 'lunch', 'dinner', 'bedtime', 'comments');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	/*if (empty($errors) === true) {
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'A valid email address is required';
		}
		if (preg_match("^[1-9]\d*$", $_POST['bfb'], $_POST['afb'], $_POST['bfl'], $_POST['afl'], $_POST['bfd'], $_POST['afd'], $_POST['bfbed'], $_POST['night'], $_POST['breakfast'], $_POST['lunch'], $_POST['dinner'], $_POST['bedtime']) === false) 
		{
			$errors[] = 'A valid number is required.';
		}
	}	*/	
}

?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    		<?php include 'includes/headerPat.php'; ?>
    <div id="container">
        
		<h1>Blood Glucose Level Record Entry</h1>

<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
	echo 'Your details have been saved!';
} else {
	if(empty($_POST) === false && empty($errors) === true) {
		//update user's details
		$insert_data = array(
				'date'			=> $_POST['date'],
				'bfb'			=> $_POST['bfb'],
				'afb' 			=> $_POST['afb'],
				'bfl' 			=> $_POST['bfl'],
				'afl' 			=> $_POST['afl'],
				'bfd' 			=> $_POST['bfd'],
				'afd' 			=> $_POST['afd'],
				'bfbed' 		=> $_POST['bfbed'],
				'night' 		=> $_POST['night'],
				'breakfast' 	=> $_POST['breakfast'],
				'lunch' 		=> $_POST['lunch'],
				'dinner' 		=> $_POST['dinner'],
				'bedtime' 		=> $_POST['bedtime'],
				'comments' 		=> $_POST['comments']
		);
		
		insert_bloodsugarlevel($session_user_id, $insert_data);
		header('Location: addglucose.php?success');
		exit();
		
	}else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>
	<form action="addglucose.php" method="post">
	
		<table border='1' class="record">
					<tr>
						<td class="record" align='left'>Date*</td>
						<td class="record"><input type='date' name='date'  /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before breakfast*</td>
						<td class="record"><input type="number" name='bfb'  /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after breakfast*</td>
						<td class="record"><input type="number" name='afb' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before lunch*</td>
						<td class="record"><input type='number' name='bfl' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after lunch*</td>
						<td class="record"><input type='number' name='afl'  /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before dinner*</td>
						<td class="record"><input type='number' name='bfd' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after dinner*</td>
						<td class="record"><input type='number' name='afd' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before bed*</td>
						<td class="record"><input type='number' name='bfbed' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>During the night*</td>
						<td class="record"><input type='number' name='night' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Breakfast*</td>
						<td class="record"><input type='number' name='breakfast' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Lunch*</td>
						<td class="record"><input type='number' name='lunch' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Dinner*</td>
						<td class="record"><input type='number' name='dinner' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Bedtime*</td>
						<td class="record"><input type='number' name='bedtime' /></td>
					</tr>
					
					<tr>
						<td class="record" align='left'>Special events/comments*</td>
						<td class="record"><textarea class="record" name='comments' /></textarea></td>
					</tr>
					<tr class="record">
						<td class="record1" colspan='2'>
							<input type='reset' name='reset' value='Clear Form' /> &nbsp;
							<input type='submit' name='submit' value='Save Report' />
						</td>
					</tr>
			</table> <!-- end #table-->
			
		</form> <!-- end #form-->
		
<?php } ?>
<a href="recorddetails.php">View Blood Glucose Level Records</a>
</div> <!-- end #container-->

<?php include 'includes/footer.php'; ?>
</body>
</html>