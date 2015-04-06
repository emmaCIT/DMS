<div class="widget">
	<h2>Patients</h2>
	<div class="inner">
	<?php
	$patient_count = totalpatient_count();
	$suffix = ($patient_count != 1) ? 's' : '';
	?>
	You currently have <?php echo $patient_count; ?> registered patient<?php echo  $suffix; ?>.
	</div>
</div>
