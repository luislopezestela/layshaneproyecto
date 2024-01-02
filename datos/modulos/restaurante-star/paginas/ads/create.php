<div class="row">
	<div class="col-md-4 ads_col_4">
		<?php echo lui_LoadPage('ads/includes/header'); ?>
	</div>
	<div class="col-md-8 ads_col_8">
		<form class="form form-horizontal" method="get" id="create-ads">
			<div class="page-margin wow_creads_minstp step-one-active">
				<div class="line">
					<div class="line_sec"></div>
					<div class="dot one"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></div>
					<div class="dot two"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></div>
					<div class="dot three"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" /></svg></div>
				</div>
				<div class="steps">
					<div class="step step-one"><?php echo $wo['lang']['media']; ?></div>
					<div class="step step-two"><?php echo $wo['lang']['details']; ?></div>
					<div class="step step-three"><?php echo $wo['lang']['targeting']; ?></div>
				</div>
			</div>
			<div class="page-margin wow_create_ads_stp">
				<!-- Media Step  -->
				<div class="wow_creads_media_step">
					<div class="wo_page_hdng pag_neg_padd">
						<div class="wo_page_hdng_innr">
							<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M7,15L11.5,9L15,13.5L17.5,10.5L21,15M22,4H14L12,2H6A2,2 0 0,0 4,4V16A2,2 0 0,0 6,18H22A2,2 0 0,0 24,16V6A2,2 0 0,0 22,4M2,6H0V11H0V20A2,2 0 0,0 2,22H20V20H2V6Z"></path></svg></span> <?php echo $wo['lang']['ad_media']; ?>
						</div>
					</div>
					<?php if ($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0') { ?>
						<div class="alert alert-warning"><?php echo $wo['lang']['balance_is_0'] ?> <a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>"><?php echo $wo['lang']['top_up'] ?></a></div>
					<?php } ?>
					<div class="wow_form_fields">
						<label for="company"><?php echo $wo['lang']['comp_name']; ?></label>
						<input id="company" name="name" type="text" max="50" onkeyup="document.getElementById('copy_camp_comp').innerHTML = escapeHtml(this.value)">
					</div>
					<div class="wow_form_fields">
						<label><?php echo $wo['lang']['image']; ?></label>
						<span class="help-block"><?php echo $wo['lang']['ad_img_help'] ?></span>
						<div class="wow_fcov_image">
							<div id="wow_fcov_img_holder">
								<img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
							</div>
							<div class="upload_ad_image" onclick="document.getElementById('ad-media-file').click(); return false">
								<div class="upload_ad_image_content">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['choose_image'] ?>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center">
						<a class="btn btn-main btn-mat btn-mat-raised cont_to_detail" <?php echo ($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0') ? 'disabled' : ''; ?>><?php echo $wo['lang']['next'] ?></a>
					</div>
				</div>
							
				<!-- Details Step  -->
				<div class="wow_creads_details_step" style="display: none;">
					<div class="wo_page_hdng pag_neg_padd">
						<div class="wo_page_hdng_innr">
							<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg></span> <?php echo $wo['lang']['details']; ?>
						</div>
					</div>
					<div class="wow_form_fields">
						<label for="title"><?php echo $wo['lang']['camp_title']; ?></label>
						<input id="title" name="headline" type="text" onkeyup="document.getElementById('copy_camp_title').innerHTML = escapeHtml(this.value)">
					</div>
					<div class="wow_form_fields">
						<label for="description"><?php echo $wo['lang']['camp_desc']; ?></label>
						<textarea id="description" name="description" rows="3" onkeyup="document.getElementById('copy_camp_desc').innerHTML = escapeHtml(this.value)"></textarea>
						<span class="help-block"><?php echo $wo['lang']['ad_desc_help'] ?></span>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="start_date"><?php echo $wo['lang']['start_date']; ?></label>
								<input id="start_date" name="start" type="text">
								<span class="help-block"><?php echo $wo['lang']['ad_start_date_help'] ?></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="end_date"><?php echo $wo['lang']['end_date']; ?></label>
								<input id="end_date" name="end" type="text">
								<span class="help-block"><?php echo $wo['lang']['ad_end_date_help'] ?></span>
							</div>
						</div>
					</div>
					<div class="wow_form_fields">
						<label for="url"><?php echo $wo['lang']['website_url']; ?></label>
						<input id="url" name="website" type="url">
						<?php if ($wo['config']['pages'] == 1) { ?><span class="help-block"><?php echo $wo['lang']['select_a_page_or_link'] ?></span><?php } ?>
					</div>
					<?php if ($wo['config']['pages'] == 1) { ?>
					<div class="wow_form_fields">
						<label for="select-page"><?php echo $wo['lang']['my_pages']; ?></label>
						<select name="page" id="select-page">			
							<?php if ($wo['my-pages'] && count($wo['my-pages']) > 0): ?>
								<option value="" selected><?php echo $wo['lang']['select']; ?></option>
							<?php foreach ($wo['my-pages'] as $wo['pageItem']): ?>
								<option value="<?php echo $wo['pageItem']['page_name']; ?>"><?php echo $wo['pageItem']['page_name']; ?></option>
							<?php endforeach; ?>
							<?php else:?>
								<option disabled="disabled" selected="selected"><?php echo $wo['lang']['no_pages_found']; ?></option>
							<?php endif;?>
						</select>
					</div>
					<?php } ?>
					<div class="text-center">
						<a class="btn btn-mat back_to_media"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?></a>
						<a class="btn btn-main btn-mat btn-mat-raised cont_to_submit" <?php echo ($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0') ? 'disabled' : ''; ?>><?php echo $wo['lang']['next'] ?></a>
					</div>
				</div>
							
				<!-- Final Step  -->
				<div class="wow_creads_submit_step" style="display:none">
					<div class="wo_page_hdng pag_neg_padd">
						<div class="wo_page_hdng_innr">
							<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,10.84 21.79,9.69 21.39,8.61L19.79,10.21C19.93,10.8 20,11.4 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4C12.6,4 13.2,4.07 13.79,4.21L15.4,2.6C14.31,2.21 13.16,2 12,2M19,2L15,6V7.5L12.45,10.05C12.3,10 12.15,10 12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12C14,11.85 14,11.7 13.95,11.55L16.5,9H18L22,5H19V2M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12H16A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8V6Z"></path></svg></span> <?php echo $wo['lang']['targeting']; ?>
						</div>
					</div>
					<div id="create-ads-alert" class="w100"></div>
					<div class="wow_form_fields">
						<label for="ads-location"><?php echo $wo['lang']['location']; ?></label>
						<input id="ads-location" name="location" type="text" onkeyup="document.getElementById('copy_camp_location').innerHTML = escapeHtml(this.value)">
					</div>
					<?php if ($wo['config']['google_map'] == 1 || $wo['config']['yandex_map'] == 1) { ?>
						<div id="review-ads-location">
							<div id="place" <?php echo($wo['config']['yandex_map'] == 1 ? 'class="yandex_ads_map"' : '') ?>></div>
						</div>
					<?php }?>
					
					<div class="wow_form_fields">
						<label for="ads-audience"><?php echo $wo['lang']['audience']; ?></label>
						<select data-live-search="true" data-actions-box="true" name="audience-list[]" id="ads-audience" class="selectpicker" data-size="7" multiple>
							<?php foreach ($wo['audience'] as $country_ids => $country): ?>
								<?php if ($country_ids == 0): ?>
									<option value="<?php echo $country_ids; ?>" disabled><?php echo $country; ?></option>
								<?php else: ?>
									<option value="<?php echo $country_ids; ?>"><?php echo $country; ?></option>
								<?php endif; ?>
							<?php endforeach;?>
						</select>
					</div>
					<div class="wow_form_fields">
						<label for="gender"><?php echo $wo['lang']['gender']; ?></label>
						<select name="gender" id="gender">
							<option value="all" selected><?php echo $wo['lang']['all']; ?></option>
							<?php foreach ($wo['genders'] as $key => $gender) { ?>
								<option value="<?php echo($key) ?>"><?php echo $gender; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="wow_form_fields">
						<label for="appears"><?php echo $wo['lang']['appears']; ?></label>
						<select name="appears" id="appears">
							<option value="entire" selected><?php echo $wo['lang']['entire_site']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<option value="post"><?php echo $wo['lang']['post']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<option value="sidebar"><?php echo $wo['lang']['sidebar']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php if ($wo['config']['job_system'] == 1) { ?>
							<option value="jobs"><?php echo $wo['lang']['jobs']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php } ?>
							<?php if ($wo['config']['forum'] != 0) { ?>
							<option value="forum"><?php echo $wo['lang']['forum']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php } ?>
							<?php if ($wo['config']['movies'] != 0) { ?>
							<option value="movies"><?php echo $wo['lang']['movies']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php } ?>
							<?php if ($wo['config']['offer_system'] != 0) { ?>
							<option value="offer"><?php echo $wo['lang']['offer']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php } ?>
							<?php if ($wo['config']['funding_system'] != 0) { ?>
							<option value="funding"><?php echo $wo['lang']['funding']; ?> (<?php echo $wo['lang']['format_image']; ?>)</option>
							<?php } ?>
							<!-- <option value="video"><?php echo $wo['lang']['video_player']; ?> (<?php echo $wo['lang']['format_video']; ?>)</option> -->
						</select>
					</div>
					<div class="wow_form_fields">
						<label for="camp_budget"><?php echo $wo['lang']['camp_budget']; ?></label>
						<input id="camp_budget" name="budget" type="text">
						<span class="help-block"><?php echo $wo['lang']['camp_budget_help'] ?></span>
					</div>
					<div class="wow_form_fields">
						<label for="bidding"><?php echo $wo['lang']['bidding']; ?></label>
						<select name="bidding" id="bidding">
							<option value="clicks" class="entire_site_clicks"><?php echo str_replace('${{PRICE}}',  lui_GetCurrency($wo['config']['currency']) . $wo['config']['ad_c_price'], $wo['lang']['pay_per_click']); ?></option>
							<option value="views" class="entire_site_views"><?php echo str_replace('${{PRICE}}', lui_GetCurrency($wo['config']['currency']) . $wo['config']['ad_v_price'], $wo['lang']['pay_per_imprssion']); ?></option>
						</select>
					</div>
					<div class="wow_form_fields" id="estimated" style="display: none;">
						<label><?php echo $wo['lang']['estimated_reach']; ?></label>
						<div class="estimated_ad_limit">
							<p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" /></svg> ~<span class="estimated_text"></span> <?php echo $wo['lang']['users']; ?></p>
						</div>
					</div>
					<div class="text-center">
						<a class="btn btn-mat back_to_details"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?></a>
						<button class="btn btn-main btn-mat btn-mat-raised add_wow_loader" type="submit" <?php echo ($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0') ? 'disabled' : ''; ?>><?php echo $wo['lang']['publish']; ?></button>
					</div>
				</div>
			</div>
			<input type="file" name="media" class="hidden" id="ad-media-file" accept="image/* video/*">
		</form>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-ui-timepicker-addon@1.6.3/dist/jquery-ui-timepicker-addon.min.js"></script>

<script>
// Steps
var $firstButton = $(".cont_to_detail"), $secondButton = $(".cont_to_submit");
var $firstbackButton = $(".back_to_media"), $secondbackButton = $(".back_to_details");
var $ad_media_step = $(".wow_creads_media_step"), $ad_detail_step = $(".wow_creads_details_step"), $ad_submit_step = $(".wow_creads_submit_step");

$firstbackButton.on("click", function(e){
	$ad_media_step.slideDown();
	$ad_detail_step.slideUp();
	$('.wow_creads_minstp').removeClass('step-two-active').addClass('step-one-active');
	e.preventDefault();
});
$secondbackButton.on("click", function(e){
	$ad_media_step.slideUp();
	$ad_submit_step.slideUp();
	$ad_detail_step.slideDown();
	$('.wow_creads_minstp').removeClass('step-three-active');
	e.preventDefault();
});

$firstButton.on("click", function(e){
	if (!$('#company').val()) {
		$('#company').addClass('border_class');
	}
	else{
		$('#company').removeClass('border_class');
		$ad_media_step.slideUp();
		$ad_detail_step.slideDown();
		$('.wow_creads_minstp').addClass('step-two-active');
		e.preventDefault();
	}
});
$secondButton.on("click", function(e){
	if (!$('#title').val() || !$('#description').val() || !$('#start_date').val() || !$('#end_date').val() || !$('#url').val()) {
		if (!$('#title').val()) {
			$('#title').addClass('border_class');
		}
		if (!$('#description').val()) {
			$('#description').addClass('border_class');
		}
		if (!$('#start_date').val()) {
			$('#start_date').addClass('border_class');
		}
		if (!$('#end_date').val()) {
			$('#end_date').addClass('border_class');
		}
		if (!$('#url').val()) {
			$('#url').addClass('border_class');
		}
	}
	else{
		$('#title').removeClass('border_class');
		$('#description').removeClass('border_class');
		$('#start_date').removeClass('border_class');
		$('#end_date').removeClass('border_class');
		$('#url').removeClass('border_class');
		$ad_media_step.slideUp();
		$ad_detail_step.slideUp();
		$ad_submit_step.slideDown();
		$('.wow_creads_minstp').addClass('step-three-active');
		e.preventDefault();
	}
});
$(document).ready(function() {
	$('#create-ads').ajaxForm({
		url: Wo_Ajax_Requests_File() + '?f=ads&s=new',
		type:"POST",
		beforeSend: function() {
			$('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeIn(100);
		},
		success: function(data) {
			scrollToTop();
			if (data['status'] == 200) {
				$("#create-ads-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
				window.location = data.url;
			} 

			else if (data['message']) {
				$("#create-ads-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
			} 

			$('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeOut(100);
		}
	});
	$('.selectpicker').selectpicker();
});

	jQuery(document).ready(function($) {
		$('.entire_site_clicks').html("<?php echo str_replace('${{PRICE}}',  Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_c_price'] * 1.5, $wo['lang']['pay_per_click']); ?>");
		$('.entire_site_views').html("<?php echo str_replace('${{PRICE}}', Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_v_price'] * 1.5, $wo['lang']['pay_per_imprssion']); ?>");
		$("#appears").change(function(event) {
			if ($(this).val() == 'entire') {
				$('.entire_site_clicks').html("<?php echo str_replace('${{PRICE}}',  Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_c_price'] * 1.5, $wo['lang']['pay_per_click']); ?>");
				$('.entire_site_views').html("<?php echo str_replace('${{PRICE}}', Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_v_price'] * 1.5, $wo['lang']['pay_per_imprssion']); ?>");
			}
			else{
				$('.entire_site_clicks').html("<?php echo str_replace('${{PRICE}}',  Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_c_price'], $wo['lang']['pay_per_click']); ?>");
				$('.entire_site_views').html("<?php echo str_replace('${{PRICE}}', Wo_GetCurrency($wo['config']['currency']) . $wo['config']['ad_v_price'], $wo['lang']['pay_per_imprssion']); ?>");
			}
		});
		
		
		$("#start_date").datepicker({ dateFormat: 'yy-mm-dd', minDate: 'today'});
		$("#end_date").datepicker({ dateFormat: 'yy-mm-dd', minDate: '+1day'});
		
		$('#ad-media-file').on('change', function(event) {
			  $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
			  $("#fake_post_img_holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
           });

		$("#ads-audience").change(function(event) {
			var self = $(this);
				get_estimated_users();
		});

		$("#gender").change(function(event) {
			var self = $(this);
			if (self.val() != '') {
				get_estimated_users();
			}
		});

		function get_estimated_users(){
			var audience = null;
			var gender = "ALL";
			if ( $("#ads-audience").val() != '') {
				audience = $("#ads-audience").val().join(',');
			}
			if ( $("#gender").val() != '') {
				gender = $("#gender").val();
			}

			$.ajax({
				url: Wo_Ajax_Requests_File(),
				type: 'GET',
				dataType: 'json',
				data: {f: 'ads',s:'get_estimated_users', estimated_audience:audience, estimated_gender:gender},
			}).done(function(data) {
				if (data.status == 200) {
					$('.estimated_text').text(data.count);
					$("#estimated").show();
				}
			});
		}

	  	

	  	<?php if ($wo['config']['google_map']) { ?>
	    $("#ads-location").keyup(function(event) {
	        if ($(this).val().length >= 3) {
	          Wo_Delay(function(){$("#review-ads-location #place").html('<iframe width="100%" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=' + $("#ads-location").val() + '&language=en"></iframe>')},1000)
	        }
	        else{
	          Wo_Delay(function(){$("#review-ads-location #place").html('<iframe width="100%" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=us&language=en"></iframe>')},1000)
	        }
      	});
	   <?php }else if($wo['config']['yandex_map'] == 1){ ?>
	   	$("#ads-location").keyup(function(event) {
		     	var myMap;
	        ymaps.geocode($("#ads-location").val()).then(function (res) {
	        	$("#review-ads-location #place").html('');
	            myMap = new ymaps.Map('place', {
	                center: res.geoObjects.get(0).geometry.getCoordinates(),
	                zoom : 10
	            });
	            myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
			            balloonContent: ''
			        }));
	        });
        });
	   <?php } ?>

	    $("#select-page").change(function(event) {
		  	var self     = $(this);
		  	if (self.val() != '') {
		  		var page_url = websiteUrl +'/'+ self.val();
		  		$('#create-ads').find("input[name=website]").val(page_url);
		  	}

		  	else{
		  		$('#create-ads').find("input[name=website]").val('');
		  	}
	  	});

		

	});
</script>
<style type="text/css">
	div .ads_col_8 .border_class{border: 1px solid red !important;}
</style>