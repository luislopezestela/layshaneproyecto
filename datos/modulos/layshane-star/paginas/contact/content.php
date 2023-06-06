<div class="page-margin">
	<div class="wow_main_float_head contactus">
		<div class="container">
			<h1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M18.72,14.76C19.07,13.91 19.26,13 19.26,12C19.26,11.28 19.15,10.59 18.96,9.95C18.31,10.1 17.63,10.18 16.92,10.18C13.86,10.18 11.15,8.67 9.5,6.34C8.61,8.5 6.91,10.26 4.77,11.22C4.73,11.47 4.73,11.74 4.73,12A7.27,7.27 0 0,0 12,19.27C13.05,19.27 14.06,19.04 14.97,18.63C15.54,19.72 15.8,20.26 15.78,20.26C14.14,20.81 12.87,21.08 12,21.08C9.58,21.08 7.27,20.13 5.57,18.42C4.53,17.38 3.76,16.11 3.33,14.73H2V10.18H3.09C3.93,6.04 7.6,2.92 12,2.92C14.4,2.92 16.71,3.87 18.42,5.58C19.69,6.84 20.54,8.45 20.89,10.18H22V14.67H22V14.69L22,14.73H21.94L18.38,18L13.08,17.4V15.73H17.91L18.72,14.76M9.27,11.77C9.57,11.77 9.86,11.89 10.07,12.11C10.28,12.32 10.4,12.61 10.4,12.91C10.4,13.21 10.28,13.5 10.07,13.71C9.86,13.92 9.57,14.04 9.27,14.04C8.64,14.04 8.13,13.54 8.13,12.91C8.13,12.28 8.64,11.77 9.27,11.77M14.72,11.77C15.35,11.77 15.85,12.28 15.85,12.91C15.85,13.54 15.35,14.04 14.72,14.04C14.09,14.04 13.58,13.54 13.58,12.91A1.14,1.14 0 0,1 14.72,11.77Z"></path></svg> <?php echo $wo['lang']['contact_us']; ?></h1>
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="wow_content wow_sett_content">
				<form class="contact-us-form form-horizontal" method="post">
					<div class="wow_form_fields">
						<label for="first_name"><?php echo $wo['lang']['first_name']; ?></label>
						<input id="first_name" name="first_name" type="text">
					</div>
					<div class="wow_form_fields">
						<label for="last_name"><?php echo $wo['lang']['last_name']; ?></label>
						<input id="last_name" name="last_name" type="text">
					</div>
					<div class="wow_form_fields">
						<label for="email"><?php echo $wo['lang']['email']; ?></label>
						<input id="email" name="email" type="email">
					</div>
					<div class="wow_form_fields">
						<label for="message"><?php echo $wo['lang']['message']; ?></label>
						<textarea name="message" id="message" rows="5"></textarea>
					</div>
					<?php if ($wo['config']['reCaptcha'] == 1 && !empty($wo['config']['reCaptchaKey'])) { ?>
						<div class="wow_form_fields">
							<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
						</div>
					<?php } ?>
					<div class="terms">
						<div class="round-check">
							<input type="checkbox" name="accept_terms" id="accept_terms" onchange="activateButton(this)">
							<label for="accept_terms"><?php echo str_replace('{Privacidad}', '<a href="'.lui_SeoLink('index.php?link1=terms&type=privacy-policy').'">'.$wo['lang']['privacy_policy'].'</a>', $wo['lang']['terms_contact']);?></label>
						</div>
						<div class="clear"></div>
					</div>

					<div class="contact-us-alert setting-update-alert"></div>
					<div class="text-center">
						<button class="btn btn-main btn-mat btn-mat-raised add_wow_loader" type="submit" name="send" id="send" disabled><?php echo $wo['lang']['send']; ?></button>
					</div>
				</form>
			</div>
		</div>
		<!-- .col-md-8 -->
		<div class="col-md-3"></div>
	</div>
	<!-- .row -->
</div>
<!-- .page-margin -->
<script>
function activateButton(element) {
	if(element.checked) {
		document.getElementById("send").disabled = false;
	}
	else  {
		document.getElementById("send").disabled = true;
	}
};
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');
   $(function() {
     $('form.contact-us-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=contact_us',
       beforeSend: function() {
		 $('form.contact-us-form').find('.add_wow_loader').addClass('btn-loading');
       },
       success: function(data) {
         if (data.status == 200) {
            $('.contact-us-alert').html('<div class="alert alert-success">' + data.message + '</div>');
            $('.alert-success').fadeIn(300);
         } else {
             var errors = data.errors.join("<br>");
             $('.contact-us-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('form.contact-us-form').find('.add_wow_loader').removeClass('btn-loading');
       }
     });
   });
</script>