<?php
include 'core/init.php';
protect_page ();

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
	
		<!-- Now ADD Blood Glucose Level Table -->
		<div class="tablestyle">	
			<?php	
						
				//create html table and populate with blood glucose level records.
				echo "<table>";
				echo "<thead>".
					 "<tr><th class=detailss1>ID</th>".
					 "<th>Date</th>".
				 	"<th colspan='8'>Blood glucose level (mmol/l)</th>".
				 	"<th colspan='4'>Insulin dose</th>".
				 	"<th>Blood Pressure</th>".
				 	"<th>Special events/comments</th>".
				 	"<th>&nbsp;</th>".
				 	"<th>&nbsp;</th></tr>".
				 	"</thead>".
					 
				 	"<tr class='row1'>".
				 	"<td class=detailss1></td>".
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
				 	"<td></td>".
				 	"<td></td></tr>\n";
			
			while($report = mysql_fetch_assoc($QueryResult)){				
				echo "<form action=modify.php method=POST>";
				echo "<tr class='row2'>";
				echo  "<td align=left class=detailss1>" . "<input type=number class=detailss readonly=readonly name=id value=". $report['id']." </td>";
				echo  "<td align=left>" . "<input type=date class=details2 name=glucose_date value=". $report['glucose_date']." </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=bfb value=" . $report['bfb'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=afb value=" . $report['afb'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=bfl value=" . $report['bfl'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=afl value=" . $report['afl'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=bfd value=" . $report['bfd'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=afd value=" . $report['afd'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=bfbed value=" . $report['bfbed'] . " </td>";
				echo	"<td>" . "<input type=number step=0.1 min=0 class=details name=night value=" . $report['night'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=breakfast value=" . $report['breakfast'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=lunch value=" . $report['lunch'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=dinner value=" . $report['dinner'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=bedtime value=" . $report['bedtime'] . " </td>";
				echo	"<td>" . "<input type=number class=details name=blood_pressure value=" . $report['blood_pressure'] . " </td>";
				echo	"<td>" . "<input type='text' placeholder=comments class=details1 name=comments value='" . $report['comments'] . "'>" . " </td>";
				echo	"<td>" . "<input type=submit name=update value=update>" . " </td>";
				echo 	"<td>" . "<input type=submit name=delete value=delete>" . " </td>";
				echo	"</tr>";
				echo 	"</form>";
			}
			
			
				echo "</table>" ;
				echo '<p/>';
		
		?>
			
		</div> <!-- end #tablestyle-->
		
		
		<div class="wrapper">
    		<a href="addglucose.php"><button class="button">Enter your Records</button></a>
		</div> <!-- end #wrapper button-->
	
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php';?>
    
</body>
</html>