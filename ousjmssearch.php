<?php
if(!defined('ABSPATH')) exit;
$ousjmcode = $_POST['nonce'];
if (!wp_verify_nonce($ousjmcode, 'x5g8k2b54'))
{
    wp_die();
}

if ( current_user_can('manage_options') )
{
	$search_sjm_job0 =  sanitize_text_field($_POST['search_sjm_job0']); // name of vac
	$search_sjm_job1 =  sanitize_text_field($_POST['search_sjm_job1']); // cv: first name
	$search_sjm_job2 =  sanitize_text_field($_POST['search_sjm_job2']); // cv: last name
	$search_sjm_job3 =  sanitize_email($_POST['search_sjm_job3']); // email
	global $wpdb;
	$ousjmcountcrusersv5 = $wpdb->prefix . "onsjmdbuser";
	$ousjmcountcrxzb5 = $wpdb->prefix . "onsjmdb";
	
	if( !empty($search_sjm_job0) )
	{
		$search_sjm_job00 = '%'.$search_sjm_job0.'%';
		$search_sjm_job0a =  ' AND oncjm_id_job0 LIKE  "'.$search_sjm_job00.'"';
		
		if( !empty($search_sjm_job1) )
		{
			$search_sjm_job1a =  ' AND onsjmdbuser_first_name = "'.$search_sjm_job1.'"';
		}
		
		if( !empty($search_sjm_job2) )
		{
			$search_sjm_job2a =  ' AND onsjmdbuser_last_name = "'.$search_sjm_job2.'"';
		}
		
		if( !empty($search_sjm_job3) )
		{
			if ( is_email( $search_sjm_job3 ) )
			{
				$search_sjm_job3a =  ' AND onsjmdbuser_last_name = "'.$search_sjm_job3.'"';
			}
		}
		?>
		<b><?php echo esc_html("Vacancies");?></b>
		<table>
			<tr>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:200px;"><?php echo esc_html("Vacancy");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:150px;"><?php echo esc_html("Shortcode");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:150px;"><?php echo esc_html("Date");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:80px;"><?php echo esc_html("View");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:80px;"><?php echo esc_html("Resume");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff; width:20px;"><?php echo esc_html("X");?></th>
			</tr>
			<?php
			$ousjmv_ab1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrxzb5 where oncjm_id !='' $search_sjm_job0a  ");
			foreach ($ousjmv_ab1 as $ousjmv_ab2)
			{ 
				$sjmvb1_oncjm_id = $ousjmv_ab2->oncjm_id; 
				$sjmvb1_oncjm_id_job0 = $ousjmv_ab2->oncjm_id_job0;
				$sjmvb1_oncjm_id_date1 = $ousjmv_ab2->oncjm_id_date1;
				$ousjm_genshortcodeb1 = '[sjm code="'.$sjmvb1_oncjm_id.'" ]';
				$ousjmcount_resumeb1 = $wpdb->get_var( "SELECT COUNT(*) FROM $ousjmcountcrusersv5 where onsjmdbuser_id_vacancy = $sjmvb1_oncjm_id" );
				?>
				<script>
				function sjmviewresumedelb<?php echo $sjmvb1_oncjm_id;?>()
				{
					var formData =  new FormData();
					formData.append('action', 'ousjmviewvacdelete');
					formData.append('idvac', '<?php echo $sjmvb1_oncjm_id;?>');
					formData.append('nonce', '<?php echo wp_create_nonce('x4v3c8');?>');
					jQuery.ajax({
					type: "post",
					url: "admin-ajax.php",
					data: formData,
					contentType:false,
					processData:false,
					beforeSend: function() 
					{
						jQuery("#ounsjmvdeleteb<?php echo $sjmvb1_oncjm_id;?>").hide();
					},
					success: function(html)
					{
						jQuery("#ounsjmvdeleteb<?php echo $sjmvb1_oncjm_id;?>").empty();				
					}
					});
				}
				</script>
				
				<script>
				function sjmviewresumeb<?php echo $sjmvb1_oncjm_id;?>() 
				{
					var formData =  new FormData();
					formData.append('action', 'ousjmviewvac');
					formData.append('idvac', '<?php echo $sjmvb1_oncjm_id;?>');
					formData.append('nonce', '<?php echo wp_create_nonce('v5ffd3');?>');
					jQuery.ajax({
					type: "post",
					url: "admin-ajax.php",
					data: formData,
					contentType:false,
					processData:false,
					beforeSend: function() 
					{
						jQuery("#ousjm_form2").hide();
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
				
				<?php
				echo '<tr id="ounsjmvdeleteb'.$sjmvb1_oncjm_id.'">';
					echo '<td style="width:200px;">'.esc_html($sjmvb1_oncjm_id_job0).'</td>';
					echo '<td style="width:150px; text-align:center;">'.esc_html($ousjm_genshortcodeb1).'</td>';
					echo '<td style="width:150px; text-align:center;">'.esc_html($sjmvb1_oncjm_id_date1).'</td>';
					echo '<td style="width:80px; text-align:center;"><a href="" onclick="sjmviewresumeb'.$sjmvb1_oncjm_id.'(); return false;">'.esc_html("View").'</a></td>';
					echo '<td style="width:80px; text-align:center;">'.esc_html($ousjmcount_resumeb1).'</td>';
					echo '<td style="width:20px; text-align:center;"><a href="" onclick="sjmviewresumedelb'.$sjmvb1_oncjm_id.'(); return false;">'.esc_html("X").'</a></td>';
				echo '</tr>';
			}
		echo '</table>';
		
		if( !empty($search_sjm_job1) ||  !empty($search_sjm_job2)  ||  !empty($search_sjm_job3))
		{
			echo '<br />';
			?>
			<b><?php echo esc_html("CV");?></b>
			<table>
				<tr>
					<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("First name");?></th>
					<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("Last name");?></th>
					<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("Email");?></th>
					<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("CV");?></th>
					<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("X");?></th>
				</tr>
				<?php
				$ousjmcountcrusersvb2 = $wpdb->prefix . "onsjmdbuser";
				$ousjmv_auserb1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrusersvb2 where  onsjmdbuser_id_vacancy !='' $search_sjm_job1a  $search_sjm_job2a  $search_sjm_job3a  ");
				foreach ($ousjmv_auserb1 as $ousjmv_auserb2)
				{ 
					$sjmvb1_onsjmdbuser_id = $ousjmv_auserb2->onsjmdbuser_id; 
					$sjmvb1_onsjmdbuser_id_vacancy = $ousjmv_auserb2->onsjmdbuser_id_vacancy; 
					$sjmvb1_onsjmdbuser_first_name = $ousjmv_auserb2->onsjmdbuser_first_name; 
					$sjmvb1_onsjmdbuser_last_name = $ousjmv_auserb2->onsjmdbuser_last_name; 
					$sjmvb1_onsjmdbuser_email = $ousjmv_auserb2->onsjmdbuser_email; 
					$sjmvb1_onsjmdbuser_linkfile = $ousjmv_auserb2->onsjmdbuser_linkfile; 	
					?>
					<script>
					function sjmresumedelb<?php echo $sjmvb1_onsjmdbuser_id;?>()
					{
						var formData =  new FormData();
						formData.append('action', 'ousjmcvdelete');
						formData.append('idcv', '<?php echo $sjmvb1_onsjmdbuser_id;?>');
						formData.append('nonce', '<?php echo wp_create_nonce('g3d24f');?>');
						jQuery.ajax({
						type: "post",
						url: "admin-ajax.php",
						data: formData,
						contentType:false,
						processData:false,
						beforeSend: function() 
						{
							jQuery("#ounsjmcvdelb<?php echo $sjmvb1_onsjmdbuser_id;?>").hide();	
						},
						success: function(html)
						{
							jQuery("#ounsjmcvdelb<?php echo $sjmvb1_onsjmdbuser_id;?>").empty();
						}
						});
					}
					</script>
					<?php
					echo '<tr id="ounsjmcvdelb'.$sjmvb1_onsjmdbuser_id.'">';
						echo '<td style="width:210px; ">'.esc_html($sjmvb1_onsjmdbuser_first_name).'</td>';
						echo '<td style="width:210px;">'.esc_html($sjmvb1_onsjmdbuser_last_name).'</td>';
						echo '<td style="width:210px;">'.esc_html($sjmvb1_onsjmdbuser_email).'</td>';
						echo '<td style="width:30px; text-align:center;"><a href="'.esc_url($sjmvb1_onsjmdbuser_linkfile).'">'.esc_html("CV").'</a></td>';
						echo '<td style="width:20px; text-align:center;"><a href="" onclick="sjmresumedelb'.$sjmvb1_onsjmdbuser_id.'(); return false;">'.esc_html("X").'</a></td>';		
					echo '</tr>';	
				}
			echo '</table>';
		}
	}
	else
	if( empty($search_sjm_job0) AND (  !empty($search_sjm_job1) ||  !empty($search_sjm_job2)  ||  !empty($search_sjm_job3) ) )
	{
		
		if( !empty($search_sjm_job1) )
		{
			$search_sjm_job1a =  ' AND onsjmdbuser_first_name = "'.$search_sjm_job1.'"';
		}
		
		if( !empty($search_sjm_job2) )
		{
			$search_sjm_job2a =  ' AND onsjmdbuser_last_name = "'.$search_sjm_job2.'"';
		}
		
		if( !empty($search_sjm_job3) )
		{
			if ( is_email( $search_sjm_job3 ) )
			{
				$search_sjm_job3a =  ' AND onsjmdbuser_email = "'.$search_sjm_job3.'"';
			}
		}
		
		?>
		<b><?php echo esc_html("CV");?></b>
		<table>
			<tr>
				<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("First name");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("Last name");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("Email");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("CV");?></th>
				<th style="text-align:center; background:#0059b3; color: #ffffff;"><?php echo esc_html("X");?></th>
			</tr>
			<?php
			$ousjmcountcrusersvb2 = $wpdb->prefix . "onsjmdbuser";
			$ousjmv_auserb1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcrusersvb2 where  onsjmdbuser_id_vacancy !='' $search_sjm_job1a  $search_sjm_job2a  $search_sjm_job3a  ");
			foreach ($ousjmv_auserb1 as $ousjmv_auserb2)
			{ 
				$sjmvb1_onsjmdbuser_id = $ousjmv_auserb2->onsjmdbuser_id; 
				$sjmvb1_onsjmdbuser_id_vacancy = $ousjmv_auserb2->onsjmdbuser_id_vacancy; 
				$sjmvb1_onsjmdbuser_first_name = $ousjmv_auserb2->onsjmdbuser_first_name; 
				$sjmvb1_onsjmdbuser_last_name = $ousjmv_auserb2->onsjmdbuser_last_name; 
				$sjmvb1_onsjmdbuser_email = $ousjmv_auserb2->onsjmdbuser_email; 
				$sjmvb1_onsjmdbuser_linkfile = $ousjmv_auserb2->onsjmdbuser_linkfile; 	
				?>
				<script>
				function sjmresumedelb<?php echo $sjmvb1_onsjmdbuser_id;?>()
				{
					var formData =  new FormData();
					formData.append('action', 'ousjmcvdelete');
					formData.append('idcv', '<?php echo $sjmvb1_onsjmdbuser_id;?>');
					formData.append('nonce', '<?php echo wp_create_nonce('g3d24f');?>');
					jQuery.ajax({
					type: "post",
					url: "admin-ajax.php",
					data: formData,
					contentType:false,
					processData:false,
					beforeSend: function() 
					{
						jQuery("#ounsjmcvdelb<?php echo $sjmvb1_onsjmdbuser_id;?>").hide();	
					},
					success: function(html)
					{
						jQuery("#ounsjmcvdelb<?php echo $sjmvb1_onsjmdbuser_id;?>").empty();
					}
					});
				}
				</script>
				<?php
				echo '<tr id="ounsjmcvdelb'.$sjmvb1_onsjmdbuser_id.'">';
					echo '<td style="width:210px; ">'.esc_html($sjmvb1_onsjmdbuser_first_name).'</td>';
					echo '<td style="width:210px;">'.esc_html($sjmvb1_onsjmdbuser_last_name).'</td>';
					echo '<td style="width:210px;">'.esc_html($sjmvb1_onsjmdbuser_email).'</td>';
					echo '<td style="width:30px; text-align:center;"><a href="'.esc_url($sjmvb1_onsjmdbuser_linkfile).'">'.esc_html("CV").'</a></td>';
					echo '<td style="width:20px; text-align:center;"><a href="" onclick="sjmresumedelb'.$sjmvb1_onsjmdbuser_id.'(); return false;">'.esc_html("X").'</a></td>';		
				echo '</tr>';	
			}
		echo '</table>';
	}
	else
	{
		echo '<span style="color: #000000; font-size:14px;">';
			echo '<b>'.esc_html("Nothing found").'</b>';
		echo '</span>';
	}
}
?>