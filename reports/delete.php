<?php

/******************************************************************
/* Deleting the Table Row
******************************************************************/
if($_GET['page'] == 'reports' && $_GET['opt'] == 'delete') {
	$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id=%d",intval($_GET['id'])));
	echo '<script>window.location="?page=reports";</script>';
}

?>