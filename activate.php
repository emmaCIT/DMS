<?php
include 'core/init.php';
?>

<!DOCTYPE HTML>
<html>
	
	<?php include 'includes/head.php'; ?>
	<body>
    		<?php include 'includes/header.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php';?>
               
    <?php
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	?>
		<h2>Thank you, we've activated your account...</h2>
		<p>You're free to log in!</p>
	<?php
	} else if (isset($_GET['email'], $_GET['email_code']) === true) {
			$email 		= trim($_GET['email']);
			$email_code = trim($_GET['email_code']);
	
		if (email_exists($email) === false) {
				$errors[] = 'Oops, something went wrong, and we couldn\'t find that email address!';
		}else if (activate($email, $email_code) === false) {
				$errors[] = 'We had problems activating your account';
		}
	
		if (empty($errors) === false) {
		?>
			<h2>Oops...</h2>
		<?php 
			echo output_errors($errors);
		} else {
			header('Location: activate.php?success');
			exit();
		}
	
	} else {
			header('Location: login.php');
			exit();
	}

	?>
	
		<div class="decorate">
<script type="text/javascript">
window.onload=function()
{
var ListImages =
    [                              
    'image/image1.jpg',              
    'image/image2.jpg',           
    'image/image3.jpg',           
    'image/image4.jpg',
    'image/image5.jpg',
    'image/image6.jpg',
    'image/image7.jpg',
    'image/image8.jpg'     
    ],
    startimage = 0;
    Duration = 6900;

function slideShow() {
    document.getElementById('myslider').className += "fadeOut";
    setTimeout(function()
    {
        document.getElementById('myslider').src = ListImages[startimage];
        document.getElementById('myslider').className = "";
    },1000);
    startimage=startimage + 1;
    if (startimage == ListImages.length)
    {
    startimage = 0;
    }
    setTimeout(slideShow,Duration);
    }
   slideShow();
   }
</script>

 <img id="myslider" src="image/image1.jpg" alt="sliding">
 
	</div> <!-- end #decorate-->
	</div> <!-- end #container-->
	<?php include 'includes/footer.php' ;?>
	</body>
	
</html>

