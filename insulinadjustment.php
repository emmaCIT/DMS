<?php 
	 include 'core/init.php';
	 protect_page();
?>

<!DOCTYPE HTML>
<html>
	
	<?php include 'includes/docHead.php'; ?>
<body>
    		<?php include 'includes/headerDoc.php'; ?>
    <div id="container">
       <?php include 'doc_aside_panel/patientinfor.php';?>
	
		<!-- Adjust Patients Insulin-->
		<div class="tablestyle">	
			<?php	
				
				echo "<table>";
				echo "<thead>".
					 "<th>Date</th>".
				 	"<th>Adjust Insulin Dosage(units/day)*</th>".
				 	"<th>&nbsp;</th>".
				 	"<th>&nbsp;</th></tr>".
				 	"</thead>".
					 
				 	"<tr class='row1'>".
					"<td>Monday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
				
					
					"<tr class='row1'>".
					"<td>Tuesday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
					
					"<tr class='row1'>".
					"<td>Wednesday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
					
					"<tr class='row1'>".
					"<td>Thursday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
					
					"<tr class='row1'>".
					"<td>Friday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
					
					"<tr class='row1'>".
					"<td>Saturday</td>".
					"<td class='row2'></td>".
					"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
					"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
					
					"<tr class='row1'>".
					"<td>Sunday</td>".
				 	"<td class='row2'></td>".
				 	"<td class='row2'>". "<input type=submit name=update value=update>" . "</td>".
				 	"<td class='row2'>" . "<input type=submit name=delete value=delete>" . "</td>".
				 	"</tr>\n";
			
			
			
				
				
				echo	"</tr>";
				echo 	"</form>";
			
				
				echo "</table>" ;
				echo '<p/>';
		
		?>
			
		</div> <!-- end #tablestyle-->
    	
	</div> <!-- end #container-->
      
      <?php include 'includes/footer.php';?>

</body>
</html>