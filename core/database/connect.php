<?php
$connect_error = 'Sorry, we\'re experiencing connection problems.';
mysql_connect('localhost', 'root', 'ogbene') or die ($connect_error);
mysql_select_db('dms') or die ($connect_error);
?>