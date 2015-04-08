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
			/*
			$SQLString = "SELECT * FROM bloodglucoselevel, users WHERE bloodglucoselevel.id  = users.user_id";
			
			
			if(!$SQLString)
			{
				$error = 'Error exectuting query: ' . mysqli_error($DBConnection);
				include 'error.html.php';
				exit();
			}
			else if(!mysql_num_rows($SQLString))
			{
				echo "<p>There are no dvds Record in the database.</p>\n";
			}
			else
			{
					
				//create html table and populate with resultset
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
			
			while($report = mysqli_fetch_assoc($SQLString)){
				echo "<form action=modify.php method=POST>";
				echo "<tr class='row2'>";
				echo  "<td align=left>" . "<input type=text size=5 name=dvdID value=" . $report['dvdID'] . " </td>";
				echo	"<td>" . "<input type=text size=5 name=cert value=" . $report['cert'] . " </td>";
				echo	"<td>" . "<input type=text size=10 name=filmTitle value=" . $report['filmTitle'] . " </td>";
				echo	"<td>" . "<input type=date  size=10 name=releaseDate value=" . $report['releaseDate'] . " </td>";
				echo	"<td>" . "<input type=text size=10 name=filmDuration value=" . $report['filmDuration'] . " </td>";
				echo	"<td>" . "<input type=text size=10 name=director value=" . $report['director'] . " </td>";
				echo	"<td>" . "<input type=text size=15 name=description value=" . $report['description'] . " </td>";
				echo	"<td>" . "<input type=submit name=update value=update />" . " </td>";
				echo 	"<td>" . "<input type=submit name=delete value=delete />" . " </td>";
				echo	"</tr>";
				echo 	"</form>";
			}
			
			echo "</table>" ;
			echo 'Database connection established.' ;
			echo '<p/>';
			
			}*/
		
		?>
		
		<p>
		<a href="addglucose.php">Enter your Records</a></p>
		
		</div> <!-- end #tablestyle-->
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>