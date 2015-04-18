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
		//if (preg_match("/^[1-9][0-9]?(\.[0-9]{1,1})?$/", $_POST['bfb']) === false) 
		//{
		//	$errors[] = 'A valid number is required.';
		//}
		
	}	
}
// /^([1-9]|[1-9]\.[0.9]{1,2})?$/
// /^((0?[1-9]|[1-9][0-9])\.[0-9]{1,2})?$/
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
		echo 'Your record details have been saved successfully!';
		//header('Location: addglucose.php?success');
		//exit();
		
	}else if (empty($errors) === false) {
		echo output_errors($errors);
	}
	?>
	<?php
		if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
		echo 'Your details have been updated!';
		} else {
				if(empty($_POST) === false && empty($errors) === true) {
					//update glucose records
					$updateglucose_data = array(
					'patient_id' 	=> $session_user_id,
					'id'			=> $_POST['id'],
					'glucose_date'	=> $_POST['glucose_date'],
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
		
				update_glucose($session_user_id, $updateglucose_data);
				header('Location: recorddetails.php?success');
				exit();
		
		}else if (empty($errors) === false) {
			echo output_errors($errors);
		}
		?>
	
	
	<form action="addglucose.php" method="post">
	
		<table border='1' class="record">
					<tr>
						<td class="record" align='left'>Date*</td>
						<td class="record"><input type='date' name='glucose_date' value='<?php echo $sql['glucose_date']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before breakfast*</td>
						<td class="record"><input type='number' step='any' name='bfb' value='<?php echo $sql['bfb']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after breakfast*</td>
						<td class="record"><input type='number' step='any' name='afb' value='<?php echo $sql['afb']; ?>' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before lunch*</td>
						<td class="record"><input type='number' step='any' name='bfl' value='<?php echo $sql['bfl']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after lunch*</td>
						<td class="record"><input type='number' step='any' name='afl' value='<?php echo $sql['afl']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before dinner*</td>
						<td class="record"><input type='number' step='any' name='bfd' value='<?php echo $sql['bfd']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>2 hours after dinner*</td>
						<td class="record"><input type='number' step='any' name='afd' value='<?php echo $sql['afd']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Before bed*</td>
						<td class="record"><input type='number' step='any' name='bfbed' value='<?php echo $sql['bfbed']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>During the night*</td>
						<td class="record"><input type='number' step='any' name='night' value='<?php echo $sql['night']; ?>' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Breakfast*</td>
						<td class="record"><input type='number' step='any' name='breakfast' value='<?php echo $sql['breakfast']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Lunch*</td>
						<td class="record"><input type='number' step='any' name='lunch' value='<?php echo $sql['lunch']; ?>'/></td>
					</tr>
					<tr>
						<td class="record" align='left'>Dinner*</td>
						<td class="record"><input type='number' step='any' name='dinner' value='<?php echo $sql['dinner']; ?>' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Bedtime*</td>
						<td class="record"><input type='number' step='any' name='bedtime' value='<?php echo $sql['bedtime']; ?>' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Blood Pressure*</td>
						<td class="record"><input type='number' name='blood_pressure' value='<?php echo $sql['blood_pressure']; ?>' /></td>
					</tr>
					<tr>
						<td class="record" align='left'>Special events/comments*</td>
						<td class="record"><textarea class="record" name='comments' ><?php echo $sql['comments']; ?></textarea></td>
					</tr>
					<tr class="record">
						<td class="record1" colspan='2'>
							<input type='reset' name='reset' value='Clear Form' /> &nbsp;
							<input type='submit' name='submit' value='Save Report' />
						</td>
					</tr>
			</table> <!-- end #table-->
			
		</form> <!-- end #form-->
		
<?php } }?>
	<div class="wrapper">
    		<a href="recorddetails.php"><button class="button">View Blood Glucose Level Records</button></a>
	</div> <!-- end #wrapper button-->

</div> <!-- end #container-->

<?php include 'includes/footer.php'; ?>
</body>
</html>