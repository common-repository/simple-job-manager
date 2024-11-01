<?php
$ousjmattrcode = shortcode_atts( array(
	'code' => '',
	), $ousjmattrcode );

$ou_sjm_idz =  $ousjmattrcode['code'];

if( !empty($ou_sjm_idz))
{
	global $wpdb;
	
    ?>
    <style>
    .sjm_window
    {
        margin: 10px auto; 
        width: 560px; 
        overflow:hidden; 
        background: #ffffff;
    }
        
    .sjm_window_m
    {
        margin:10px; 
        width:540px;  
    }
        
    .sjm_vac_name
    {
        color: #000000; 
        padding:5px 0px 0px 0px; 
        font-size: 20px; 
        text-align:left; 
        border-bottom: 1px solid #008fb3; 
    }
        
    .sjm_vac_contact_info
    {
        margin: 5px 0px 0px 0px;  
        width: 540px; 
        font-size: 16px;
        color: #000000;  
        overflow: hidden; 
    }
        
    .sjm_vac_contact_info_padding
    {
        padding:5px;    
    }
        
    .sjm_title_point
    {
        color: #008fb3;   
    }
        
    .sjm_vac_p0
    {
        margin: 5px 0px 0px 0px; 
        width: 540px; 
        font-size: 14px; 
        overflow: hidden; 
        color: #000000; 
        text-align:justify;    
    }
        
    .sjm_vac_p_left
    {
        float:left; 
        width: 150px;  
        color: #000000;     
    }
        
    .sjm_vac_p_right
    {
        float:left; 
        width: 390px;  
        color: #000000; 
        background: #ffffff;
    }
        
    .sjm_vac_padding_5px
    {
        padding:5px;  
    }
        
    .sjm_vac_p2
    {
        margin: 5px 0px 0px 0px;  
        width: 540px;
        font-size: 14px;
        overflow: hidden;
        color: #000000;
        text-align:justify;   
    }
    </style>
    <?php
    
	$ousjmcountcr2 = $wpdb->prefix . "onsjmdb";
	$ousjmv_a1 = $wpdb->get_results( "SELECT * FROM $ousjmcountcr2 where oncjm_id = $ou_sjm_idz ");
	foreach ($ousjmv_a1 as $ousjmv_a2)
	{ 
		$sjmv2_oncjm_id = $ousjmv_a2->oncjm_id; 
		$sjmv2_oncjm_id_job0 = $ousjmv_a2->oncjm_id_job0; 
		$sjmv2_oncjm_id_job01 = $ousjmv_a2->oncjm_id_job01;
		$sjmv2_oncjm_id_job1 = $ousjmv_a2->oncjm_id_job1;
		$sjmv2_oncjm_id_job2 = $ousjmv_a2->oncjm_id_job2;
		$sjmv2_oncjm_id_job3 = $ousjmv_a2->oncjm_id_job3;
		$sjmv2_oncjm_id_job4 = $ousjmv_a2->oncjm_id_job4;
		$sjmv2_oncjm_id_job5 = $ousjmv_a2->oncjm_id_job5;
		$sjmv2_oncjm_id_job6 = $ousjmv_a2->oncjm_id_job6;
		$sjmv2_oncjm_id_job7 = $ousjmv_a2->oncjm_id_job7;
		$sjmv2_oncjm_id_job8 = $ousjmv_a2->oncjm_id_job8;
		$sjmv2_oncjm_id_job9 = $ousjmv_a2->oncjm_id_job9;
		$sjmv2_oncjm_id_date1 = $ousjmv_a2->oncjm_id_date1;
		?>
		<div class="sjm_window">
			<div class="sjm_window_m">	
				<div class="sjm_vac_name">
                    <b><?php echo esc_html('Vacancy:');?></b> <?php echo esc_html($sjmv2_oncjm_id_job0);?>
				</div>
				
                <div class="sjm_vac_contact_info">
				    <div class="sjm_vac_contact_info_padding">
				        <b class="sjm_title_point"><?php echo esc_html("Contact Info");?></b>
				    </div>
				</div>
                
				<div class="sjm_vac_p0">
					<div class="sjm_vac_p_left">
						<div class="sjm_vac_padding_5px">
							<b><?php echo esc_html("Company: ");?></b>
						</div>
					</div>	
					<div class="sjm_vac_p_right">
						<div class="sjm_vac_padding_5px">
							<?php echo esc_html($sjmv2_oncjm_id_job1);?>
						</div>
					</div>
				</div>
				
				<div class="sjm_vac_p2">
					<div class="sjm_vac_p_left">
						<div class="sjm_vac_padding_5px">
							<b><?php echo esc_html("Contact person: ");?></b>
						</div>
					</div>	
					<div class="sjm_vac_p_right">
						<div class="sjm_vac_padding_5px">
							<?php echo esc_html($sjmv2_oncjm_id_job2);?>
						</div>
					</div>
				</div>
				
				<div class="sjm_vac_p2">
					<div class="sjm_vac_p_left">
						<div class="sjm_vac_padding_5px">
							<b><?php echo esc_html("Contact phone: ");?></b>
						</div>
					</div>	
					<div class="sjm_vac_p_right">
						<div class="sjm_vac_padding_5px">
							<?php echo esc_html($sjmv2_oncjm_id_job3);?>
						</div>
					</div>
				</div>
				
				<div class="sjm_vac_p2">
					<div class="sjm_vac_p_left">
						<div class="sjm_vac_padding_5px">
							<b><?php echo esc_html("City: ");?></b>
						</div>
					</div>	
					<div class="sjm_vac_p_right">
						<div class="sjm_vac_padding_5px">
							<?php echo esc_html($sjmv2_oncjm_id_job4);?>
						</div>
					</div>
				</div>
				
				<div class="sjm_vac_p2">
					<div class="sjm_vac_p_left">
						<div class="sjm_vac_padding_5px">
							<b><?php echo esc_html("Working time: ");?></b>
						</div>
					</div>	
					<div class="sjm_vac_p_right">
						<div class="sjm_vac_padding_5px">
							<?php echo esc_html($sjmv2_oncjm_id_job5);?>
						</div>
					</div>
				</div>
				
				<?php
				if( !empty($sjmv2_oncjm_id_job01))
				{
					?>
					<div class="sjm_vac_p2">
						<div class="sjm_vac_padding_5px">
							<b style="color: #008fb3;"><?php echo esc_html("Job purpose");?></b>
						</div>
					</div>
					<div class="sjm_vac_p2">
						<div style="padding:5px; text-align:justify;">
							<?php echo esc_html($sjmv2_oncjm_id_job01);?>
						</div>
					</div>
					<?php
				}
				
				if( !empty($sjmv2_oncjm_id_job6) ||  !empty($sjmv2_oncjm_id_job7)  ||  !empty($sjmv2_oncjm_id_job8) )
				{
					?>
					<div style="color: #000000; padding:5px 5px 5px 5px; font-size: 16px;color: #000000; ">
						<b style="color: #008fb3;"><?php echo esc_html("Requirements");?></b>
					</div>
					<?php
					
					if(!empty($sjmv2_oncjm_id_job6))
					{
						?>
						<div class="sjm_vac_p2">
							<div class="sjm_vac_p_left">
								<div class="sjm_vac_padding_5px">
									<b><?php echo esc_html("Level of education: ");?></b>
								</div>
							</div>	
							<div class="sjm_vac_p_right">
								<div class="sjm_vac_padding_5px">
									<?php echo esc_html($sjmv2_oncjm_id_job6);?>
								</div>
							</div>
						</div>
						<?php
					}
					
					if(!empty($sjmv2_oncjm_id_job7))
					{
						?>
						<div class="sjm_vac_p2">
							<div class="sjm_vac_p_left">
								<div class="sjm_vac_padding_5px">
									<b><?php echo esc_html("Experience: ");?></b>
								</div>
							</div>	
							<div class="sjm_vac_p_right">
								<div class="sjm_vac_padding_5px">
									<?php echo esc_html($sjmv2_oncjm_id_job7);?>
								</div>
							</div>
						</div>
						<?php
					}
					
					if(!empty($sjmv2_oncjm_id_job8))
					{
						?>
						<div class="sjm_vac_p2">
							<div class="sjm_vac_p_left">
								<div class="sjm_vac_padding_5px">
									<b><?php echo esc_html("Other requirements: ");?></b>
								</div>
							</div>	
							<div class="sjm_vac_p_right">
								<div class="sjm_vac_padding_5px">
									<?php echo esc_html($sjmv2_oncjm_id_job8);?>
								</div>
							</div>
						</div>
						<?php
					}
					if(!empty($sjmv2_oncjm_id_job9))
					{
						?>
						<div class="sjm_vac_p2">
							<div class="sjm_vac_padding_5px">
								<b style="color: #008fb3;"><?php echo esc_html("Responsibilities");?></b>
							</div>
						</div>
						<div style="margin: 0px 0px 0px 0px;  width: 540px; font-size: 16px;color: #000000;  overflow: hidden;">
							<div class="sjm_vac_padding_5px">
								<?php echo esc_html($sjmv2_oncjm_id_job9);?>
							</div>
						</div>
						<?php
					}
					?>
					<script>
					function sjm_send_resumeform()
					{
						jQuery('#ou_sjmsendresumeform').hide();
						jQuery('#ou_sjm_s_rf').show();
					}
					</script>
					
					<script>
					function sjm_send_resumehide()
					{
						jQuery('#ou_sjm_s_rf').hide();
						jQuery('#ou_sjmsendresumeform').show();
					}
					</script>
					
					<script>
					function sjm_send_resume()
					{
						var  firstname = jQuery('#idonsjm_firstname').val().length;
						var  lastname = jQuery('#idonsjm_lastname').val().length;
						var  email5= jQuery('#idonsjm_email').val();
						var  cv = jQuery('#idonsjm_cv').val().length;
						var sre2 = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
	
						jQuery('#onsjm_firstname_label1').css('color','#000000');
						jQuery('#onsjm_firstname_label1').hide();
						
						jQuery('#onsjm_lastname_label1').css('color','#000000');
						jQuery('#onsjm_lastname_label1').hide();
						
						jQuery('#onsjm_email_label1').css('color','#000000');
						jQuery('#onsjm_email_label1').hide();
						
						jQuery('#onsjm_cv_label1').css('color','#000000');
						jQuery('#onsjm_cv_label1').hide();
						
						if (sre2.test(email5)) 
						{
							jQuery('#onsjm_email_label1').css('color','#000000');
							jQuery('#onsjm_email_label1').hide();
							
							if( firstname >= 1 && lastname >= 1 && cv >= 1)
							{
								var formData = new FormData(jQuery('#ou_sjmformsendresumestart')[0]);
								formData.append('action', 'ousjmsendresume');
								formData.append('nonce', '<?php echo wp_create_nonce('h5g3f4t');?>');
								jQuery.ajax({
								type: "post",
								url: ousjbcode.ousjbcode_url,
								data: formData,
								contentType:false,
								processData:false,
								beforeSend: function() 
								{
									jQuery("#sjm_b1").hide();
									jQuery("#sjm_b3").show();
								},
								success: function(html)
								{
									jQuery("#sjm_b3").empty();
									jQuery("#sjm_b3").append(html);
								}
								});
							}
							else
							{
								if(firstname == 0)
								{
									jQuery('#onsjm_firstname_label1').css('color','#990000');
									jQuery('#onsjm_firstname_label1').show();
								}
							
								if(lastname == 0)
								{
									jQuery('#onsjm_lastname_label1').css('color','#990000');
									jQuery('#onsjm_lastname_label1').show();
								}
							
								if(cv == 0)
								{
									jQuery('#onsjm_cv_label1').css('color','#990000');
									jQuery('#onsjm_cv_label1').show();
								}
							}
							
						}
						else
						{
							jQuery('#onsjm_email_label1').css('color','#990000');
							jQuery('#onsjm_email_label1').show();
							if(firstname == 0)
							{
								jQuery('#onsjm_firstname_label1').css('color','#990000');
								jQuery('#onsjm_firstname_label1').show();
							}
							
							if(lastname == 0)
							{
								jQuery('#onsjm_lastname_label1').css('color','#990000');
								jQuery('#onsjm_lastname_label1').show();
							}
							
							if(cv == 0)
							{
								jQuery('#onsjm_cv_label1').css('color','#990000');
								jQuery('#onsjm_cv_label1').show();
							}
							
						}
						
					}
					</script>
					
					<div id="ou_sjmsendresumeform" style="margin: 10px 0px 5px 0px;  width: 540px; font-size: 16px;color: #000000;  overflow: hidden; text-align:center; background: #ffffff; ">
						<div style="padding:5px;">
							<button onclick="sjm_send_resumeform(); return false;"><?php echo esc_html("Send us your resume");?></button>
						</div >
					</div>
					
					<div id="ou_sjm_s_rf" style="display:none;">
						<div style="margin: 5px 0px 0px 0px;  width: 540px; font-size: 16px; overflow: hidden; color: #008fb3;">
							<div style="padding:5px; text-align:center;">
								<b><?php echo esc_html("Send us your resume");?></b>
							</div>
						</div>
						
						<form id="ou_sjmformsendresumestart" enctype="multipart/form-data"  method="POST">
							<input type="hidden"  autocomplete="off" name="onsjm_idvac" value="<?php echo esc_html($sjmv2_oncjm_id);?>">
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<b><?php echo esc_html("First name (*)");?></b> <span id="onsjm_firstname_label1" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
							</div>
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<input type="text" id="idonsjm_firstname" autocomplete="off" placeholder="<?php echo esc_html('First name');?>" style="font-size:14px; width:100%;" name="onsjm_firstname">
							</div>
							
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<b><?php echo esc_html("Last name (*)");?></b> <span id="onsjm_lastname_label1" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
							</div>
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<input type="text" id="idonsjm_lastname" autocomplete="off" placeholder="<?php echo esc_html('Last name');?>" style="font-size:14px; width:100%;" name="onsjm_lastname">
							</div>
							
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<b><?php echo esc_html("Email (*)");?></b> <span id="onsjm_email_label1" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
							</div>
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<input type="text" id="idonsjm_email" autocomplete="off" placeholder="<?php echo esc_html('Email');?>" style="font-size:14px; width:100%;" name="onsjm_email">
							</div>
							
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<b><?php echo esc_html("CV (Support: odt, doc, docx, rtf, uot, pdf)");?></b> <span id="onsjm_cv_label1" style="display:none;"><?php echo esc_html("This field must be filled in");?></span>
							</div>
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<input type="file" id="idonsjm_cv" autocomplete="off"  style="font-size:14px; width:100%;" name="onsjm_cv">
							</div>
							
							<div style="color: #000000; padding:5px 0px 0px 0px; font-size: 14px; text-align:left;">
								<span id="sjm_b1"><button onclick="sjm_send_resume(); return false;"><?php echo esc_html("Send");?></button></span>
								<span id="sjm_b2"><button onclick="sjm_send_resumehide(); return false;"><?php echo esc_html("Hide");?></button></span>
								<div id="sjm_b3" style="padding:5px 0px 0px 0px; display:none; font-size:14px; text-align:center;">Please wait...</div>
							</div>
							
						</form>
					</div>
					<?php
					
				}
				
				?>
				
				
			</div>
		</div>
		<?php
	}
}
?>