<?php
include 'core/init.php';
protect_page ();

if (empty($_POST) === false) {
	$required_fields = array('bfb', 'afb', 'bfl', 'afl', 'bfd', 'afd', 'bfbed', 'night');
	foreach($_POST as $key=>$value) {
		if(empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

}

?>

<!DOCTYPE HTML>
<html>
	<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/headerPat.php'; ?>
    <div id="container">

		<h1>Statistics</h1>
		
		<section id="wrapper">
		<ul id="chart">
			<li title="3.0" class="red">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="5.0" class="blue">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="6.0" class="yellow">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="5.0" class="orange">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="9.5" class="purple">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="9.5" class="pink">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="75.0" class="green">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
			<li title="25.5" class="indigo">
				<span class="bar"></span>
				<span class="percent" hidden="hide"></span>
			</li>
		</ul>
		
		<form id="form_values" action="" method="post">
		
			<input name="bfb" id="li_1" value="3.0" class="fied" />
			<input name="afb" id="li_2" value="5.0" class="fied" />
			<input name="bfl" id="li_3" value="6.0" class="fied" />
			<input name="afl" id="li_4" value="5.0" class="fied" />
			<input name="bfd" id="li_5" value="9.5" class="fied" />
			<input name="afd" id="li_6" value="9.5" class="fied" />
			<input name="bfbed" id="li_7" value="75.0" class="fied" />
			<input name="night" id="li_8" value="25.5" class="fied" />
		</form> <!-- end #form-->
		
		</section> <!-- end #section-->

		<p>Blood Glucose Level Reading (mmol/l)</p>
	
	</div> <!-- end #container-->
		
<?php include 'includes/footer.php'; ?>

</body>
</html>