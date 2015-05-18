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
			<h1>Welcome</h1>
			<p>to the Diabetes Management System.</p>
	
	
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
	
	<?php include 'includes/footer.php';?>

	
</body>
</html>
