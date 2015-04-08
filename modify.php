<?php
include 'core/init.php';
	
	if (isset($_POST['delete']))
	{
		$glucoseID =$_POST['id'];
		$sql = "DELETE FROM bloodglucoselevel WHERE id='$glucoseID'";

		if (!mysqli_query($DBConnection, $sql))
		{
			$error = 'Error deleting the dvd: ' . mysqli_error($DBConnection);
			include 'error.html.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	
	
	
	
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
	
	include'index.php';

?>