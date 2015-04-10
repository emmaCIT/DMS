<?php
include 'core/init.php';
protect_page ();

if (empty($_POST) === false) {
	$required_fields = array('date', 'bfb', 'afb', 'bfl', 'afl', 'bfd', 'afd', 'bfbed', 'night', 'breakfast', 'lunch', 'dinner', 'bedtime', 'comments');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	
}
	$query = "SELECT * FROM bloodglucoselevel WHERE `patient_id` = $session_user_id";
	$QueryResult = mysql_query($query);
?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    		<?php include 'includes/headerPat.php'; ?>
    <div id="container">

		<h1>Your Record Details</h1>

		<?php
		if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
		echo 'Your details have been updated!';
		} else {
				if(empty($_POST) === false && empty($errors) === true) {
					//update glucose records
					$updateglucose_data = array(
					'patient_id' 	=> $session_user_id,
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
		
				update_glucose($session_user_id, $updateglucose_data);
				header('Location: recorddetails.php?success');
				exit();
		
		}else if (empty($errors) === false) {
			echo output_errors($errors);
		}
		?>
	
		<!-- Now ADD Blood Glucose Level Table -->
		<div class="tablestyle">	
			<?php		
				//create html table and populate with blood glucose level records.
				echo "<table>";
				echo "<thead>".
					 "<tr><th>Date</th>".
				 	"<th colspan='8'>Blood glucose level (mmol/l)</th>".
				 	"<th colspan='4'>Insulin dose</th>".
				 	"<th>Special events/comments</th>".
				 	"<th>&nbsp;</th>".
				 	"<th>&nbsp;</th></tr>".
				 	"</thead>".
					 
				 	"<tr class='row1'>".
					 "<td></td>".
					 "<td>before breakfast</td>".
					 "<td>2 hours after breakfast</td>".
				 	"<td>before lunch</td>".
				 	"<td>2 hours after lunch</td>".
				 	"<td>before dinner</td>".
				 	"<td>2 hours after dinner</td>".
					 "<td>before bed</td>".
				 	"<td>during the night</td>".
				 	"<td>breakfast</td>".
				 	"<td>lunch</td>".
				 	"<td>dinner</td>".
				 	"<td>bedtime</td>".
				 	"<td></td>".
				 	"<td></td>".
				 	"<td></td></tr>\n";
			
			while($report = mysql_fetch_assoc($QueryResult)){
				echo "<form action=modify.php method=POST>";
				echo "<tr class='row2'>";
				echo  "<td align=left>" . "<input type=date class=details2 name=date value=". $report['date']." </td>";
				echo	"<td>" . "<input type=number class=details name=bfb value=" . $report['bfb'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=afb value=" . $report['afb'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=bfl value=" . $report['bfl'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=afl value=" . $report['afl'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=bfd value=" . $report['bfd'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=afd value=" . $report['afd'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=bfbed value=" . $report['bfbed'] . " </td>";
				
				echo	"<td>" . "<input type=number class=details name=night value=" . $report['night'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=breakfast value=" . $report['breakfast'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=lunch value=" . $report['lunch'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=dinner value=" . $report['dinner'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=bedtime value=" . $report['bedtime'] . " </td>";
				echo	"<td>" . "<input type=text 	 class=details1 name=comments value=" . $report['comments'] . " </td>";
				echo	"<td>" . "<input type=submit name=update value=update />" . " </td>";
				echo 	"<td>" . "<input type=submit name=delete value=delete />" . " </td>";
				echo	"</tr>";
				echo 	"</form>";
			}
				
				echo "</table>" ;
				echo '<p/>';
		?>
			
		</div> <!-- end #tablestyle-->
		<?php } ?>
		
		<p><a href="addglucose.php">Enter your Records</a></p>
		
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php';?>
    
</body>
</html>