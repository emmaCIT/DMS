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

		<!-- Now ADD Table -->
		<div class="tablestyle">
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th colspan="8">Blood glucose level (mmol/l)</th>
						<th colspan="4">Insulin dose</th>
						<th>Special events/comments</th>
					</tr>
				</thead>

				<tr class="row1">
					<td></td>
					<td>before breakfast</td>
					<td>2 hours after breakfast</td>
					<td>before lunch</td>
					<td>2 hours after lunch</td>
					<td>before dinner</td>
					<td>2 hours after dinner</td>
					<td>before bed</td>
					<td>during the night</td>
					<td>breakfast</td>
					<td>lunch</td>
					<td>dinner</td>
					<td>bedtime</td>
					<td></td>
				</tr>

				<tr class="row2">
					<td>1</td>
					<td>2222222</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td>6</td>
					<td>7</td>
					<td>8</td>
					<td>9</td>
					<td>10</td>
					<td>11</td>
					<td>12</td>
					<td>13</td>
					<td>114</td>
				</tr>
			

			</table> <!-- end #table-->
		</div> <!-- end #tablestyle-->
		<div class="recordbutton">
				<button type="button" value="Save Note">Save</button>&nbsp;&nbsp;&nbsp;&nbsp; 
				<input type="submit" value="Edit">
			</div> <!-- end #button-->
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>