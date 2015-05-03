<?php
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
	$required_fields = array('glucose_date', 'bfb', 'blood_pressure');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	if (empty($errors) === true) {
		if(strlen($_POST['bfb'])>4 || strlen($_POST['afb'])>4 || strlen($_POST['bfl'])>4 || strlen($_POST['afl'])>4 || strlen($_POST['bfd'])>4 || strlen($_POST['afd'])>4 || strlen($_POST['bfbed'])>4 || strlen($_POST['night'])>4) {
			$errors[] = 'Please enter the correct blood glucose level readings';
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
		<h1>Blood Glucose Level Record Entry</h1>

<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
	$msg = 'Your details have been saved successfully!';
	echo '<script type="text/javascript"> alert("' . $msg. '")</script>';
} else {
	if(empty($_POST) === false && empty($errors) === true) {
		//update patient's blood glucose level record details
		$insert_data = array(
				'patient_id' 		=> $session_user_id,
				'id'				=> $_POST['id'],
				'glucose_date'		=> $_POST['glucose_date'],
				'bfb'				=> $_POST['bfb'],
				'afb' 				=> $_POST['afb'],
				'bfl' 				=> $_POST['bfl'],
				'afl' 				=> $_POST['afl'],
				'bfd' 				=> $_POST['bfd'],
				'afd' 				=> $_POST['afd'],
				'bfbed' 			=> $_POST['bfbed'],
				'night' 			=> $_POST['night'],
				'breakfast' 		=> $_POST['breakfast'],
				'lunch' 			=> $_POST['lunch'],
				'dinner' 			=> $_POST['dinner'],
				'bedtime' 			=> $_POST['bedtime'],
				'blood_pressure' 	=> $_POST['blood_pressure'],
				'comments' 			=> $_POST['comments']
		);

		insert_bloodsugarlevel($session_user_id, $insert_data);
		header('Location: addglucose.php?success');
		exit();
		
	}else if (empty($errors) === false) {
		echo output_errors($errors);
	}
}
	?>
	
	
	<form action="addglucose.php" method="post">
	
		<table border='1' class="record">
					<tr>
						<td class="record" align='left'>Date*</td>
						<td class="record"><input type='date' name="glucose_date" value="<?php if(isset($_POST['glucose_date'])) echo $_POST['glucose_date']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before breakfast*</td>
						<td class="record"><input type="number" step="0.1" min="0"  name="bfb" value="<?php if(isset($_POST['bfb'])) echo $_POST['bfb']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after breakfast*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="afb" value="<?php if(isset($_POST['afb'])) echo $_POST['afb']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before lunch*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="bfl" value="<?php if(isset($_POST['bfl'])) echo $_POST['bfl']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after lunch*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="afl" value="<?php if(isset($_POST['afl'])) echo $_POST['afl']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before dinner*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="bfd" value="<?php if(isset($_POST['bfd'])) echo $_POST['bfd']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after dinner*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="afd" value="<?php if(isset($_POST['afd'])) echo $_POST['afd']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before bed*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="bfbed" value="<?php if(isset($_POST['bfbed'])) echo $_POST['bfbed']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>During the night*</td>
						<td class="record"><input type="number" step="0.1" min="0" name="night" value="<?php if(isset($_POST['night'])) echo $_POST['night']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Breakfast*</td>
						<td class="record"><input type="number" name="breakfast" value="<?php if(isset($_POST['breakfast'])) echo $_POST['breakfast']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Lunch*</td>
						<td class="record"><input type="number" name="lunch" value="<?php if(isset($_POST['lunch'])) echo $_POST['lunch']; ?>"/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Dinner*</td>
						<td class="record"><input type="number" name="dinner" value="<?php if(isset($_POST['dinner'])) echo $_POST['dinner']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Bedtime*</td>
						<td class="record"><input type="number" name="bedtime" value="<?php if(isset($_POST['bedtime'])) echo $_POST['bedtime']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Blood Pressure*</td>
						<td class="record"><input type="number" name="blood_pressure" value="<?php if(isset($_POST['blood_pressure'])) echo $_POST['blood_pressure']; ?>" /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Special events/comments*</td>
						<td class="record"><textarea class="record" name="comments" placeholder="Special Events/Comments"><?php if(isset($_POST['comments'])) echo $_POST['comments']; ?></textarea></td>
					</tr>
					<tr class="record">
						<td class="record1" colspan='2'>
							<input type='reset' name='reset' value='Clear Form' /> &nbsp;
							<input type='submit' name='submit' value='Save Report' />
						</td>
					</tr>
			</table> <!-- end #table-->
			
		</form> <!-- end #form-->
		
	<div class="wrapper">
    		<a href="recorddetails.php"><button class="button">View Blood Glucose Level Records</button></a>
	</div> <!-- end #wrapper button-->

</div> <!-- end #container-->

<?php include 'includes/footer.php'; ?>
</body>
</html>