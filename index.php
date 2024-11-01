<?php
/*
Plugin Name: Simple Job Manager
Plugin URI: http://oleksandrustymenko.net.ua/ousimplejobmanager
Description: This is a simple plugin where you can create vacancies. Also users can send their resumes.
Version: 1.1
Author: Oleksandr Ustymenko
Author URI: http://oleksandrustymenko.net.ua
*/

/*  
	Copyright 2016 oleksandr87 (email:ustymenkooleksandrnew@gmail.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!defined('ABSPATH')) exit;
global $jal_db_version;
$jal_db_version = "1.0";

function ousjm_db_activ() 
{
	global $wpdb;
	global $jal_db_version;
    $ousgmcreatebable = $wpdb->prefix . "onsjmdb";
	if($wpdb->get_var("show tables like '$ousgmcreatebable'") != $ousgmcreatebable)
	{     
        $sql = "CREATE TABLE " .$ousgmcreatebable. " (
		oncjm_id INTEGER NOT NULL AUTO_INCREMENT,
		oncjm_id_job_vacancy TEXT,
		oncjm_id_job0 TEXT,
		oncjm_id_job01 TEXT,
		oncjm_id_job1 TEXT,
		oncjm_id_job2 TEXT,
		oncjm_id_job3 TEXT,
		oncjm_id_job4 TEXT,
		oncjm_id_job5 TEXT,
		oncjm_id_job6 TEXT,
		oncjm_id_job7 TEXT,
		oncjm_id_job8 TEXT,
		oncjm_id_job9 TEXT,
		oncjm_id_job10 TEXT,
		oncjm_id_job11 TEXT,
		oncjm_id_job12 TEXT,
		oncjm_id_job13 TEXT,
		oncjm_id_job14 TEXT,
		oncjm_id_job15 TEXT,
		oncjm_id_job16 TEXT,
		oncjm_id_job17 TEXT,
		oncjm_id_job18 TEXT,
		oncjm_id_job19 TEXT,
		oncjm_id_job20 TEXT,
		oncjm_id_job21 TEXT,
		oncjm_id_job22 TEXT,
		oncjm_id_job23 TEXT,
		oncjm_id_job24 TEXT,
		oncjm_id_job25 TEXT,
		oncjm_id_job26 TEXT,
		oncjm_id_job27 TEXT,
		oncjm_id_job28 TEXT,
		oncjm_id_job29 TEXT,
		oncjm_id_job30 TEXT,
		oncjm_id_date1 TEXT,
		oncjm_id_date2 TEXT,
		UNIQUE KEY  (oncjm_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		add_option("jal_db_version", $jal_db_version);  
	}
	
	$ousgmcreatebable2 = $wpdb->prefix . "onsjmdbuser";
	if($wpdb->get_var("show tables like '$ousgmcreatebable2'") != $ousgmcreatebable2)
	{     
        $sql2 = "CREATE TABLE " .$ousgmcreatebable2. " (
		onsjmdbuser_id INTEGER NOT NULL AUTO_INCREMENT,
		onsjmdbuser_id_vacancy INTEGER,
		onsjmdbuser_first_name TEXT,
		onsjmdbuser_last_name TEXT,
		onsjmdbuser_email TEXT,
		onsjmdbuser_linkfile TEXT,
		UNIQUE KEY  (onsjmdbuser_id));"; 
	  
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql2);
		add_option("jal_db_version", $jal_db_version);  
	}
	
}
register_activation_hook(__FILE__,'ousjm_db_activ');

function ouncjmdeactivate()
{
	global $wpdb;
	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}onsjmdb");
	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}onsjmdbuser");
}
register_uninstall_hook(__FILE__, 'ouncjmdeactivate');
	
function ousjm_file()
{
	wp_enqueue_script( 'jquery');
	wp_localize_script( 'jquery', 'ousjbcode', 
	array(
   'ousjbcode_url'   => admin_url('admin-ajax.php'),
   'ousjbcode_nonce' => wp_create_nonce('sjbmvg')
	));

}
add_action('wp_enqueue_scripts', 'ousjm_file');

add_action('admin_menu', 'ousjm_setup_menu');
function ousjm_setup_menu()
{
        add_menu_page( 'Simple Job Manager', 'Simple Job Manager', 'manage_options', 'sjm-admin', 'ousjm_init' );
}

function ousjmcreatevacfunc()
 {
	require_once( plugin_dir_path(__FILE__).'ouousjmcreatevac.php');
	exit;
 }
 
add_action( 'wp_ajax_ousjmcreatevac', 'ousjmcreatevacfunc');

function ousjmsendresumefunc()
 {
	require_once( plugin_dir_path(__FILE__).'ousjmsendresume.php');
	exit;
 }
 
add_action( 'wp_ajax_ousjmsendresume', 'ousjmsendresumefunc');
add_action( 'wp_ajax_nopriv_ousjmsendresume', 'ousjmsendresumefunc');

function ousjmviewvacfunc()
 {
	require_once( plugin_dir_path(__FILE__).'ousjmviewvac.php');
	exit;
 }
 
add_action( 'wp_ajax_ousjmviewvac', 'ousjmviewvacfunc');

function ousjmcvdeletefunc()
 {
	require_once( plugin_dir_path(__FILE__).'ousjmcvdelete.php');
	exit;
 }
 
add_action( 'wp_ajax_ousjmcvdelete', 'ousjmcvdeletefunc');

function ousjmviewvacdeletefunc()
 {
	require_once( plugin_dir_path(__FILE__).'ousjmviewvacdelete.php');
	exit;
 }
 
add_action( 'wp_ajax_ousjmviewvacdelete', 'ousjmviewvacdeletefunc');


function ousjm_init()
{
	global $wpdb;
	$ousjmcountcr = $wpdb->prefix . "onsjmdb";
	$ousjmcountcrresult = $wpdb->get_var( "SELECT COUNT(*) FROM $ousjmcountcr" );
	$ousjmcountcrusers = $wpdb->prefix . "onsjmdbuser";
	?>
	<script>
	function ounl_createvacancy()
	{
		jQuery("#ousjm_form2").hide();
		jQuery("#ousjm_form").hide();
		jQuery("#ousjm_create_form").show();
	}
	</script>
	
	<script>
	function ou_sjm_cancel()
	{
		location.reload();
	}
	</script>
	
	<script>
	function search_sjm_cancel()
	{
		location.reload();
	}
	</script>
	
	<script>
	function ou_sjm_b_createv()
	{
		var ou_sjm_a0  = jQuery('#id_ou_sjm_job0').val().length;
		var ou_sjm_a01  = jQuery('#id_ou_sjm_job01').val().length;
		var ou_sjm_a1  = jQuery('#id_ou_sjm_job1').val().length;
		var ou_sjm_a2  = jQuery('#id_ou_sjm_job2').val().length;
		var ou_sjm_a3  = jQuery('#id_ou_sjm_job3').val().length;
		var ou_sjm_a4  = jQuery('#id_ou_sjm_job4').val().length;
		var ou_sjm_a5  = jQuery('#id_ou_sjm_job5').val().length;
		
		jQuery('#on_sjm1').css('color','#000000');
		jQuery('#on_sjm1').hide();
		
		jQuery('#on_sjm2').css('color','#000000');
		jQuery('#on_sjm2').hide();
		
		jQuery('#on_sjm3').css('color','#000000');
		jQuery('#on_sjm3').hide();
		
		jQuery('#on_sjm4').css('color','#000000');
		jQuery('#on_sjm4').hide();
		
		jQuery('#on_sjm5').css('color','#000000');
		jQuery('#on_sjm5').hide();
		
		jQuery('#on_sjm6').css('color','#000000');
		jQuery('#on_sjm6').hide();
		
		jQuery('#on_sjm7').css('color','#000000');
		jQuery('#on_sjm7').hide();
		
		if(  ou_sjm_a0 >=1 && ou_sjm_a01 >=1 && ou_sjm_a2 >=1 && ou_sjm_a3 >=1 && ou_sjm_a4 >=1 && ou_sjm_a5 >1)
		{
			var formData = new FormData(jQuery('#ou_sjm_createvac_form')[0]);
			formData.append('action', 'ousjmcreatevac');
			formData.append('nonce', '<?php echo wp_create_nonce('eokfregk');?>');
			jQuery.ajax({
			type: "post",
			url: "admin-ajax.php",
			data: formData,
			contentType:false,
			processData:false,
			beforeSend: function() 
			{
				jQuery("#ou_sjm_button_hide").hide();
				jQuery("#ou_sjmpleasewait").show();
			},
			success: function(html)
			{
				location.reload();
			}
			});
		}
		else
		{
			if(ou_sjm_a0 == 0)
			{
				jQuery('#on_sjm1').css('color','#990000');
				jQuery('#on_sjm1').show();
			}
			if(ou_sjm_a01 == 0)
			{
				jQuery('#on_sjm2').css('color','#990000');
				jQuery('#on_sjm2').show();
			}
			if(ou_sjm_a1 == 0)
			{
				jQuery('#on_sjm3').css('color','#990000');
				jQuery('#on_sjm3').show();
			}
			
			if(ou_sjm_a2 == 0)
			{
				jQuery('#on_sjm4').css('color','#990000');
				jQuery('#on_sjm4').show();
			}
			
			if(ou_sjm_a3 == 0)
			{
				jQuery('#on_sjm5').css('color','#990000');
				jQuery('#on_sjm5').show();
			}
			if(ou_sjm_a4 == 0)
			{
				jQuery('#on_sjm6').css('color','#990000');
				jQuery('#on_sjm6').show();
			}
			if(ou_sjm_a5 == 0)
			{
				jQuery('#on_sjm7').css('color','#990000');
				jQuery('#on_sjm7').show();
			}
		
		}
		
	}
	</script>
	
	<script>
	function onsjmbackfromview()
	{
		location.reload();
	}
	</script>
	
	<style>
	table 
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 680px;
		font-size:12px;
	}
	td
	{
		border: 1px solid #008fb3;
		text-align: left;
		padding: 8px;
	}
	th
	{
		border: 1px solid #008fb3;
		padding: 8px;
	}
	</style>
	<div style="margin:10px; width:700px; border: 1px solid #008fb3; background: #ffffff; min-height: 60px;">
		<div style="background:#008fb3; width:700px;">
			<div style="padding:10px; font-size:18px; color: #ffffff;">
				<b><?php echo esc_html("Vacancies");?></b>
			</div>
		</div>
		
		<div style="margin:10px; width:680px; min-height:40px;">
			<div style="font-size:14px; color:#000000; text-align:right;">
				<button class="button button-primary" onclick="ounl_createvacancy(); return false;"><?php echo esc_html("Create a vacancy");?></button>
			</div>
			
			<div id="ousjm_form_loader" style="display:none; color: #000000; padding:10px 0px 5px 0px;">
				<div  style="color: #000000; font-size:27px; text-align:center; padding: 80px 0px;">
						<?php
						$ou_sjm_imageloaderf = plugin_dir_url( __FILE__ );
						$ou_sjm_imageloaderf2 = $ou_sjm_imageloaderf.'images/loader.gif';
						?>
						<img src="<?php echo esc_url($ou_sjm_imageloaderf2);?>" border="none" style="height:65px; width:64px;">
					</div>
			</div>
			
			<div id="ousjm_form" style="color: #000000; padding:10px 0px 5px 0px;">
				<?php
				if($ousjmcountcrresult ==0)
				{
					?>
					<div  style="color: #000000; font-size:27px; text-align:center; padding: 80px 0px;">
						<b><?php echo esc_html("You have 0 vacancies");?></b>
					</div>
					<?php
				}
				if($ousjmcountcrresult >=1)
				{
					?>
					<div style="color: #000000; padding:10px 0px 5px 0px;">
						<span style="padding:0px 0px 5px 0px; text-align: justify;"><b><?php echo esc_html("Simply add the shortcode to page. Warning: You can add only one shortcode to page");?></b></span>
						<table>
							<tr>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:200px;"><?php echo esc_html("Vacancy");?></th>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:150px;"><?php echo esc_html("Shortcode");?></th>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:150px;"><?php echo esc_html("Date");?></th>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:80px;"><?php echo esc_html("View");?></th>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:80px;"><?php echo esc_html("Resume");?></th>
								<th style="text-align:center; background:#008fb3; color: #ffffff; width:20px;"><?php echo esc_html("X");?></th>
							</tr>
							<?php
							$ousjmv_a1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcr where oncjm_id_job0 !='' ORDER BY oncjm_id_date1 ");
							foreach ($ousjmv_a1 as $ousjmv_a2)
							{ 
								$sjmv1_oncjm_id = $ousjmv_a2->oncjm_id; 
								$sjmv1_oncjm_id_job0 = $ousjmv_a2->oncjm_id_job0; 
								$sjmv1_oncjm_id_job01 = $ousjmv_a2->oncjm_id_job01;
								$sjmv1_oncjm_id_job1 = $ousjmv_a2->oncjm_id_job1;
								$sjmv1_oncjm_id_job2 = $ousjmv_a2->oncjm_id_job2;
								$sjmv1_oncjm_id_job3 = $ousjmv_a2->oncjm_id_job3;
								$sjmv1_oncjm_id_job4 = $ousjmv_a2->oncjm_id_job4;
								$sjmv1_oncjm_id_job5 = $ousjmv_a2->oncjm_id_job5;
								$sjmv1_oncjm_id_job6 = $ousjmv_a2->oncjm_id_job6;
								$sjmv1_oncjm_id_job7 = $ousjmv_a2->oncjm_id_job7;
								$sjmv1_oncjm_id_job8 = $ousjmv_a2->oncjm_id_job8;
								$sjmv1_oncjm_id_job9 = $ousjmv_a2->oncjm_id_job9;
								$sjmv1_oncjm_id_date1 = $ousjmv_a2->oncjm_id_date1;
							
								$ousjm_genshortcode = '[sjm code="'.$sjmv1_oncjm_id.'" ]';
								$ousjmcount_resume = $wpdb->get_var( "SELECT COUNT(*) FROM $ousjmcountcrusers where onsjmdbuser_id_vacancy = $sjmv1_oncjm_id" );
								?>
								<script>
								function sjmviewresume<?php echo $sjmv1_oncjm_id;?>() 
								{
									var formData =  new FormData();
									formData.append('action', 'ousjmviewvac');
									formData.append('idvac', '<?php echo $sjmv1_oncjm_id;?>');
									formData.append('nonce', '<?php echo wp_create_nonce('v5ffd3');?>');
									jQuery.ajax({
									type: "post",
									url: "admin-ajax.php",
									data: formData,
									contentType:false,
									processData:false,
									beforeSend: function() 
									{
										jQuery("#ousjm_form").hide();
										jQuery("#ousjm_form_loader").show();
									},
									success: function(html)
									{
										jQuery("#ousjm_form").empty();
										jQuery("#ousjm_form").append(html);
										jQuery("#ousjm_form_loader").hide();
										jQuery("#ousjm_form").show();
									}
									});
								}
								</script>
								
								<script>
								function sjmviewresumedel<?php echo $sjmv1_oncjm_id;?>()
								{
									var formData =  new FormData();
									formData.append('action', 'ousjmviewvacdelete');
									formData.append('idvac', '<?php echo $sjmv1_oncjm_id;?>');
									formData.append('nonce', '<?php echo wp_create_nonce('x4v3c8');?>');
									jQuery.ajax({
									type: "post",
									url: "admin-ajax.php",
									data: formData,
									contentType:false,
									processData:false,
									beforeSend: function() 
									{
										jQuery("#ounsjmvdelete<?php echo $sjmv1_oncjm_id;?>").hide();
									},
									success: function(html)
									{
										jQuery("#ounsjmvdelete<?php echo $sjmv1_oncjm_id;?>").empty();
										
									}
									});
								}
								</script>
								
								<?php
								echo '<tr id="ounsjmvdelete'.$sjmv1_oncjm_id.'">';
									echo '<td style="width:200px;">'.esc_html($sjmv1_oncjm_id_job0).'</td>';
									echo '<td style="width:150px; text-align:center;">'.esc_html($ousjm_genshortcode).'</td>';
									echo '<td style="width:150px; text-align:center;">'.esc_html($sjmv1_oncjm_id_date1).'</td>';
									echo '<td style="width:80px; text-align:center;"><a href="" onclick="sjmviewresume'.$sjmv1_oncjm_id.'(); return false;">'.esc_html("View").'</a></td>';
									echo '<td style="width:80px; text-align:center;">'.esc_html($ousjmcount_resume).'</td>';
									echo '<td style="width:20px; text-align:center;"><a href="" onclick="sjmviewresumedel'.$sjmv1_oncjm_id.'(); return false;">'.esc_html("X").'</a></td>';
								echo '</tr>';
							}
							?>
						</table>
					</div>
					<?php
				}
				?>
			</div>
			
			<div id="ousjm_create_form" style="display:none; color: #000000; padding:10px 0px 5px 0px;">
				<form id="ou_sjm_createvac_form" enctype="multipart/form-data"  method="POST">
				
					<div style="font-size:18px; background:#008fb3; color: #ffffff;">
						<div style="padding:10px;">
							<b><?php echo esc_html("Vacancy");?></b>
						</div>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Title");?></b> (* )  <span id="on_sjm1" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 5px 0px; ">
						<input type="text" id="id_ou_sjm_job0" autocomplete="off" placeholder="<?php echo esc_html('Name of vacancy');?>" style="font-size:14px; width:100%;" name="ou_sjm_job0">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Job Purpose");?></b> (* )  <span id="on_sjm2" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 5px 0px; ">
						<textarea id="id_ou_sjm_job01" autocomplete="off" placeholder="<?php echo esc_html('Job Purpose');?>" style="font-size:14px; height:100px; resize:none; width:100%;" name="ou_sjm_job01"></textarea>
					</div>
				
					<div style="font-size:18px; background:#008fb3; color: #ffffff;">
						<div style="padding:10px;">
							<b><?php echo esc_html("Contact Info");?></b>
						</div>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Company");?></b> (* )  <span id="on_sjm3" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<input type="text" id="id_ou_sjm_job1" autocomplete="off" placeholder="<?php echo esc_html('Company');?>" style="font-size:14px; width:100%;" name="ou_sjm_job1">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Contact person");?></b> (* )  <span id="on_sjm4" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<input type="text" id="id_ou_sjm_job2" autocomplete="off" placeholder="<?php echo esc_html('Contact person');?>" style="font-size:14px; width:100%;" name="ou_sjm_job2">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Contact phone");?></b> (* ) <span id="on_sjm5" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<input type="text" id="id_ou_sjm_job3" autocomplete="off" placeholder="<?php echo esc_html('Contact person');?>" style="font-size:14px; width:100%;" name="ou_sjm_job3">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("City");?></b> (* ) <span id="on_sjm6" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<input type="text" id="id_ou_sjm_job4" autocomplete="off" placeholder="<?php echo esc_html('City');?>" style="font-size:14px; width:100%;" name="ou_sjm_job4">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Working time");?></b> (* ) <span id="on_sjm7" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
					</div>
					<div style="font-size:14px; padding:5px 0px 5px 0px; ">
						<select id="id_ou_sjm_job5" autocomplete="off"  style="font-size:14px; width:100%;" name="ou_sjm_job5">
							<option value=""><?php echo esc_html("Select working time");?></option>
							<option value="<?php echo esc_html("Full-time work");?>"><?php echo esc_html("Full-time work");?></option>
							<option value="<?php echo esc_html("Part-time work");?>"><?php echo esc_html("Part-time work");?></option>
							<option value="<?php echo esc_html("Project-based or freelance");?>"><?php echo esc_html("Project-based or freelance");?></option>
						</select>
					</div>
					
					<div style="font-size:18px; background:#008fb3; color: #ffffff;">
						<div style="padding:10px;">
							<b><?php echo esc_html("Requirements");?></b>
						</div>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Level of education");?></b>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<select id="id_ou_sjm_job6" autocomplete="off"  style="font-size:14px; width:100%;" name="ou_sjm_job6">
							<option value=""><?php echo esc_html("Select level");?></option>
							<option value="<?php echo esc_html("Basic education");?>"><?php echo esc_html("Basic education");?></option>
							<option value="<?php echo esc_html("Secondary education");?>"><?php echo esc_html("Secondary education");?></option>
							<option value="<?php echo esc_html("Vocational education");?>"><?php echo esc_html("Vocational education");?></option>
							<option value="<?php echo esc_html("Higher education (bachelor)");?>"><?php echo esc_html("Higher education (bachelor)");?></option>
							<option value="<?php echo esc_html("Higher education (master)");?>"><?php echo esc_html("Higher education (master)");?></option>
						</select>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Experience");?></b>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<input type="text" id="id_ou_sjm_job7" autocomplete="off" placeholder="<?php echo esc_html('Experience');?>" style="font-size:14px; width:100%;" name="ou_sjm_job7">
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Other requirements");?></b>
					</div>
					<div style="font-size:14px; padding:5px 0px 5px 0px; ">
						<textarea id="id_ou_sjm_job8" autocomplete="off" placeholder="<?php echo esc_html('Other requirements');?>" style="resize:none; height:100px; font-size:14px; width:100%;" name="ou_sjm_job8"></textarea>
					</div>
					
					<div style="font-size:18px; background:#008fb3; color: #ffffff;">
						<div style="padding:10px;">
							<b><?php echo esc_html("Responsibilities");?></b>
						</div>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<b><?php echo esc_html("Responsibilities");?></b>
					</div>
					<div style="font-size:14px; padding:5px 0px 0px 0px; ">
						<textarea id="id_ou_sjm_job9" autocomplete="off" placeholder="<?php echo esc_html('Responsibilities');?>" style="resize:none; height:100px; font-size:14px; width:100%;" name="ou_sjm_job9"></textarea>
					</div>
					
					<div style="font-size:14px; padding:5px 0px 5px 0px; ">
						<span id="ou_sjm_button_hide"><button  onclick="ou_sjm_b_createv(); return false;" class="button button-primary"><?php echo esc_html("Create a vacancy");?></button></span>
						<span id="ou_sjmpleasewait" style="display:none;"><b><?php echo esc_html("Please wait...");?></b></span>
						<button onclick="ou_sjm_cancel(); return false;" class="button button-primary"><?php echo esc_html("Cancel");?></button>
					</div>
					
				</form>
			</div>
			
		</div>
		
	</div>
	<?php
}

function sjmsc_function($ousjmattrcode)
{
	require_once( plugin_dir_path(__FILE__).'sjm_shortcode.php');
}

add_shortcode('sjm', 'sjmsc_function');
?>
