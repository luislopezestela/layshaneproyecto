<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="page-margin wow_content">	
			<div class="page-margin wow_creads_minstp wow__minstp start_up step-three-active">
				<div class="line">
					<div class="line_sec"></div>
					<div class="dot one"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg></div>
					<div class="dot three"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></div>
				</div>
				<div class="steps">
					<div class="step step-one"><?php echo $wo['lang']['upload_your_photo']; ?></div>
					<div class="step step-three"><?php echo $wo['lang']['info']; ?></div>
				</div>
			</div>
		
			<div class="add-photo wow_usr_steps">
				<form class="setting-general-form form-horizontal" method="post">
					<div class="wow_form_fields">
						<label for="first_name"><?php echo $wo['lang']['first_name']; ?></label>
						<input id="first_name" name="first_name" type="text" class="form-control input-md" value="<?php echo $wo['user']['first_name']?>" autocomplete="off"> 
					</div>
					<div class="wow_form_fields">
						<label for="last_name"><?php echo $wo['lang']['last_name']; ?></label>
						<input id="last_name" name="last_name" type="text" class="form-control input-md" value="<?php echo $wo['user']['last_name']?>" autocomplete="off"> 
					</div>
					<div class="wow_form_fields">
						<label for="country"><?php echo $wo['lang']['country']; ?></label>
						<select id="country" name="country" class="form-control">
							<?php 
								foreach ($wo['countries_name'] as $country_ids => $country) { 
								$country_id = $wo['user']['country_id'];
								$selected_contry = ($country_ids == $country_id) ? ' selected' : '' ;
							?>
								<option value="<?php echo $country_ids;?>" <?php echo $selected_contry;?> ><?php echo $country;?></option>
							<?php } ?>
						</select>
					</div>
					<?php
						$cutoff   = 1930;
						$now      = date('Y');
						$birthday = '';
						if ($wo['user']['birthday'] != '0000-00-00') {
							$birthday = explode('-', $wo['user']['birthday']);
						}
					?>
					<div class="wow_form_fields">
						<label for="usr_birthday"><?php echo $wo['lang']['birthday']; ?></label>
						<input id="usr_birthday" name="birthday" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['birthday']; ?>" autocomplete="off"> 
					</div>
					<input type="hidden" name="user_id" value="<?php echo $wo['user']['user_id'];?>">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
				</form>
				<div class="clear"></div>
			</div>
			<div class="continue-button wow_usr_steps_cont">
				<small class="skip-step" onclick="Wo_SkipStep('start_up_info');"><?php echo $wo['lang']['start_up_skip'];?></small>
				<button class="btn con-button btn-main btn-mat" onclick="Wo_SubmitInfoForm();"><?php echo $wo['lang']['start_up_continue'];?> <svg viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></button>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

<script type="text/javascript">
  $(function() {
  $("#usr_birthday").datepicker({
    changeMonth: true,
    changeYear: true,
    maxDate: new Date('<?php echo date('Y')-14; ?>-12-31'),
    dateFormat: 'dd-mm-yy',
    yearRange: "<?php echo date('Y')-129; ?>:<?php echo date('Y')-14; ?>",
    prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',
    nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'
    });
});
function Wo_SubmitInfoForm() {
	$("form.setting-general-form").submit();
}
$(function () {
	$('form.setting-general-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_information_startup',
    beforeSend: function () {
      $('button').attr('disabled', true);
      $('button').text("<?php echo $wo['lang']['please_wait'];?>");
    },
    success: function (data) {
      if(data.status == 200) {
      	window.location.href = '<?php echo lui_SeoLink('index.php?link1=start-up');?>';
      }
    }
  });
});
</script>