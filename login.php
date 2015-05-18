<?php
include 'core/init.php';
redirectUser();

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	}else if (user_exists($username) === false){
		$errors[] = 'We can\'t find that username. Have you registered?';
	}else if (user_active($username) === false){
		$errors[] = 'You haven\'t activated your account!';
	}else{
		
		if(strlen($password) > 32){
			$errors[] = 'Password is too long';
		}
		
		$login = login($username, $password);
		
		if ($login === false) {
				$errors[] = 'That username/password combination is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			$data = loginRole($_SESSION['user_id']);
			/*$_SESSION['role']=$data['type'];*/ //another way to do this function.
			if($data['type'] == 0){
			     header('Location: patient.php');
			}else if ($data['type'] == 1) {
				header('Location: doctor.php');
			}
			exit();
		}
   }
}else {
	$errors[] = 'No data received';
}
?>

<!DOCTYPE HTML>
<html>
	
	<?php include 'includes/head.php'; ?>
<body>
    		<?php include 'includes/header.php'; ?>
    <div id="container">
        <?php include 'includes/aside.php'; ?>

       
<?php if(empty($errors) === false){ ?>
	<h2> We tried to log you in, but...</h2>
<?php echo output_errors($errors); } ?>
	
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
</div><!-- end #container-->


<?php include 'includes/footer.php'; ?>

</body>
</html>