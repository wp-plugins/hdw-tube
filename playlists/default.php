<?php

/******************************************************************
/* Execute Actions
******************************************************************/
global $wpdb;
$table_name = $wpdb->prefix . "youtube_playlistname";
switch($_GET['opt']) {
    case 'add':
        require_once('_add.php');
        break;
    case 'edit':
        require_once('_edit.php');
        break;
	case 'delete':
		require_once('_delete.php');
		break;
	default:
		require_once('_grid.php');		
}
?>