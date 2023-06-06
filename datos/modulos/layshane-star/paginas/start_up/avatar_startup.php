<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="page-margin wow_content">	
			<div class="wow_creads_minstp wow__minstp start_up step-one-active">
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
				<div class="upload-image" onclick="document.getElementById('avatar').click(); return false">
					<div class="upload-image-content" title="<?php echo $wo['lang']['upload_your_photo'];?>">
						<img src="<?php echo $wo['user']['avatar'];?>">
					</div>
					<svg class="wow_content" xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
				</div>
				<div id="progress">
					<span id="percent">0%</span>
					<div class="progress">
						<div id="bar" class="progress-bar progress-bar-striped active"></div> 
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="continue-button wow_usr_steps_cont">
				<small class="skip-step" onclick="Wo_SkipStep('startup_image');"><?php echo $wo['lang']['start_up_skip'];?></small>
				<button class="btn con-button btn-main btn-mat" disabled onclick="Wo_NextStep();"><?php echo $wo['lang']['start_up_continue'];?> <svg viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></button>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

<form action="#" method="post" class="profile-avatar-changer" style="display:none">
    <input type="file" id="avatar" name="avatar" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileAvatar();">
    <input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['user']['user_id'];?>">
</form>
<script type="text/javascript">
var user_id = $('#user-id').val();
$(function () {
	var bar = $('#bar');
  var percent = $('#percent');
  var status = $('#status');
	$('form.profile-avatar-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_avatar_picture&s=start',

    beforeSend: function () {
      var percentVal = '0%';
      bar.width(percentVal);
      percent.html(percentVal);
    },
    uploadProgress: function (event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      bar.width(percentVal);
      $('#progress').slideDown(200);
      if(percentComplete > 50) {
        percent.addClass('white');
      }
      percent.html(percentVal);
    },
    success: function (data) {
      if(data.status == 200) {
      	$('#progress').slideUp(200);
        $('.upload-image').html('<img src="' + data.img + '">');
        $('h2').text(data.big_text);
        var Title = $('<textarea />').html(data.small_text).text();
        $('h4').text(Title);
        $('.upload-image').css({'border': '0'});
        $('[id^=updateImage-' + user_id + ']').attr("src", data.img);
        $('button').attr('disabled', false);
        $('.skip-step').addClass('vis');
      }
      else{
      	if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }
    }
  });
});
function Wo_UpdateProfileAvatar() {
  $("form.profile-avatar-changer").submit();
}
function Wo_NextStep() {
  $('button').attr('disabled', true);
  $('button').text("<?php echo $wo['lang']['please_wait'];?>");
  setTimeout(function() {
    window.location.href = '<?php echo lui_SeoLink('index.php?link1=start-up');?>';
  }, 1000);
}
</script>