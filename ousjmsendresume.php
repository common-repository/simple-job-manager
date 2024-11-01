<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'h5g3f4t'))
{
    wp_die();
}

$sjm_id_vac = intval($_POST['onsjm_idvac']);
if(!$sjm_id_vac)
 {
        wp_die();
 }
$ou_sjm_firstname =  sanitize_text_field($_POST['onsjm_firstname']);
$ou_sjm_lastname =  sanitize_text_field($_POST['onsjm_lastname']);
$ou_sjm_email =  sanitize_email($_POST['onsjm_email']);

$ou_sjm_file = strtolower(pathinfo($_FILES['onsjm_cv']['name'], PATHINFO_EXTENSION));
$ou_sjm_supportfile = array('odt','doc','docx','rtf','png','pdf','uot');
if(in_array($ou_sjm_file, $ou_sjm_supportfile))
{
	global $wpdb;
	$ou_sjm_namefile = &$_FILES['onsjm_cv'];
	$ou_sjm_overrides = array( 'test_form' => false, 'unique_filename_callback' => 'ou_sjmchangenamefile');
	
	function ou_sjmchangenamefile()
	{
		$ou_sjmchange1 = strtolower(pathinfo($_FILES['onsjm_cv']['name'], PATHINFO_EXTENSION));
	
		$ou_sjmchange2 = uniqid().'.'.$ou_sjmchange1;
		return $ou_sjmchange2;
	}
	
	$ou_sjmchange3 = wp_handle_upload( $ou_sjm_namefile, $ou_sjm_overrides);
	$ou_sjmchange4 = $ou_sjmchange3['url'];
	
	$ousjm_cd2 = $wpdb->prefix . "onsjmdbuser";
	$wpdb->insert( $ousjm_cd2, array( 'onsjmdbuser_id_vacancy' => $sjm_id_vac, 'onsjmdbuser_first_name' => $ou_sjm_firstname, 'onsjmdbuser_last_name' => $ou_sjm_lastname, 'onsjmdbuser_email' => $ou_sjm_email, 'onsjmdbuser_linkfile' => $ou_sjmchange4 ) );
	
	echo 'Your resume has been successfully sent';	
}
else
{
	echo 'Error: Invalid file format';
}
?>