<aside>
	<h1>Display Notes</h1>

	<script>
		
 		function hello()
 		{
 			<?php 
 					$query = "SELECT * FROM personalnotes WHERE `patient_id` = $session_user_id";
 					$QueryResult = mysql_query($query);
 					while($report = mysql_fetch_assoc($QueryResult)){
 					echo ' alert("' .$report. '")';}
 					?>
 					//var x = document.getElementById("mySelect").value;
			//alert (x);
			
			//var x = document.getElementById("mySelect").value;
			
			
			//while($report = mysql_fetch_assoc($QueryResult)){
				
			//echo '<pre>' . print_r($report, true). '</pre>';
			
		//}
		}
	
	</script>
 <?php  
 $sql = "SELECT date_created, title FROM personalnotes WHERE `patient_id` = $session_user_id AND YEAR(date_created) = YEAR(NOW()) AND MONTH(date_created)=MONTH(NOW()) ";
 $result = mysql_query($sql);

 
 echo "<select  selected=selected name='jlist' size='25' style='width: 260px;' id='mySelect' onchange='hello()'>";
	while ($row = mysql_fetch_array($result)) {
		echo "<option value='" . $row['date_created']." " . $row['title'] . "'>" . $row['date_created'] ." &nbsp; &nbsp; &nbsp;" . $row['title'] . " </option>";
	}	
	
	echo "</select>";	
?>

</aside>
				
	