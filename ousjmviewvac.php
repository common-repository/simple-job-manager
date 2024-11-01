<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'v5ffd3'))
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
	$ousjmcountcrxz2 = $wpdb->prefix . "onsjmdb";
	$ousjmv_a3 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrxz2 where  oncjm_id = $sjm_id ");
	foreach ($ousjmv_a3 as $ousjmv_a4)
	{ 
			$sjmv3_oncjm_id = $ousjmv_a4->oncjm_id; 
			$sjmv3_oncjm_id_job0 = $ousjmv_a4->oncjm_id_job0; 
			$sjmv3_oncjm_id_date1 = $ousjmv_a4->oncjm_id_date1;
        
            $ousjmcountcrusersv2 = $wpdb->prefix . "onsjmdbuser";
            $ousjmcount_count = $wpdb->get_var( "SELECT COUNT(*) FROM $ousjmcountcrusersv2 where  onsjmdbuser_id_vacancy = $sjmv3_oncjm_id" );
        
			?>
			<div style="color: #000000; padding:10px 0px 5px 0px;">
			
				<div style="padding:0px 0px 5px 0px; font-size:20px; text-align:left;">
                    <b>Vacancy: </b><?php echo esc_html($sjmv3_oncjm_id_job0);?>
				</div>
				<div style="text-align:right; padding: 0px 0px 5px 0px; font-size:16px; color: #000000;">
					<button onclick="onsjmbackfromview(); return false;" class="button button-primary" ><?php echo esc_html("Back");?></button>
				</div>
                <?php
                if($ousjmcount_count >=1)
                {
                ?>
				<table>
					<tr>
						<th style="text-align:center; background:#008fb3; color: #ffffff;"><?php echo esc_html("First name");?></th>
						<th style="text-align:center; background:#008fb3; color: #ffffff;"><?php echo esc_html("Last name");?></th>
						<th style="text-align:center; background:#008fb3; color: #ffffff;"><?php echo esc_html("Email");?></th>
						<th style="text-align:center; background:#008fb3; color: #ffffff;"><?php echo esc_html("CV");?></th>
						<th style="text-align:center; background:#008fb3; color: #ffffff;"><?php echo esc_html("X");?></th>
					</tr>
					<?php
					$ousjmv_auser1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrusersv2 where  onsjmdbuser_id_vacancy = $sjmv3_oncjm_id ");
					foreach ($ousjmv_auser1 as $ousjmv_auser2)
					{ 
						$sjmv1_onsjmdbuser_id = $ousjmv_auser2->onsjmdbuser_id; 
						$sjmv1_onsjmdbuser_id_vacancy = $ousjmv_auser2->onsjmdbuser_id_vacancy; 
						$sjmv1_onsjmdbuser_first_name = $ousjmv_auser2->onsjmdbuser_first_name; 
						$sjmv1_onsjmdbuser_last_name = $ousjmv_auser2->onsjmdbuser_last_name; 
						$sjmv1_onsjmdbuser_email = $ousjmv_auser2->onsjmdbuser_email; 
						$sjmv1_onsjmdbuser_linkfile = $ousjmv_auser2->onsjmdbuser_linkfile; 
						?>
						<script>
						function sjmresumedel<?php echo $sjmv1_onsjmdbuser_id;?>()
						{
							var formData =  new FormData();
							formData.append('action', 'ousjmcvdelete');
							formData.append('idcv', '<?php echo $sjmv1_onsjmdbuser_id;?>');
							formData.append('nonce', '<?php echo wp_create_nonce('g3d24f');?>');
							jQuery.ajax({
							type: "post",
							url: "admin-ajax.php",
							data: formData,
							contentType:false,
							processData:false,
							beforeSend: function() 
							{
								jQuery("#ounsjmcvdel<?php echo $sjmv1_onsjmdbuser_id;?>").hide();
								
							},
							success: function(html)
							{
								jQuery("#ounsjmcvdel<?php echo $sjmv1_onsjmdbuser_id;?>").empty();
							}
							});
						}
						</script>
						<?php
						echo '<tr id="ounsjmcvdel'.$sjmv1_onsjmdbuser_id.'">';
							echo '<td style="width:210px; ">'.esc_html($sjmv1_onsjmdbuser_first_name).'</td>';
							echo '<td style="width:210px;">'.esc_html($sjmv1_onsjmdbuser_last_name).'</td>';
							echo '<td style="width:210px;">'.esc_html($sjmv1_onsjmdbuser_email).'</td>';
							echo '<td style="width:30px; text-align:center;"><a href="'.esc_url($sjmv1_onsjmdbuser_linkfile).'">'.esc_html("CV").'</a></td>';
							echo '<td style="width:20px; text-align:center;"><a href="" onclick="sjmresumedel'.$sjmv1_onsjmdbuser_id.'(); return false;">'.esc_html("X").'</a></td>';		
						echo '</tr>';	
					}
					?>
				</table>
                <?php
                }
                else
                {
                    ?>
					<div  style="color: #000000; font-size:27px; text-align:center; padding: 80px 0px;">
						<b><?php echo esc_html("You have 0 resumes");?></b>
					</div>
					<?php
                }
                ?>
			</div>
			<?php
	}
	
}

?>