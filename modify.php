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
			
			if (isset($_POST['delete']))
			{
				$q = $_POST['delete'];
				$bloodglucoselevel=$session_user_id;
				$sql = "DELETE FROM bloodglucoselevel WHERE id='$bloodglucoselevel'";
			
				mysql_query($sql);
				
			}
			
			
			
			/*
			
			if (isset($_POST['update']))
			{
			
				$dvdID = mysqli_real_escape_string($DBConnection, $_POST['dvdID']);
				$cert = mysqli_real_escape_string($DBConnection, $_POST['cert']);
				$filmTitle = mysqli_real_escape_string($DBConnection, $_POST['filmTitle']);
				$releaseDate = mysqli_real_escape_string($DBConnection, $_POST['releaseDate']);
				$filmDuration = mysqli_real_escape_string($DBConnection, $_POST['filmDuration']);
				$director = mysqli_real_escape_string($DBConnection, $_POST['director']);
				$description = mysqli_real_escape_string($DBConnection, $_POST['description']);
			
				$sql = "UPDATE dvd SET
				dvdID='$dvdID',
				cert='$cert',
				filmTitle='$filmTitle',
				releaseDate='$releaseDate',
				filmDuration='$filmDuration',
				director='$director',
				description='$description'
				WHERE dvdID='$dvdID'";
				if (!mysqli_query($DBConnection, $sql))
				{
					$error = 'Error updating submitted DVD<br>'.mysqli_error($DBConnection);
					include 'error.html.php';
					exit();
				}
				header('Location: .');
				exit();
			}
			
			
			$result = mysqli_query($DBConnection, 'SELECT dvdID, cert, filmTitle, releaseDate, filmDuration, director, description FROM dvd');
			if (!$result)
			{
				$error = 'Error fetchning DVD: ' . mysqli_error($DBConnection);
				include 'error.html.php';
				exit();
			}
			
			while ($row = mysqli_fetch_array($result))
			{
				$dvd[] = array('dvdID' => $row['dvdID'], 'cert' => $row['cert'], 'filmTitle' => $row['filmTitle'], 'releaseDate' => $row['releaseDate'], 'filmDuration' => $row['filmDuration'],
						'director' => $row['director'],'description' => $row['description']);
			}
			
			*/
			
			?>
		</div> <!-- end #tablestyle-->
	</div> <!-- end #container-->
       
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>