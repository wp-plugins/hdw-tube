<?php

/******************************************************************
/* Execute Actions
******************************************************************/

global $wpdb;

$table_name = $wpdb->prefix .'youtube_subscriptions';
switch($_GET['opt']) {
	case 'delete':
		require_once('delete.php');
		break;
	default:
		require_once('grid.php');		
}
?>