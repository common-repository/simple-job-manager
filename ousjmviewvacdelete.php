<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'x4v3c8'))
{
    wp_die();
}

if ( current_user_can('manage_options') )
{
	$sjm_id = intval($_POST['idvac']);
	if(!$sjm_id)
	{
        wp_die();
	}
	global $wpdb;
	$ousjmcountcrusersv4 = $wpdb->prefix . "onsjmdbuser";
	$ousjmcountcrxzb2 = $wpdb->prefix . "onsjmdb";
	$wpdb->delete($ousjmcountcrusersv4, array( 'onsjmdbuser_id_vacancy' => $sjm_id ) );
	$wpdb->delete($ousjmcountcrxzb2, array( 'oncjm_id' => $sjm_id ) );
}
?>