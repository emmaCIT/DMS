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
        
        
        
        		<div class="patientinforstyle">	
			<?php	
						
				//Display Patients Blood Glucose Level Records
				echo "<table class='viewrecords'>";
				echo "<thead>".
					 "<th>Date</th>".
				 	"<th colspan='8'>Blood glucose level (mmol/l)</th>".
				 	"<th colspan='4'>Insulin Dose</th>".
				 	"<th>Blood Pressure</th>".
				 	"<th>Special events/comments</th>".
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
				 	"<td></td></tr>\n";
			
							
				echo "<tr class='row2'>";
				echo  "<td align=left>" . "<input type=date class=details2 name=glucose_date  </td>";
				echo	"<td>" . "<input type=number class=details name=bfb value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=afb value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=bfl value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=afl value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=bfd value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=afd value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=bfbed value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=night value=5.5 </td>";
				echo	"<td>" . "<input type=number class=details name=breakfast value=10 </td>";
				echo	"<td>" . "<input type=number class=details name=lunch value=20 </td>";
				echo	"<td>" . "<input type=number class=details name=dinner value=40 </td>";
				echo	"<td>" . "<input type=number class=details name=bedtime value=20 </td>";
				echo	"<td>" . "<input type=number class=details name=blood_pressure value=40 </td>";
				echo	"<td>" . "<input type='text' placeholder=comments class=details1 name=comments value='hypo during the night' >" . "</td>";
				echo	"</tr>";
				echo 	"</form>";
				
				echo "</table>" ;
				echo '<p/>';
		
		?>
			
		</div> <!-- end #patientinfor style-->
        
        
       
		<div class="wrapper">
    		<a title="print screen" onclick="window.print();" target="_blank" style="cursor:pointer;" media="print"><button class="printrecord">Print a Patient Records</button></a>
		</div> <!-- end #wrapper button-->
	</div> <!-- end #container-->
      
      <?php include 'includes/footer.php';?>

</body>
</html>