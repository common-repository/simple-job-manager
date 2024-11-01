<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'g3d24f'))
{
    wp_die();
}

if ( current_user_can('manage_options') )
{
	$idcv = intval($_POST['idcv']);
	if(!$idcv)
	{
        wp_die();
	}
	
	global $wpdb;
	$ousjmcountcrusersv3 = $wpdb->prefix . "onsjmdbuser";
	$ousjmv_auser3 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrusersv3 where  onsjmdbuser_id = $idcv ");
	foreach ($ousjmv_auser3 as $ousjmv_auser4)
	{ 
		$sjmv2_onsjmdbuser_id = $ousjmv_auser4->onsjmdbuser_id; 
		echo $sjmv2_onsjmdbuser_linkfile = $ousjmv_auser4->onsjmdbuser_linkfile; 

		$wpdb->delete($ousjmcountcrusersv3, array( 'onsjmdbuser_id' => $idcv ) );
		
		$sjm_delfile1 = wp_upload_dir();
		$sjm_delfile2 = str_replace($sjm_delfile1['baseurl'], "", $sjmv2_onsjmdbuser_linkfile);
		
		$sjm_delfile3 =  '../../uploads'.$sjm_delfile2;
		
		if (file_exists($sjm_delfile3))
		{
			unlink($sjm_delfile3);
		} 	
	}
}
?>