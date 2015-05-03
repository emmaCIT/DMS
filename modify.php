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
			if (isset ($_POST['delete'] )) {
				$del = $_POST['id'];
				$sql = "DELETE FROM bloodglucoselevel WHERE id = $del";
				
				if (mysql_query($sql)) {
					echo "Selected record deleted successfully";
				}
				header ('Location: recorddetails.php');
				exit();
			}
			
			if (isset($_POST['update'])) {
				$ID = mysql_real_escape_string($_POST['id']);
				$glucose_date = mysql_real_escape_string($_POST['glucose_date']);
				$bfb = mysql_real_escape_string($_POST['bfb']);
				$afb = mysql_real_escape_string($_POST['afb']);
				$bfl = mysql_real_escape_string($_POST['bfl']);
				$afl = mysql_real_escape_string($_POST['afl']);
				$bfd = mysql_real_escape_string($_POST['bfd']);
				$afd = mysql_real_escape_string($_POST['afd']);
				$bfbed = mysql_real_escape_string($_POST['bfbed']);
				$night = mysql_real_escape_string($_POST['night']);
				$breakfast = mysql_real_escape_string($_POST['breakfast']);
				$lunch = mysql_real_escape_string($_POST['lunch']);
				$dinner = mysql_real_escape_string($_POST['dinner']);
				$bedtime = mysql_real_escape_string($_POST['bedtime']);
				$blood_pressure = mysql_real_escape_string($_POST['blood_pressure']);
				$comments = mysql_real_escape_string($_POST['comments']);
				
				$sql = "UPDATE bloodglucoselevel SET
				id ='$ID',
				glucose_date ='$glucose_date',
				bfb ='$bfb',
				afb ='$afb',
				bfl ='$bfl',
				afl ='$afl',
				bfd ='$bfd',
				afd ='$afd',
				bfbed ='$bfbed',
				night ='$night',
				breakfast ='$breakfast',
				lunch ='$lunch', 
				dinner ='$dinner',
				bedtime ='$bedtime',
				blood_pressure ='$blood_pressure',
				comments ='$comments'			
				WHERE id=$ID";
				
				if (mysql_query($sql)) {
					echo "Updated successfully";
				}
				header ('Location: recorddetails.php');
				exit ();
			}
			?>
		</div> <!-- end #tablestyle-->
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>