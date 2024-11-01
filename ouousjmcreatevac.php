<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'eokfregk'))
{
    wp_die();
}

if ( current_user_can('manage_options') )
{
	$ou_sjm_job0 =  sanitize_text_field($_POST['ou_sjm_job0']);
	$ou_sjm_job01 =  sanitize_textarea_field($_POST['ou_sjm_job01']);
	$ou_sjm_job1 =  sanitize_text_field($_POST['ou_sjm_job1']);
	$ou_sjm_job2 =  sanitize_text_field($_POST['ou_sjm_job2']);
	$ou_sjm_job3 =  sanitize_text_field($_POST['ou_sjm_job3']);
	$ou_sjm_job4 =  sanitize_text_field($_POST['ou_sjm_job4']);
	$ou_sjm_job5 =  sanitize_text_field($_POST['ou_sjm_job5']);
	
	if( !empty($ou_sjm_job0) && !empty($ou_sjm_job01) && !empty($ou_sjm_job1) && !empty($ou_sjm_job2) && !empty($ou_sjm_job3) && !empty($ou_sjm_job4) && !empty($ou_sjm_job5))
	{
		global $wpdb;
		
		$ou_sjm_job6 =  sanitize_text_field($_POST['ou_sjm_job6']);
		$ou_sjm_job7 =  sanitize_text_field($_POST['ou_sjm_job7']);
		$ou_sjm_job8 =  sanitize_textarea_field($_POST['ou_sjm_job8']);
		$ou_sjm_job9 =  sanitize_textarea_field($_POST['ou_sjm_job9']);
		
		$ousjm_cd1 = $wpdb->prefix . "onsjmdb";
		$ousjmcurrenttime = current_time('d m Y H:i');
		$wpdb->insert( $ousjm_cd1, array( 'oncjm_id_job0' => $ou_sjm_job0,  'oncjm_id_job01' => $ou_sjm_job01, 'oncjm_id_job1' => $ou_sjm_job1,   'oncjm_id_job2' => $ou_sjm_job1,   'oncjm_id_job2' => $ou_sjm_job2,   'oncjm_id_job3' => $ou_sjm_job3,  'oncjm_id_job4' => $ou_sjm_job4,  'oncjm_id_job5' => $ou_sjm_job5,   'oncjm_id_job6' => $ou_sjm_job6,   'oncjm_id_job7' => $ou_sjm_job7,   'oncjm_id_job8' => $ou_sjm_job8,  'oncjm_id_job9' => $ou_sjm_job9,  'oncjm_id_date1' => $ousjmcurrenttime ) );
		
	}
}
?>